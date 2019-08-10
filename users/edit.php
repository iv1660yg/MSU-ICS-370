<?php  

//edit.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':user'  => $form_data->user,
 ':pass'  => $form_data->pass,
 ':fullname'  => $form_data->fullname,
 ':email'  => $form_data->email,
 ':phone'  => $form_data->phone,
 ':account_type'  => $form_data->account_type,
 ':id'    => $form_data->id
);

$query = "
 UPDATE users 
 SET user = :user, pass = :pass, fullname = :fullname, email = :email, phone = :phone, account_type = :account_type, miles = :miles      
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