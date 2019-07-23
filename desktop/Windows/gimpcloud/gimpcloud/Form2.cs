using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using MySql.Data;
using MySql.Data.MySqlClient;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace gimpcloud
{
    public partial class Form2 : Form
    {

        MySqlConnection conn = new MySqlConnection("server=gimpcloud.db.7684787.f67.hostedresource.net;database=gimpcloud;uid=gimpcloud;password=M01!artinfan");
        MySqlCommand addapter;
        XMLMaker mw = new XMLMaker();
        public Form2()
        {
            InitializeComponent();
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            try
            {
                conn.Open();
                addapter = new MySqlCommand("SELECT * FROM image", conn);

                using (MySqlDataReader reader = addapter.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        imagebox1.Text = reader["image_url"].ToString();
                        pictureBox1.ImageLocation = imagebox1.Text;
                    }
                }
            }
            catch(Exception ec)
            {
                imagebox1.Text= ec.ToString();
            }
            finally
            {

            }
            }

        private void linkLabel1_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
        }

        private void toolStripStatusLabel1_Click(object sender, EventArgs e)
        {
            mw.MyWriter("Here"); mw.MyReadr();


        }

        private void fileToolStripMenuItem_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            }

        private void button1_Click(object sender, EventArgs e)
        {
            Sqlcl cs = new Sqlcl();
            cs.Update(imagebox1.Text, "image");
            MessageBox.Show (cs.Query ("image", "image_url"));
            this.Close();
        }

        private void R_Click(object sender, EventArgs e)
        {

        }

        private void toolStrip1_ItemClicked(object sender, ToolStripItemClickedEventArgs e)
        {

        }

        private void quitToolStripMenuItem_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            this.Close();
        }
    }
}
