using System;
using System.Collections.Generic;using System.IO;using System.Windows.Forms;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Xml;

namespace gimpcloud
{
    class XMLMaker
    {

        public void MyWriter(String xxx)
        {
            using (StreamWriter sw = new StreamWriter("info.txt"))
            {
                sw.WriteLine(xxx);
            }
        }
        public string FileReader ()
        {
            string line = "";
            using (StreamReader sa = new StreamReader("info.txt"))
            {
                while ((line = sa.ReadLine ()) != null)
                {
                    return line;
                }
                return null;
            }
        }
        public void MyReadr ()
        { 
            string line = "";
            using (StreamReader sr = new StreamReader("info.txt"))
            {
                while ((line = sr.ReadLine()) != null)
                {
                    MessageBox.Show(line);
                }
            }
        }
        public string xmlwriter (String xml)
        {
            return xml;
        }
    }
}
