<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kecamatan = $_POST['kecamatan'];
    $longtitude = $_POST ['longtitude'];
    $latitude = $_POST ['latitude'];
    $luas = $_POST['luas'];
    $jumlah_penduduk=$_POST['jumlah_penduduk'];

    //sesuaikan dengan setting MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pgweb_acara8";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO pgweb_acara8 (kecamatan, longtitude, latitude, luas, jumlah_penduduk)
            VALUES ('$kecamatan', '$longtitude','$latitude','$luas','$jumlah_penduduk')";

    if ($conn->query($sql)===TRUE){
        echo "New record created successfully";
    }else{
        echo "Error:" .$sql ."<br>" .$conn->error;
    }

    $conn->close();

    header("Location: index.php");
    exit();
}
?>