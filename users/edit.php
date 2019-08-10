<?php  

//edit.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':fullname'  => $form_data->fullname,
 ':pass'  => $form_data->pass,
 ':address'  => $form_data->address,
 ':phone'  => $form_data->phone,
 ':email'  => $form_data->email,
 ':account_type'  => $form_data->account_type,
 ':uid'    => $form_data->uid
);

$query = "
 UPDATE users 
 SET fullname = :fullname, pass = md5(:pass), address = :address, phone = :phone, email = :email, account_type = :account_type   
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