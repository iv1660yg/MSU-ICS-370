<?php  

//insert.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':userID'  => $form_data->userID,
 ':carID'  => $form_data->carID,
 ':pickupdate'  => $form_data->pickupdate,
 ':returndate'  => $form_data->returndate,
 ':destination'  => $form_data->destination,
 ':total'  => $form_data->total,
 ':statusID'  => $form_data->statusID
);

$query = "
 INSERT INTO reservation 
 (userID, carID, pickupdate, returndate, destination, total, statusID) VALUES 
 (:userID, :carID, :pickupdate, :returndate, :destination, :total, :statusID)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 $message = 'Data Inserted';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>