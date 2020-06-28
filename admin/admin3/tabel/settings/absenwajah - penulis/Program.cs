//import library
using System;
using System.Collections.Generic;
using System.Linq;
using System.Windows.Forms;

namespace MultiFaceRec
{
    static class Program
    {
        /// <summary>
        /// </summary>
        [STAThread]
        //pertama kali diproses
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);
            Application.Run(new FrmPrincipal());
        }
    }
}
