<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function connect(){
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function select ($conn) {
    $sql = "SELECT * FROM datas"; 
    $result = mysqli_query($conn, $sql);

    $a = array();

    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
    }      
    return $a;
}

function fetchNameSelect ($conn) {
    $request = $_POST['request'];
    $sql = "SELECT * FROM datas WHERE name='$request'";
    $result = mysqli_query($conn, $sql);

    $a = array();

    if (mysqli_num_rows($result) > 0) {
        while($row = $result->fetch_assoc()) {
            $a[] = $row;
        }
    }     
    return $a;
}

function pagination_count ($conn) {
    $sql = "SELECT * FROM datas";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($result);
    return ceil($result/3);
}

function close ($conn) {
    mysqli_close($conn);
}

