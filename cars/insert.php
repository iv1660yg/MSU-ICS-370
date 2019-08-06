<?php  

//insert.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':first_name'  => $form_data->first_name,
 ':last_name'  => $form_data->last_name
);

$query = "
 INSERT INTO tbl_sample 
 (first_name, last_name) VALUES 
 (:first_name, :last_name)
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