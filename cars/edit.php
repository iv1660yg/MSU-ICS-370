<?php  

//edit.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':priceperday'  => $form_data->priceperday,
 ':make'  => $form_data->make,
 ':model'  => $form_data->model,
 ':year'  => $form_data->year,
 ':color'  => $form_data->color,
 ':miles'  => $form_data->miles,
 ':status'  => $form_data->status,
 ':createDate'  => $form_data->createDate,
 ':endDate'  => $form_data->endDate,
 ':id'    => $form_data->id
);

$query = "
 UPDATE cars 
 SET priceperday = :priceperday, make = :make, model = :model, color = :color, miles = :miles, status = :status, createDate = :createDate, endDate = :endDate       
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