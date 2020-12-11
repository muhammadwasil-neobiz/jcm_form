<?php
    $serverName = "DESKTOP-48QCR8F\SQLEXPRESS";

    //$connectionInfo = array("Database"=>"DBNovaPlastProductionAll");

    $conn = new PDO('sqlsrv:Server=DESKTOP-48QCR8F\SQLEXPRESS; Database=DBNovaPlastProductionAll','','');

    $conn->setAttribute(constant('PDO::SQLSRV_ATTR_DIRECT_QUERY'), true);  

    
    
?>