import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;

/**
 * Created by ASUS on 31/05/2017.
 */
public class json_reader {
    public static void main(String[]args) {
        //URL u = new URL("http://localhost/cuaca/class/getweather.php?city=" + args[0]);
        String cURL = "http://localhost/cuaca/class/getweather.php?city=" + args[0];
        URL u = null;
        try {
            u = new URL(cURL);
        } catch (MalformedURLException e) {
            e.printStackTrace();
        }
        URLConnection c = null;
        try {
            c = u.openConnection();
        } catch (IOException e) {
            e.printStackTrace();
        }
        InputStream r = null;
        try {
            r = c.getInputStream();
        } catch (IOException e) {
            e.printStackTrace();
        }
        BufferedReader reader = new BufferedReader(new InputStreamReader(r));
        try {
            for(String line; (line = reader.readLine()) != null;) System.out.println(line);
        } catch (IOException e) {
            e.printStackTrace();
        }
        ;
    }
}

//Program Json ini kmi kerjakan dengan menghasilkan output tidak dalam bentuk aplikasi, sehingga gambar tidak dapat keluar.
//Tapi, dapat dijalankan hanya pada InteliJ saja.
//Hasil yang ditampilkan dari program ini, hanya berupa isi dari JSon cuaca saja.
//Aplikasi dalam xampp/htdocs, langsung kami sediakan di dalam folder src