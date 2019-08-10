<?php  

//edit.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':user'  => $form_data->user,
 ':pass'  => $form_data->pass,
 ':fullname'  => $form_data->fullname,
 ':phone'  => $form_data->phone,
 ':email'  => $form_data->email,
 ':account_type'  => $form_data->account_type,
 ':uid'    => $form_data->uid
);

$query = "
 UPDATE users 
 SET user = :user, pass = :pass, fullname = :fullname, phone = :phone, email = :email, account_type = :account_type   
 WHERE uid = :uid
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