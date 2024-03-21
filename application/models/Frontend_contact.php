<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
	C99 by Muhammad Dahri
	http://commongoodguy.com/
*/

require_once APPPATH.'third_party/phpmailer/src/PHPMailer.php';
require_once APPPATH.'third_party/phpmailer/src/SMTP.php';
require_once APPPATH.'third_party/phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Mailgun\Mailgun;

class Frontend_contact extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function _index(){
		$data = array();

		Common_html_head_push('
			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			<style>.form-plugin .invalid-feedback { display: block; }</style>
		');

		//$this->db->where("is_publish", 1);
		//$this->db->order_by('sorting', 'asc');
		$vacancies = module_entries('vacancies');
		$data['vacancies'] = $vacancies;

		return $data;
	}

	function _index_save($id=null, $Page_data){

			form_set('contact_name', 	'Your Name', 		'xss_clean|required|max_length[100]|strip_tags');
			form_set('contact_email', 	'Email Address', 	'xss_clean|required|valid_email|max_length[100]');
			// form_set('contact_title', 	'Your Subject', 		'xss_clean|required|max_length[500]|strip_tags');
			// form_set('contact_phone', 	'Phone', 			'xss_clean|numeric|max_length[20]');
			// form_set('contact_company', 'Company', 			'xss_clean|max_length[200]|strip_tags');
			form_set('contact_subject', 'Subject', 			'xss_clean|callback_fv_required_select|callback_fv_subject_exists');
			form_set('contact_message', 'Message', 			'xss_clean|required|max_length[50000]|strip_tags');
			// form_set_recaptcha();

			if (form_validate()){
				$Subject = Subjects(form_post('contact_subject'));
				// dd($Subject);
				$Message = "Let's Decode!".
				"\nName : ".form_post('contact_name').
				"\nEmail : ".form_post('contact_email').
				"\nSubject : ".form_post('contact_subject').
				"\n\n\n". form_post('contact_message');
				
				//"\n\n\n". 'Intended Recipient: '.$Subject['title'].'('.$Subject['email'].')';

				$Reply_to_email = form_post('contact_email');
				$Reply_to_name = form_post('contact_name');
				
				$this->save_to_database($Subject['id']);
				//$this->send_with_codeigniter($Subject, $Message, $Reply_to_name, $Reply_to_email);
				//$this->send_with_phpmailer($Message, $Reply_to_name, $Reply_to_email);
				//$this->send_with_mailgun($Subject, $Message, $Reply_to_name, $Reply_to_email);

				set_cookie('home_sent', date('Y-m-d H:i:s'), 600);
				$this->session->set_flashdata('message', option_value('description_description'));
				redirect($Page_data['Page_url']);
			} else {
				$this->session->set_flashdata('warning', 'Opps, ada yang salah dalam pengisian form, mohon cek kembali');
				return $this->_index();
		}
	}

	private function save_to_database($subject_id){

		$data = array(
			'subject_id'    => $subject_id,
			'name' 			=> form_post('contact_name'),
			'email' 		=> form_post('contact_email'),
			//'title_subject'	=> form_post('contact_title'),
			'message' 		=> form_post('contact_message')
			
		);

		$data['updated_by'] = '0';
		$data['updated_on'] = current_date();
		$data['created_by'] = '0';
		$data['created_on'] = current_date();

		$this->db->insert('inbox', $data);
		$inboxsubscribe_id = $this->db->insert_id();

		return $inboxsubscribe_id;
	}

	private function send_with_phpmailer($Message, $Reply_to_name, $Reply_to_email){
		$mail = new PHPMailer(true);

		try {
		    //Server settings
			// $mail->SMTPDebug 		= SMTP::DEBUG_SERVER;                      // Enable verbose debug output
			$mail->Timeout 			= 60;

	    	$mail->isSMTP(); 
	    	$mail->Host       = 'mail.sabtacular.com';                    // Set the SMTP server to send through
	    	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    	$mail->Username   = 'admin@sabtacular.com';                     // SMTP username
	    	$mail->Password   = 'admin123!@#A';                               // SMTP password
	    	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged, PHPMailer::ENCRYPTION_STARTTLS 587
	    	$mail->Port       = 465;

	    	$mail->setFrom('admin@sabtacular.com', 'sabtacular.com Mailer');
	        //$mail->addAddress($Subject['email'], $Subject['title']);   // Add a recipient
	        //$mail->addAddress('senothoha77@gmail.com', $Subject['title']);

	        $this->db->from('vacancies');
			$this->db->where('deleted_by', 0);
			$rawdata = $this->db->get()->result_array();
			$data = array();
			foreach($rawdata as $row)
			{
			  $mail->addAddress($data[$row['title']] = $row);
			}
	        //$mail->addAddress(option_value('penerima'));
	        // if($Subject['title'] == 'Office'){
	        // 	$mail->addAddress(option_value('penerima'), $Subject['title']);	
	        // }else{
	        // 	$mail->addAddress(option_value('penerima'), $Subject['title']);	
	        // }
	        
	        //$mail->addCC('suprianto@mt-pharma-id.com');

			//$mail->addAddress($Subject['email'], $Subject['title']);   // Add a recipient
		   	//$mail->addAddress('muhammad.dahri@gmail.com', $Subject['title']);
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    $mail->addReplyTo(form_post('contact_email'), form_post('contact_name'));
		    // $mail->addCC('cc@example.com');
		    

		    // Content
		    $mail->isHTML(false);
		    $mail->Subject = "Let's Decode!";
		    $mail->Body    = $Message;

		    $mail->send();
		    //echo 'Message has been sent';
		} catch (Exception $e) {
		    if (!is_production()){
		    	die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
		    }
		}
	}
}

/* End of file models/Frontend_contact.php */
