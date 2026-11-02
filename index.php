<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pgweb_acara8";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM pgweb_acara8";
    $result = $conn->query($sql);
    
    echo "<a href='input/index.html'>Input</a>";
    if ($result->num_rows > 0) {
        // 1. Properly closed the echo string, <tr>, and <th> tags
        echo "<table border='1px'>
                <tr>
                    <th>id</th>
                    <th>kecamatan</th>
                    <th>longtitude</th>
                    <th>latitude</th>
                    <th>luas</th>
                    <th>jumlah_penduduk</th>
                </tr>";

        // 2. Fixed string concatenations and included all 6 database columns to match the headers
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["kecamatan"] . "</td>
                    <td>" . $row["longtitude"] . "</td>
                    <td>" . $row["latitude"] . "</td>
                    <td>" . $row["luas"] . "</td>
                    <td align='right'>" . $row["jumlah_penduduk"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    
    $conn->close();
?>