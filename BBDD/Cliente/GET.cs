using System;
using System.Net.Http;
using System.Threading.Tasks;

namespace HttpClientEx
{
    class Program
    {
        static async Task Main(string[] args)
        {
            using var client = new HttpClient();
            var content = await client.GetStringAsync("http://laslomasiii.serveftp.net:4398/hola_mundo.php");
            Console.WriteLine(content);
        }
    }
}