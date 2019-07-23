using System;
using System.Collections.Generic;
using System.Linq;
using MySql.Data;
using System.Data;
using MySql.Data.MySqlClient;
using System.Text;
using System.Threading.Tasks;

namespace gimpcloud
{
    class Sqlcl
    {

        MySqlConnection conn = new MySqlConnection("server=gimpcloud.db.7684787.f67.hostedresource.net;database=gimpcloud;uid=gimpcloud;password=M01!artinfan");
        MySqlCommand adddapter;
        XMLMaker xs = new XMLMaker();

        public String Update(String URL, String tabel)
        {
            
                conn.Open();
                adddapter = new MySqlCommand("UPDATE "+ tabel + " SET image_url = '" + URL + "' WHERE UID = '" +  xs.FileReader () + "'", conn);
            
                adddapter.ExecuteNonQuery();
                conn.Close();
            return null;
                
        }
        public String Query (String tbl, String rwo)
        {
            try
            {
                conn.Open();
                adddapter = new MySqlCommand("SELECT * FROM " + tbl, conn);

                using (MySqlDataReader reader = adddapter.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        return reader[rwo].ToString();
                    }
                    return null;
                }
            }
            catch (Exception ex)
            {
                return ex.ToString();
            }
            finally
            {
                conn.Close();
            }

        }
    }
}
