using System;
using System.Data.SQLite;

public class Class1
{
    public static int Main()
    {
        SQLiteClass bbdd = new SQLiteClass();
        bbdd.Conectar();
        SQLiteDataReader reader = bbdd.Consultar("select * from Usuarios");

        while (reader.Read())
        {
            string id = Convert.ToString(reader[0]);
            string nombre = Convert.ToString(reader[1]);

            Console.WriteLine(id);
            Console.WriteLine(nombre);
        }

        bbdd.Desconectar();
        return 0;
    }
}