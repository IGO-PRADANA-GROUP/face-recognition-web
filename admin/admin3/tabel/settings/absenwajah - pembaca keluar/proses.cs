//impot library
using System;
using System.Diagnostics;
using Emgu.CV.Structure;

namespace Emgu.CV
{
   /// <summary>
   /// </summary>
   [Serializable]
   public class EigenObjectRecognizer
   {
       //variabel private untuk pemrosesan
      private Image<Gray, Single>[] _eigenImages;
      private Image<Gray, Single> _avgImage;
      private Matrix<float>[] _eigenValues;
      private string[] _labels;
      private double _eigenDistanceThreshold;

      /// <summary>
      /// Dapatkan vektor eigen
      /// </summary>
      /// <remarks>Metode set digunakan untuk deserialization</remarks></remarks>
      public Image<Gray, Single>[] EigenImages
      {
         get { return _eigenImages; }
         set { _eigenImages = value; }
      }

      /// <summary>
      /// Dapatkan atau atur label untuk gambar training yang sesuai
      /// </summary>
      public String[] Labels
      {
         get { return _labels; }
         set { _labels = value; }
      }

      /// <summary>
      /// mendapatkan the eigen distance threshold.
      /// Semakin kecil angkanya, semakin besar kemungkinan gambar yang diperiksa akan diperlakukan sebagai objek yang tidak dikenal.
      /// Setel ke angka yang sangat besar (mis. 5000) dan pengenal akan selalu memperlakukan gambar yang diperiksa sebagai salah satu objek yang diketahui. 
      /// </summary>
      public double EigenDistanceThreshold
      {
         get { return _eigenDistanceThreshold; }
         set { _eigenDistanceThreshold = value; }
      }

      /// <summary>
      /// Dapatkan Gambar rata-rata. 
      /// </summary>
      /// <remarks>Metode set digunakan untuk deserialization</remarks>
      public Image<Gray, Single> AverageImage
      {
         get { return _avgImage; }
         set { _avgImage = value; }
      }

      /// <summary>
      /// Dapatkan nilai eigen dari masing-masing gambar pelatihan
      /// </summary>
      /// <remarks>Metode set digunakan untuk deserialization</remarks>
      public Matrix<float>[] EigenValues
      {
         get { return _eigenValues; }
         set { _eigenValues = value; }
      }

      private EigenObjectRecognizer()
      {
      }


      /// <summary>
      /// Buat recognizer objek menggunakan data dan parameter tranning spesifik, itu akan selalu mengembalikan objek yang paling mirip
      /// </summary>
      /// <param name="images">Gambar yang digunakan untuk pelatihan, masing-masing harus berukuran sama. Disarankan gambar-gambar tersebut histogram dinormalkan</param>
      /// <param name="termCrit">Kriteria untuk pelatihan recognizer</param>
      public EigenObjectRecognizer(Image<Gray, Byte>[] images, ref MCvTermCriteria termCrit)
         : this(images, GenerateLabels(images.Length), ref termCrit)
      {
      }

      private static String[] GenerateLabels(int size)
      {
         String[] labels = new string[size];
         for (int i = 0; i < size; i++)
            labels[i] = i.ToString();
         return labels;
      }

      /// <summary>
      /// Buat recognizer objek menggunakan data dan parameter tranning spesifik, itu akan selalu mengembalikan objek yang paling mirip
      /// </summary>
      /// <param name="images">Gambar yang digunakan untuk pelatihan, masing-masing harus berukuran sama. Disarankan gambar-gambar tersebut histogram dinormalkan</param>
      /// <param name="labels">Label yang terkait dengan gambar</param>
      /// <param name="termCrit">Kriteria untuk pelatihan recognizer</param>
      public EigenObjectRecognizer(Image<Gray, Byte>[] images, String[] labels, ref MCvTermCriteria termCrit)
         : this(images, labels, 0, ref termCrit)
      {
      }

      /// <summary>
      /// Buat pengenal objek menggunakan data dan parameter tranning spesifik
      /// </summary>
      /// <param name="images">Gambar yang digunakan untuk pelatihan, masing-masing harus berukuran sama. Disarankan gambar-gambar tersebut histogram dinormalkan</param>
      /// <param name="labels">Label yang terkait dengan gambar</param>
      /// <param name="eigenDistanceThreshold">
      /// Ambang batas eigen, (0, ~ 1000).
      /// Semakin kecil angkanya, semakin besar kemungkinan gambar yang diperiksa akan diperlakukan sebagai objek yang tidak dikenal. 
      /// Jika ambang batasnya > 0, recognizer akan selalu memperlakukan gambar yang diperiksa sebagai salah satu objek yang diketahui. 
      /// </param>
      /// <param name="termCrit">The criteria for recognizer training</param>
      public EigenObjectRecognizer(Image<Gray, Byte>[] images, String[] labels, double eigenDistanceThreshold, ref MCvTermCriteria termCrit)
      {
         Debug.Assert(images.Length == labels.Length, "The number of images should equals the number of labels");
         Debug.Assert(eigenDistanceThreshold >= 0.0, "Eigen-distance threshold should always >= 0.0");
         CalcEigenObjects(images, ref termCrit, out _eigenImages, out _avgImage);
         _eigenValues = Array.ConvertAll<Image<Gray, Byte>, Matrix<float>>(images,
             delegate(Image<Gray, Byte> img)
             {
                return new Matrix<float>(EigenDecomposite(img, _eigenImages, _avgImage));
             });

         _labels = labels;

         _eigenDistanceThreshold = eigenDistanceThreshold;
      }

      #region static methods
      /// <summary>
      /// kalkulasi gambar eigen untuk gambar traning tertentu
      /// </summary>
      /// <param name="trainingImages">kakulasi gambar eigen untuk gambar traning tertentu</param>
      /// <param name="termCrit">Kriteria untuk tranning</param>
      /// <param name="eigenImages">Gambar eigen yang dihasilkan</param>
      /// <param name="avg">Citra rata-rata yang dihasilkan</param>
      public static void CalcEigenObjects(Image<Gray, Byte>[] trainingImages, ref MCvTermCriteria termCrit, out Image<Gray, Single>[] eigenImages, out Image<Gray, Single> avg)
      {
         int width = trainingImages[0].Width;
         int height = trainingImages[0].Height;

         IntPtr[] inObjs = Array.ConvertAll<Image<Gray, Byte>, IntPtr>(trainingImages, delegate(Image<Gray, Byte> img) { return img.Ptr; });

         if (termCrit.max_iter <= 0 || termCrit.max_iter > trainingImages.Length)
            termCrit.max_iter = trainingImages.Length;
         
         int maxEigenObjs = termCrit.max_iter;

         #region initialize eigen images
         eigenImages = new Image<Gray, float>[maxEigenObjs];
         for (int i = 0; i < eigenImages.Length; i++)
            eigenImages[i] = new Image<Gray, float>(width, height);
         IntPtr[] eigObjs = Array.ConvertAll<Image<Gray, Single>, IntPtr>(eigenImages, delegate(Image<Gray, Single> img) { return img.Ptr; });
         #endregion

         avg = new Image<Gray, Single>(width, height);

         CvInvoke.cvCalcEigenObjects(
             inObjs,
             ref termCrit,
             eigObjs,
             null,
             avg.Ptr);
      }

      /// <summary>
      /// Dekomposisi gambar sebagai nilai eigen, menggunakan vektor eigen spesifik
      /// </summary>
      /// <param name="src">Gambar yang akan diuraikan</param>
      /// <param name="eigenImages">Gambar eigen</param>
      /// <param name="avg">Rata Rata gambar</param>
      /// <returns>Nilai Eigen dari gambar yang terdekomposisi</returns>
      public static float[] EigenDecomposite(Image<Gray, Byte> src, Image<Gray, Single>[] eigenImages, Image<Gray, Single> avg)
      {
         return CvInvoke.cvEigenDecomposite(
             src.Ptr,
             Array.ConvertAll<Image<Gray, Single>, IntPtr>(eigenImages, delegate(Image<Gray, Single> img) { return img.Ptr; }),
             avg.Ptr);
      }
      #endregion

      /// <summary>
      /// Mengingat nilai eigen, merekonstruksi gambar yang diproyeksikan
      /// </summary>
      /// <param name="eigenValue">Nilai-nilai eigen</param>
      /// <returns>Gambar yang diproyeksikan</returns>
      public Image<Gray, Byte> EigenProjection(float[] eigenValue)
      {
         Image<Gray, Byte> res = new Image<Gray, byte>(_avgImage.Width, _avgImage.Height);
         CvInvoke.cvEigenProjection(
             Array.ConvertAll<Image<Gray, Single>, IntPtr>(_eigenImages, delegate(Image<Gray, Single> img) { return img.Ptr; }),
             eigenValue,
             _avgImage.Ptr,
             res.Ptr);
         return res;
      }

      /// <summary>
      /// Dapatkan jarak eigen Euclidean antara <paramref name="image"/> dan setiap gambar lain dalam database
      /// </summary>
      /// <param name="image">Gambar yang akan dibandingkan dari gambar pelatihan</param>
      /// <returns>Array jarak eigen dari setiap gambar dalam gambar pelatihan</returns>
      public float[] GetEigenDistances(Image<Gray, Byte> image)
      {
         using (Matrix<float> eigenValue = new Matrix<float>(EigenDecomposite(image, _eigenImages, _avgImage)))
            return Array.ConvertAll<Matrix<float>, float>(_eigenValues,
                delegate(Matrix<float> eigenValueI)
                {
                   return (float)CvInvoke.cvNorm(eigenValue.Ptr, eigenValueI.Ptr, Emgu.CV.CvEnum.NORM_TYPE.CV_L2, IntPtr.Zero);
                });
      }

      /// <summary>
      /// Mengingat <paramref name="image"/> untuk diperiksa, cari di database objek yang paling mirip, kembalikan indeks dan jarak eigen
      /// </summary>
      /// <param name="image">Gambar yang dicari dari database</param>
      /// <param name="index">Indeks dari objek yang paling mirip</param>
      /// <param name="eigenDistance">Jarak eigen dari objek yang paling mirip</param>
      /// <param name="label">Label dari gambar tertentu</param>
      public void FindMostSimilarObject(Image<Gray, Byte> image, out int index, out float eigenDistance, out String label)
      {
         float[] dist = GetEigenDistances(image);

         index = 0;
         eigenDistance = dist[0];
         for (int i = 1; i < dist.Length; i++)
         {
            if (dist[i] < eigenDistance)
            {
               index = i;
               eigenDistance = dist[i];
            }
         }
         label = Labels[index];
      }

      /// <summary>
      /// Cobalah untuk mengenali gambar dan kembalikan labelnya
      /// </summary>
      /// <param name="image">Gambar harus dikenali</param>
      /// <returns>
      /// String.Empty, jika tidak dikenali;
      /// Label gambar yang sesuai, sebaliknya
      /// </returns>
      public String Recognize(Image<Gray, Byte> image)
      {
         int index;
         float eigenDistance;
         String label;
         FindMostSimilarObject(image, out index, out eigenDistance, out label);

         return (_eigenDistanceThreshold <= 0 || eigenDistance < _eigenDistanceThreshold )  ? _labels[index] : String.Empty;
      }
   }
}
