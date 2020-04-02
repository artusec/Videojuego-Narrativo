using System;
using RestSharp;
using System.Media;
using System.Net;

namespace ConsoleApp1
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine("Inicio!");
            var client = new RestClient("https://voicerss-text-to-speech.p.rapidapi.com/?&key=fed840ae6af4495d8aab93e3cded0c38&r=0&c=wav&f=8khz_8bit_mono&src=Hello%252C%20world!&hl=en-us&b64=true");
            var request = new RestRequest(Method.GET);
            request.AddHeader("x-rapidapi-host", "voicerss-text-to-speech.p.rapidapi.com");
            request.AddHeader("x-rapidapi-key", "5d5f7a227dmsh5c5d3b27197990dp175cf8jsn531456284eb3");
            IRestResponse response = client.Execute(request);
            


            var r = response.Content.Substring(22);
            r.Remove(r.Length - 1);
            Console.WriteLine(r);
            Byte[] b = Convert.FromBase64String(r);
            System.IO.File.WriteAllBytes(@"C:\Users\Fernando\Desktop\test.wav", b);


            //var audioBuffer = Convert.FromBase64String(response.Content);
           /* WebClient myWebClient = new WebClient();
            myWebClient.DownloadFile(response.Content, "audio.wav");*/
        }
    }
}
