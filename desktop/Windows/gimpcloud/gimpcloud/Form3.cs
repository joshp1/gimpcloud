using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.IO;

using MySql.Data;
using MySql.Data.MySqlClient;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace gimpcloud
{
    
    public partial class Form3 : Form

    {

        MySqlConnection conn = new MySqlConnection("server=gimpcloud.db.7684787.f67.hostedresource.net;database=gimpcloud;uid=gimpcloud;password=M01!artinfan");
        MySqlCommand adapter;
        public Form3()
        {
            InitializeComponent();
        }
        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void Form3_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                conn.Open();
                adapter = new MySqlCommand("SELECT * FROM Main WHERE username='" + textBox1.Text + "' AND password='"+textBox2.Text + "'", conn);
                
                using (MySqlDataReader reader = adapter.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        // save to a xml file also need to work on logout script witch will replace the login varable instead of the UID of the user but with Null
                        // so the script won't allow access
                       
                        XMLMaker mw = new XMLMaker ();
                        mw.MyWriter(reader["UID"].ToString ());
                        MessageBox.Show(reader.Read().ToString());
                        MessageBox.Show("");
                        MessageBox.Show("OK entered");
                        MessageBox.Show(reader["UID"].ToString ());
                        Form2 f2 = new Form2();
                        f2.Show();
                        this.Close();
                    }
                }
            }
            catch (Exception ex)
            {
                // should b nothing for now
                MessageBox.Show("password or username incorrect " + ex);
            }
            finally
            {
                conn.Close();
            }
        }

    
    }



}
