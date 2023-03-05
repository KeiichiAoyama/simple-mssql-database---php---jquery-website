<?php
    $serverName = "DELL\\SQLEXPRESS";
    $connectionInfo = array("Database" => "store");
    $conn = sqlsrv_connect($serverName, $connectionInfo);
?>