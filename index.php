<?php
  include 'test.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="jquery-3.6.3.min.js"></script>
    <script>
      $(document).ready(function(){
        let i = 1;
        $(".btn").click(function(){
          if(i < 5){
            i++;
          }else{
            i = 1;
          }
          $(".isi").load("run.php", {
            i: i
          });
        });
      });
    </script>
  </head>
  <body>
    <div class="isi">
      <?php
        $r = "'kd001'";
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
    </div>
    <button class="btn">NEXT</button>
  </body>
</html>
