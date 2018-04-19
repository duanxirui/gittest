<?php
/**
 * [send_email 使用 mandrill 发送邮件]
 * @param  [type] $to_email [发送邮箱]
 * @param  [type] $subject  [邮件说明]
 * @param  [type] $message1 [发送的信息]
 * @return [type]           [description]
 */
function send_email($to_email,$subject,$message1){
	require_once 'Mandrill.php';
	$apikey = 'XXXXXXXXXX'; //specify your api key here
	$mandrill = new Mandrill($apikey);
	 
	$message = new stdClass();
	$message->html = $message1;
	$message->text = $message1;
	$message->subject = $subject;
	$message->from_email = "blog@koonk.com";//Sender Email
	$message->from_name  = "KOONK";//Sender Name
	$message->to = array(array("email" => $to_email));
	$message->track_opens = true;
	 
	$response = $mandrill->messages->send($message);
}

$to = "abc@example.com";
$subject = "This is a test email";
$message = "Hello World!";
send_email($to,$subject,$message);
