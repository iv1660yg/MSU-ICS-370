<?php  

//insert.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
    ':user'  => $form_data->user,
    ':pass'  => $form_data->pass,
    ':fullname'  => $form_data->fullname,
    ':phone'  => $form_data->phone,
    ':account_type'  => $form_data->account_type
);

$query = "
 INSERT INTO users 
 (user, pass, fullname, phone, account_type) VALUES 
 (:user, :pass, :fullname, :phone, :account_type)
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