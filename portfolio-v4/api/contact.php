<?php
header('Content-Type: application/json');
require_once dirname(__DIR__).'/config.php';
if($_SERVER['REQUEST_METHOD']!=='POST'){echo json_encode(['success'=>false]);exit;}
$name=trim(strip_tags($_POST['name']??''));
$email=trim(strip_tags($_POST['email']??''));
$message=trim(strip_tags($_POST['message']??''));
if(!$name||!$email||!$message||!filter_var($email,FILTER_VALIDATE_EMAIL)){
  echo json_encode(['success'=>false,'error'=>'Invalid input.']);exit;
}
mail(CONTACT_EMAIL,'[Portfolio] Message from '.$name,"Name: $name\nEmail: $email\n\n$message","Reply-To: $email");
echo json_encode(['success'=>true]);
