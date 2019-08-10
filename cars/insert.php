<?php  

//insert.php

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
 ':type'  => $form_data->type,
 ':createDate'  => $form_data->createDate,
 ':endDate'  => $form_data->endDate
);

$query = "
 INSERT INTO cars 
 (priceperday, make, model, year, color, miles, status, type, createDate, endDate) VALUES 
 (:priceperday, :make, :model, :year, :color, :miles, :status, type, :createDate, :endDate)
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