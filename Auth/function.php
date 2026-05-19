<?php

function clean_input($data)
{
    $data = trim($data);            // Faltu spaces khatam karne ke liye
    $data = stripslashes($data);    // Unwanted backslashes hatane ke liye
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // XSS se bachne ke liye
    return $data;
}
function insertData($table, $dataArray)
{
    global $conn;
    $columns = implode(", ", array_keys($dataArray));
    $cleanedValues = array_map(function ($val) {
        return "'" . clean_input($val) . "'";
    }, array_values($dataArray));
    $values = implode(", ", $cleanedValues);
    $insert = "INSERT INTO $table($columns)
               VALUES($values)";

    return mysqli_query($conn, $insert);
}
function selectQuery($table,$colName,$value){
     global $conn;
    return mysqli_query($conn , "select $colName from $table where $colName = '$value'");

}
