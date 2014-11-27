<?php
//Database class include
	include_once 'initialize.php';
//Settings include
	include_once 'config.php';
	include_once 'phpmailer/class.phpmailer.php';

//Add form data to variables
	if(isset($_REQUEST["Name"])){
		$name        = $_REQUEST["Name"];
	}
	if(isset($_REQUEST["Phone"])){
		$phone       = $_REQUEST["Phone"];
	}
	if(isset($_REQUEST["Email"])){
		$email         = $_REQUEST["Email"];
	}

	$utm_source = $_REQUEST['utm_source'];
	$type       = $_REQUEST['type'];
	$source     = $_REQUEST['source'];
	$keyword    = $_REQUEST['keyword'];
	$time = date('d-m-Y H:i:s');


	$new_lead = array(
					'name'       => $name,
					'email'        => $email,
					'phone'      => $phone,
					'utm_source' => $utm_source,
					'type'       => $type,
					'source'     => $source,
					'keyword'    => $keyword,
					'addDate'    => $time
				);

//***********************************************************
//Check data is it already added
//***********************************************************
	if(Database::isAlreadyAdded($phone)){
		Database::Update($new_lead, $phone);
	}else{
		Database::Add($new_lead);
	}


//***********************************************************
//Email text
//***********************************************************
	$message = '<body><head></head><body>';
	$message .= '<table style="background: url('.$site.'/admin/img/top_bg.png) left bottom repeat-x, #E1EDF5;width: 100%;padding: 20px;">
					<tbody><tr>
						<td>
							<img src="'.$site.'/admin/img/logo.png" height="81" width="246" alt=""> 
						</td>
						<td align="right">
							<span style="font-size: 20px;">Звоните нам в любое удобное время<br>(727) 391 10 77</span>
						</td>
					</tr>
				</tbody></table><br>';
	$message .= '<p>Доброго времени суток.</p>';
	$message .= '<p>К Вам поступила заявка с сайта '.$site.'</p><hr>';

	$message .= '<table  style="margin-left: 50px; border-collapse: collapse; "><tbody>';
	$message .= '<tr><td style="border: 1px solid #000; padding:5px;">Имя: </td><td style="border: 1px solid #000; padding:5px;">'    .$name .'</td></tr>';
	$message .= '<tr><td style="border: 1px solid #000; padding:5px;">Телефон: </td><td style="border: 1px solid #000; padding:5px;">'.$phone.'</td></tr>';
	$message .= '<tr><td style="border: 1px solid #000; padding:5px;">Email: </td><td style="border: 1px solid #000; padding:5px;">'  .$email.'</td></tr>';
	
	if($utm_source){
		$message .= '<tr><td style="border: 1px solid #000; padding:5px;">Источник лида: </td><td style="border: 1px solid #000; padding:5px;"> ' .$utm_source .'</td></tr>';
		$message .= '<tr><td style="border: 1px solid #000; padding:5px;">Тип источника: </td><td style="border: 1px solid #000; padding:5px;"> ' .$type       .'</td></tr>';
		$message .= '<tr><td style="border: 1px solid #000; padding:5px;">Площадка: </td><td style="border: 1px solid #000; padding:5px;"> '      .$source     .'</td></tr>';
		$message .= '<tr><td style="border: 1px solid #000; padding:5px;">Ключевое слово: </td><td style="border: 1px solid #000; padding:5px;"> '.$keyword    .'</td></tr>';
	}
	$message .= '</table></tbody>';

	$message .= '';
	$message .= '<p>Ответ  на заявку в течение 30 минут повышает вероятность закрытия сделки на 30%</p>';
	$message .= '<p>'.$_REQUEST['from'].'</p></body></html>';

	$body = $message;


//***********************************************************
//PHPMailer
//***********************************************************
	$mail            = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth  = true;
	$mail->Host      = $from_server;
	$mail->Port      = 25;         
	$mail->Username  = $mailfrom;
	$mail->Password  = $pass; 
	// $mail->SMTPDebug  = 2; // enables SMTP debug information (for testing)

	$mail->SetFrom($mailfrom, $mailfrom);
	$mail->Subject = "=?utf8?Q?".str_replace("+","_",str_replace("%","=",urlencode('Новая заявка на страховку с сайта ogpo.kz')))."?=\r\n";
	$mail->AltBody = "Чтобы увидеть письмо, пожалуйста, используйте HTML-совместимый почтовый сервис!";
	$mail->MsgHTML($body);

	$mail->AddAddress($address1, $address1);
	
	if($address2){
		$mail->AddAddress($address2, $address2);
	}
	if($address3){
		$mail->AddAddress($address3, $address3);
	}
	if($address4){
		$mail->AddAddress($address4, $address4);
	}
	if (!empty($_FILES['Files']['name'])) {
		$mail->AddAttachment($_FILES['Files']['tmp_name'], $_FILES['Files']['name']);
	}

	//***********************************************************
	//Check to send an email
	//***********************************************************
	if(!$mail->Send()) {
		echo "Ошибка в передаче данных! Пожалуйста вернитесь назад и попробуйте заново.";
	} else {
		header("Location: ../thanks.php");
		exit;
	}
    
?>