using System;
using System.Data.SQLite;

class SQLiteClass
{
    private SQLiteConnection conn;
    private SQLiteDataReader reader;
    private SQLiteCommand command;

    public void Conectar()
    {
        /* Aqui debería ir la ruta del archivo .sqlite donde esta la base de datos */
        conn = new SQLiteConnection("Data Source=C:/Users/artur/source/repos/BBDD/BBDD/BBDD_Videojuego_Narrativo");
        conn.Open();
    }

    public void Desconectar()
    {
        conn.Close();
    }

    public SQLiteDataReader Consultar(String consulta)
    {
        command = new SQLiteCommand(consulta, conn);
        reader = command.ExecuteReader();
        return reader;
    }
}