using System;
using System.Text;
using System.Net.Http;
using System.Threading.Tasks;
using Newtonsoft.Json;

namespace HttpClientPost
{
    class Person
    {
        public string Name { get; set; }
        public string Password { get; set; }

        public override string ToString()
        {
            return $"{Name}: {Password}";
        }
    }

    class Program
    {
        static async Task Main2(string[] args)
        {
            var person = new Person();
            person.Name = "John Doe";
            person.Password = "gardener";

            var json = JsonConvert.SerializeObject(person);
            var data = new StringContent(json, Encoding.UTF8, "application/json");

            var url = "http://laslomasiii.serveftp.net:4398/hola_mundo.php";
            using var client = new HttpClient();

            var response = await client.PostAsync(url, data);

            string result = response.Content.ReadAsStringAsync().Result;
            Console.WriteLine(result);
        }
    }
}
