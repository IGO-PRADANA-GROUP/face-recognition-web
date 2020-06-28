

//import semua library kebutuhan aplikasi
using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;
using Emgu.CV;
using Emgu.CV.Structure;
using Emgu.CV.CvEnum;
using System.IO;
using System.Diagnostics;
using System.Threading;

namespace MultiFaceRec
{
    public partial class FrmPrincipal : Form
    {
        //Deklarasi semua variabel, vektor, dan haarcascade
        Image<Bgr, Byte> currentFrame;
        Capture grabber;
        HaarCascade face;
        HaarCascade eye;
        MCvFont font = new MCvFont(FONT.CV_FONT_HERSHEY_TRIPLEX, 0.4d, 0.4d);
        Image<Gray, byte> result, TrainedFace = null;
        Image<Gray, byte> gray = null;
        List<Image<Gray, byte>> trainingImages = new List<Image<Gray, byte>>();
        List<string> labels= new List<string>();
        List<string> NamePersons = new List<string>();
        int ContTrain, NumLabels, t,load;
        string name, names = null;


        public FrmPrincipal()
        {
            InitializeComponent();
            // Muat haarcascade untuk deteksi wajah
            face = new HaarCascade("data.xml");
            //eye = new HaarCascade("haarcascade_eye.xml");
            try
            {
                // Pemuatan muka dan label pra-training untuk setiap gambar
                string Labelsinfo = File.ReadAllText(Application.StartupPath + "/daftarwajah/daftarnama.txt");
                string[] Labels = Labelsinfo.Split('%');
                NumLabels = Convert.ToInt16(Labels[0]);
                ContTrain = NumLabels;
                string LoadFaces;

                //perulangan mengambil gambar
                for (int tf = 1; tf < NumLabels+1; tf++)
                {
                    LoadFaces = "wajah" + tf + ".bmp";
                    trainingImages.Add(new Image<Gray, byte>(Application.StartupPath + "/daftarwajah/" + LoadFaces));
                    labels.Add(Labels[tf]);
                }
            
            }
            catch(Exception e)
            {
               //pesan jika tidak ada wajah tersimpan
                MessageBox.Show("Tidak Ada Wajah Tersimpan.", "Wajah.", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            }

        }
      

        private void mulai()
        {

            // Inisialisasi pengambilan gambar
            grabber = new Capture();
            grabber.QueryFrame();

            // Inisialisasi FrameGraber
            Application.Idle += new EventHandler(FrameGrabber);
            //button1.Enabled = false;
        }

        private void button1_Click(object sender, EventArgs e)
        {
            //membuka kamera dan proses face recognition
            mulai();
        }


        private void button2_Click(object sender, System.EventArgs e)
        {
            imageBox1.Visible = true;
            try
            {

                // menghitung jumlah wajah training
                ContTrain = ContTrain + 1;

                // Dapatkan abu-abu dari kamera
                gray = grabber.QueryGrayFrame().Resize(320, 240, Emgu.CV.CvEnum.INTER.CV_INTER_CUBIC);

                //Face Detector
                MCvAvgComp[][] facesDetected = gray.DetectHaarCascade(
                face,
                1.2,
                10,
                Emgu.CV.CvEnum.HAAR_DETECTION_TYPE.DO_CANNY_PRUNING,
                new Size(20, 20));

                // Aksi untuk setiap gambar terdeteksi
                foreach (MCvAvgComp f in facesDetected[0])
                {
                    TrainedFace = currentFrame.Copy(f.rect).Convert<Gray, byte>();
                    break;
                }


                // mengubah ukuran gambar wajah yang terdeteksi untuk membandingkan ukuran yang sama dengan daftar gambar yang ada
                TrainedFace = result.Resize(100, 100, Emgu.CV.CvEnum.INTER.CV_INTER_CUBIC);
                trainingImages.Add(TrainedFace);
                labels.Add(textBox1.Text);

                // Tampilkan wajah ditambahkan dalam skala abu-abu
                imageBox1.Image = TrainedFace;


                // Tuliskan jumlah wajah yang ada dalam teks file
                File.WriteAllText(Application.StartupPath + "/daftarwajah/daftarnama.txt", trainingImages.ToArray().Length.ToString() + "%");

                // Tuliskan label-label dari wajah-wajah yang telah sesuai dengan daftar wajah
                for (int i = 1; i < trainingImages.ToArray().Length + 1; i++)
                {
                    trainingImages.ToArray()[i - 1].Save(Application.StartupPath + "/daftarwajah/wajah" + i + ".bmp");
                    File.AppendAllText(Application.StartupPath + "/daftarwajah/daftarnama.txt", labels.ToArray()[i - 1] + "%");
                }

                //Pesan saat wajah ditambahkan baru
                MessageBox.Show(textBox1.Text + ", Wajah berhasil ditambahkan", "Training OK", MessageBoxButtons.OK, MessageBoxIcon.Information);
            }
            catch
            {
                //pesan error jika deteksi wajah belum diaktifkan
                MessageBox.Show("aktifkan deteksi wajah", "Training Fail", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);
            }
        }


        void FrameGrabber(object sender, EventArgs e)
        {
            //mengisi default 
            label3.Text = "0";
            NamePersons.Add("");


            
            //Mendapatkan jumlah frame dalam form kamera
            currentFrame = grabber.QueryFrame().Resize(320, 240, Emgu.CV.CvEnum.INTER.CV_INTER_CUBIC);

                    //Konversi ke abu abu
                    gray = currentFrame.Convert<Gray, Byte>();

                    //Face Detector
                    MCvAvgComp[][] facesDetected = gray.DetectHaarCascade(
                  face,
                  1.2,
                  10,
                  Emgu.CV.CvEnum.HAAR_DETECTION_TYPE.DO_CANNY_PRUNING,
                  new Size(20, 20));

                    //Perulangan mendeteksi wajah
                    foreach (MCvAvgComp f in facesDetected[0])
                    {
                        t = t + 1;
                        result = currentFrame.Copy(f.rect).Convert<Gray, byte>().Resize(100, 100, Emgu.CV.CvEnum.INTER.CV_INTER_CUBIC);
                        //membuat kotak wajah dengan warna kuning ke hijauan
                        currentFrame.Draw(f.rect, new Bgr(Color.GreenYellow), 2);


                        if (trainingImages.ToArray().Length != 0)
                        {
                        //TermCriteria for face recognition
                        MCvTermCriteria termCrit = new MCvTermCriteria(ContTrain, 0.001);
                        EigenObjectRecognizer recognizer = new EigenObjectRecognizer(
                           trainingImages.ToArray(),
                           labels.ToArray(),
                           3000,
                           ref termCrit);
                           name = recognizer.Recognize(result);

                        //Membuat label diatas kotak wajah yang terdeteksi
                        for (int nnn = 0; nnn < facesDetected[0].Length; nnn++)
                        {
                            String tampil_dilayar = name;
                            currentFrame.Draw(tampil_dilayar, ref font, new Point(f.rect.X - 2, f.rect.Y - 7), new Bgr(Color.Yellow));
                        }

                        }

                            NamePersons[t-1] = name;
                            NamePersons.Add("");


                        //Menampilkan nomor jumlah wajah yang terdeteksi dalam scene
                        label3.Text = facesDetected[0].Length.ToString();

                    }
                        t = 0;

                        
                    for (int nnn = 0; nnn < facesDetected[0].Length; nnn++)
                    {
                        try 
                        {

                             //jika terdeteksi wajah
                            if (load == 1)
                            {

                                if (berapa < 100)
                                {
                                    berapa = berapa + 1;
                                    string nama_user = NamePersons[nnn];
                                    string texts = System.IO.File.ReadAllText(Application.StartupPath + "/" + "setting.txt");
                                    webBrowser1.Navigate(texts + "baca.php?nama=" + nama_user);
                                    if (nama_user == "wajah belum terdaftar")
                                    {
                                        axWindowsMediaPlayer1.URL = (Application.StartupPath + "/belum.mp3");
                                    }
                                    else
                                    {
                                        axWindowsMediaPlayer1.URL = (Application.StartupPath + "/suara.mp3");
                                    }
                                }
                                else
                                {
                                    berapa = 0;
                                }

                                         
                            }  
                            

                            
                       
                          }
                        catch (Exception ex)
                         {
                            Debug.WriteLine(ex.Message);
                     } 

                    }
                    //menampilkan nama wajah yang terdeteksi
                    imageBoxFrameGrabber.Image = currentFrame;
                    label4.Text = names;
                    names = "";
                    NamePersons.Clear();

                }

        int berapa = 0;

        private void FrmPrincipal_Load(object sender, EventArgs e)
        {
            //komunikasi ke server dan setting
            mulai();
            string texts = System.IO.File.ReadAllText(Application.StartupPath + "/" + "setting.txt");
            //lokasi website proses
            webBrowser1.Navigate(texts + "baca.php");

            string texts2 = System.IO.File.ReadAllText(Application.StartupPath + "/" + "setting2.txt");
            string baca = System.IO.File.ReadAllText(texts2  + "baca.txt");

            textBox1.Text = baca;
            
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            //keluar program
            Application.Exit();
        }


        //proses webbrowser dalam aplikasi
        private void webBrowser1_DocumentCompleted(object sender, WebBrowserDocumentCompletedEventArgs e)
        {
            //jika webbrowser sibuk
            if (webBrowser1.IsBusy)
            {
                load = 0;
            }
            else
            {
                load = 1;
            }
            
        }

        //keluar aplikasi
        private void pictureBox3_Click(object sender, EventArgs e)
        {
            if (System.Windows.Forms.Application.MessageLoop)
            {
                System.Windows.Forms.Application.Exit();
            }
            else
            {
                System.Environment.Exit(1);
            }
        }

        private void pictureBox5_Click(object sender, EventArgs e)
        {

        }

        private void showToolStripMenuItem_Click(object sender, EventArgs e)
        {
            webBrowser1.Visible = true;
        }

        private void hiddenToolStripMenuItem_Click(object sender, EventArgs e)
        {
            webBrowser1.Visible = false;
        }

    }
}