using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml;
using System.Xml.Linq;


namespace gimpcloud
{
    public partial class Form1 : Form
    { 
    
        public static string setforform2 = "";

        public Form1()
        {
            /*this.contextMenu1 = new System.Windows.Forms.ContextMenu();
            this.menuItem1 = new System.Windows.Forms.MenuItem();

            this.contextMenu1.MenuItems.AddRange(new System.Windows.Forms.MenuItem[] { this.menuItem1 });
            InitializeComponent();
            notifyIcon1.ContextMenu = this.contextMenu1;

            // populate the menu
            this.menuItem1.Index = 0;
            this.menuItem1.Text = "E&xit";
            this.menuItem1.Click += new System.EventHandler(this.menuItem1_Click);*/
            InitializeComponent();

            Opacity = 0;
            Visible = false;
            ShowInTaskbar = false;
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            UseNotify();
        }
        public void UseNotify()
        {
            notifyIcon1.ContextMenuStrip = contextMenuStrip1;
            notifyIcon1.BalloonTipText = "this is it";
            notifyIcon1.BalloonTipTitle = "Gimp Cloud";
        }

        private void Form1_Resize(object sender, EventArgs e)
        {
            if (FormWindowState.Minimized == WindowState)
            {
                Hide();
            }
        }
        private void notifyIcon1_MouseDoubleClick(object sender, MouseEventArgs e)
        {   // chck cookie if logged in if not open login box
            /*XmlDocument doc = new XmlDocument();
            doc.Load(@"A:\programing\gimp\gimpcloud\desktop\Windows\gimpcloud\gimpcloud\XMLFile1.xml");

            XmlNodeList opt1 = doc.GetElementsByTagName("id");
            string op1b = opt1[0].InnerText.Trim ();*/
            string opb1 = "A01";
            XMLMaker xw = new XMLMaker();
            String op1b = xw.FileReader();
           
            if (opb1.Equals (op1b))
            {
                // image upload form may only Show the image to b opened but I may put  a button incase it don't autoopen as a failsafe
                Form2 f2 = new Form2();
                f2.Show();
            } else
            {
                // Login form
                Form3 f3 = new Form3();
                f3.Show();
            }
        }
        private void menuItem1_Click(object Sender, EventArgs e)
        {
        }

        private void testToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            DialogResult d = MessageBox.Show("Are you sure you want to quit?","Question",MessageBoxButtons.OKCancel);
            if (d == DialogResult.OK)
            {
                this.Close();
            }
        }

        private void testToolStripMenuItem_Click(object sender, EventArgs e)
        {
            try
            {
                XMLMaker xw = new XMLMaker();
                String ttxurl = "https://joshlucy.info/stand";
                System.Drawing.Image img = DownloadImagefromURL(ttxurl);
                MessageBox.Show(img.ToString());
            }
            catch (Exception ex)
            {
                MessageBox.Show(ex.ToString());
            }
        }

        private void steToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        public System.Drawing.Image DownloadImagefromURL (String imageURL)
        {
            System.Drawing.Image image = null;
            try
            {
                System.Net.HttpWebRequest webRequest = (System.Net.HttpWebRequest)System.Net.HttpWebRequest.Create(imageURL);
                webRequest.AllowWriteStreamBuffering = true;
                webRequest.Timeout = 3000;
                System.Net.WebResponse webresp = webRequest.GetResponse();
                System.IO.Stream stream = webresp.GetResponseStream();
                image = System.Drawing.Image.FromStream(stream);
                webresp.Close();
            }
            catch (Exception)
            {
                return null;
            }
            return image;
        }

        private void aboutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            AboutBox2 ab = new AboutBox2();
            ab.ShowDialog();
        }

        private void helpToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            Form4 hp = new Form4();
            hp.Show();
        }
    }
    
}
