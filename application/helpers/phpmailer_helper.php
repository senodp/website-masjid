<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
	C99 by Muhammad Dahri 
	http://commongoodguy.com/ 
*/

if (!function_exists('email_sender')){
	function email_sender($from=null, $to=null, $subject, $message, $is_html=true, $display_debug=false){
		$environment = ENVIRONMENT;
		$status = false;

		if ($environment == 'development' || strpos(current_url(), 'localhost')){
			$status = true;
			//$status = phpmailer_send($from, $to, $subject, $message, $is_html, $display_debug);
		} else {
			$status = codeignitermail_send($from, $to, $subject, $message, $is_html, $display_debug);
		}

	// 	RECONNECT, KEEP-ALIVE
		$CI =& get_instance();
		$CI->db->reconnect();

		return $status;
	}
}

if (!function_exists('codeignitermail_send')){
	function codeignitermail_send($from_email, $from_name, $to_email, $to_name, $subject, $message, $is_html=true, $display_debug=false){
		$CI =& get_instance();
		
		$CI->load->library('email');
	//	MANUAL PARAMETER SETUP
		// $config['protocol'] = 'sendmail';
		// $config['mailtype'] = 'html';
		// $config['charset'] 	= 'iso-8859-1';
		// $config['wordwrap'] = TRUE;
		// $CI->email->initialize($config);
		
		$CI->email->from($from_email, $from_name);
		
		//$CI->email->reply_to($to_email, $to_name);
		$CI->email->to($to_email, $to_name);
		//if (array_key_exists('cc', $to)) $CI->email->cc($to['cc']);
		
		$CI->email->subject($subject);
		$CI->email->message($message);

		if (!$CI->email->send())
			return false;
		else
			return true;
	}
}

if (!function_exists('phpmailer_send')){
	function phpmailer_send($from=null, $to=null, $subject, $message, $is_html=true, $display_debug=false){
		//$display_debug = true;
	if (is_array($to)){
		if (!class_exists('PHPMailer'))
			require APPPATH."third_party/PHPMailer/PHPMailerAutoload.php";

		$environment = ENVIRONMENT;
		//$environment = 'testing';

		if (!is_array($from)){
			if ($environment == 'development' || strpos(current_url(), 'localhost')){
				$from = array(
					'email'	=> 	'',
					'name'	=> 	''
				);
			} else {
				$from = array(
					'email'	=> 	'',
					'name'	=> 	''
				);
			}
		}

		//Create a new PHPMailer instance
		$mail = new PHPMailer();
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		if ($display_debug === true)
			$mail->SMTPDebug = 2;
	 	else
	 		$mail->SMTPDebug = 0;
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		
		if ($environment == 'development'){
			//Set the hostname of the mail server
			$mail->Host = "mail.dataclient.net";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 26;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			//Username to use for SMTP authentication
			$mail->Username = "noreply@dataclient.net";
			//Password to use for SMTP authentication
			$mail->Password = "Passw0rt486";
		} else {
			//Set the hostname of the mail server
			$mail->Host = "mail.dataclient.net";
			//Set the SMTP port number - likely to be 25, 465 or 587
			$mail->Port = 26;
			//Whether to use SMTP authentication
			$mail->SMTPAuth = true;
			//Username to use for SMTP authentication
			$mail->Username = "noreply@dataclient.net";
			//Password to use for SMTP authentication
			$mail->Password = "Passw0rt486";
		}

		//Set who the message is to be sent from
		$mail->setFrom($from['email'], $from['name']);
		//Set an alternative reply-to address
		if (array_key_exists('reply_to', $to)){
			if (is_array($to['reply_to']))
				$mail->addReplyTo($to['reply_to']['email'], $to['reply_to']['name']);
		}

		if (array_key_exists('cc', $to)){
			if (is_array($to['cc']))
				$mail->addCC($to['cc']['email'], $to['cc']['name']);
		}
		//Set who the message is to be sent to
		$mail->addAddress($to['email'], $to['name']);
		$mail->isHTML($is_html);                                  // Set email format to HTML
		//Set the subject line
		$mail->Subject = $subject;
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body

		$mail->Body       = $message;                      //HTML Body
		//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		//$mail->WordWrap   = 50; // set word wrap
		//$mail->MsgHTML("Hi,<br>This is the HTML BODY<br>");

		//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
		//Replace the plain text body with one created manually
		//$mail->AltBody = 'This is a plain-text message body';
		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');

		//send the message, check for errors
		

		if ($display_debug === true){
			$mail->send();
			die();
		} else {
			if (!$mail->send())
			    return false;
			else
				return true;
		}
	}
	}
}

/* End of file helper/control_helper.php */
