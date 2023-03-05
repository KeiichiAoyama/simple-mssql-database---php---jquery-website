<?php
        include 'test.php';
        $x = $_POST['i'];
        if($x > 5){
          $x = 1;
        }
        $r = "'kd00".$x."'";
        $res = sqlsrv_query($conn, "SELECT * FROM isi WHERE kode_barang = ".$r, array(), array( "Scrollable" => 'static' ));
        $row = sqlsrv_fetch_array($res);
        if($res == false){
          $errors = sqlsrv_errors();
          foreach ($errors as $error) {
            echo "SQLSTATE: ".$error['SQLSTATE']."<br />";
            echo "Code: ".$error['code']."<br />";
            echo "Message: ".$error['message']."<br />";
          }
        }
        if(sqlsrv_num_rows($res) > 0){
          echo "<h1>".$row['kode_barang']."</h1>";
          echo "<table> <tr>".
                "<td>".
                $row['nama_barang'].
                "</td>".
                "<td>".
                $row['harga_barang'].
                "</td>".
                "<td>".
                $row['kuantiti_barang'].
                "</td>".
                "</tr> </table>";
        }
      ?>