<?php  

//edit.php

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
 ':statusID'  => $form_data->statusID,
 ':id'    => $form_data->id
);

$query = "
 UPDATE cars 
 SET userID = :userID, carID = :carID, pickupdate = :pickupdate, returndate = :returndate, destination = :destination, total = :total, statusID = :statusID      
 WHERE id = :id
";

$statement = $connect->prepare($query);
if($statement->execute($data))
{
 $message = 'Data Edited';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>