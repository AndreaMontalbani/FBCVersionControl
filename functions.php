<?php
/**
 * Created by PhpStorm.
 * User: Andrea
 * Date: 16/05/2018
 * Time: 15:30
 */

include 'connectionData.php';

/*connection varaibles*/


function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

function connectDB(){
    $servername = "localhost";
    $username = "root";
    $password = "puppet";
    $conn = new mysqli($servername, $username , $password);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    debug_to_console( "Connected successfully");

    $selectedDb=mysqli_select_db( $conn,'fbconnector');
    if (!$selectedDb) {
        die("Non posso usare fbconnector");
    }
    return $conn;
}

function checkExistPage($pageid,$conn)
{//ritorna true se la pagina è già presente

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return false;
    }

// Perform queries
    $result=mysqli_query($conn,"SELECT * FROM `pages` WHERE `Name`='".$pageid."'");

    if (mysqli_num_rows($result) > 0)
    {
        return true;
    }
    else
    {
        return false;
    }

}

function insertPageID($pageid,$conn){

    $sql = "INSERT INTO `pages`(`Name`) VALUES ('".$pageid."')";

    if ($conn->query($sql) === TRUE) {
        debug_to_console("New record created successfully");
    } else {
        debug_to_console("Error");    }

}

//prende la data di ultimo aggiornamento da db e aggiunge tutti i post successivi a quella data
function updatePage()
{


}

function fetchPageData()
{

}



?>