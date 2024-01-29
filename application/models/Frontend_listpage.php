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

class Frontend_listpage extends CI_Model {
	var $limit = 9;

	function __construct(){
		parent::__construct();
	}

	function _index($pagenum=1, $Page_data){ //dd(Common_page_row('id'));
		$data = array();

		$this->load->library('pagination');

		$config = pagination();

		$config['uri_segment'] = 3;
		$config['base_url'] = $Page_data['Page_url'].'/page';

		$this->db->where('common_page', PAGE_ID);
		$config['total_rows'] = db_total_rows('listpages');
		
		$config['per_page'] = $this->limit;

		$this->pagination->initialize($config);

		if ($pagenum > 1){
			$offset = $this->limit*($pagenum-1);
			$this->db->limit($this->limit, $offset);
		} else {
			$this->db->limit($this->limit);
		}

		// if($this->uri->segment(2) == 'case-studies'){
		// 	$this->db->order_by('id', 'DESC');
		// }else{
		// 	$this->db->order_by('id', 'DESC');
		// }
		
		$this->db->order_by('id', 'DESC');
	
		if($this->uri->segment(1) == 'showcase' || $this->uri->segment(1) == 'our-showcase'){
			$this->db->where('common_page', 10);
			$this->db->select('taxonomies.name as title_category');
			$this->db->join('taxonomies', 'taxonomies.id = listpages.category_id', 'left');
			$list = db_entries_fields('listpages', 'listpages.*');
			// $list = module_entries('listpages', PAGE_ID, ['title', 'summary', 'content']);
			$data['list'] = $list;
		}else{

			$list = module_entries('listpages', PAGE_ID, ['title', 'summary', 'content']);
			$data['list'] = $list;
		}

		//$this->db->where("is_publish", 1);
		$this->db->order_by('id', 'asc');
		$taxo = db_entries('taxonomies');
		$data['taxonomies'] = $taxo;

		// $this->db->order_by('created_on', 'DESC');
		// $this->db->limit(5);
		// $list = module_entries('listpages');
		// $data['recent'] = $recent;
		//dd($data);
		return $data;
	}

	function _index_save($id=null, $Page_data){

			form_set('contact_name', 	'Your Name', 		'xss_clean|required|max_length[100]|strip_tags');
			form_set('contact_email', 	'Email Address', 	'xss_clean|required|valid_email|max_length[100]');
			form_set('contact_title', 	'Your Subject', 		'xss_clean|required|max_length[500]|strip_tags');
			// form_set('contact_phone', 	'Phone', 			'xss_clean|numeric|max_length[20]');
			// form_set('contact_company', 'Company', 			'xss_clean|max_length[200]|strip_tags');
			// form_set('contact_subject', 'Subject', 			'xss_clean|callback_fv_required_select|callback_fv_subject_exists');
			form_set('contact_message', 'Message', 			'xss_clean|required|max_length[50000]|strip_tags');
			// form_set_recaptcha();

			if (form_validate()){
				//$Subject = Subjects(form_post('contact_subject'));
				// dd($Subject);
				$Message = "Subscriber".
				"\nName : ".form_post('contact_name').
				"\nEmail: ".form_post('contact_email').
				"\nSubject : ".form_post('contact_title').
				"\n\n\n". form_post('contact_message');
				
				//"\n\n\n". 'Intended Recipient: '.$Subject['title'].'('.$Subject['email'].')';

				$Reply_to_email = form_post('contact_email');
				$Reply_to_name = form_post('contact_name');
				
				$this->save_to_database();
				//$this->send_with_codeigniter($Subject, $Message, $Reply_to_name, $Reply_to_email);
				//$this->send_with_phpmailer($Message, $Reply_to_name, $Reply_to_email);
				//$this->send_with_mailgun($Subject, $Message, $Reply_to_name, $Reply_to_email);

				set_cookie('home_sent', date('Y-m-d H:i:s'), 600);
				$this->session->set_flashdata('message', option_value('description_description'));
				redirect($Page_data['Page_url']);
			} else {
				$this->session->set_flashdata('warning', 'Something went wrong!');
				return $this->_index();
		}
	}

	private function save_to_database(){

		$data = array(
			'name' 			=> form_post('contact_name'),
			'email' 		=> form_post('contact_email'),
			'title_subject'	=> form_post('contact_title'),
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
	    	$mail->Host       = 'mail.headhunterindonesia.com';                    // Set the SMTP server to send through
	    	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    	$mail->Username   = 'website@headhunterindonesia.com';                     // SMTP username
	    	$mail->Password   = 'Ju!6{uj-k%KVpUo';                               // SMTP password
	    	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged, PHPMailer::ENCRYPTION_STARTTLS 587
	    	$mail->Port       = 465;

	    	$mail->setFrom('website@headhunterindonesia.com', 'Subscriber Headhunter !!!');
	        //$mail->addAddress($Subject['email'], $Subject['title']);   // Add a recipient
	        $mail->addAddress('senothoha77@gmail.com');
	        //$mail->addCC('suprianto@mt-pharma-id.com');

			//$mail->addAddress($Subject['email'], $Subject['title']);   // Add a recipient
		   	//$mail->addAddress('muhammad.dahri@gmail.com', $Subject['title']);
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    // $mail->addReplyTo($Reply_to_email);
		    $mail->addReplyTo(form_post('contact_email'), form_post('contact_name'));
		    // $mail->addCC('cc@example.com');
		    

		    // Content
		    $mail->isHTML(false);
		    //$mail->Subject = $Subject['title'];
		    $mail->Body    = $Message;

		    $mail->send();
		    //echo 'Message has been sent';
		} catch (Exception $e) {
		    if (!is_production()){
		    	die("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
		    }
		}
	}

	function _page($pagenum, $Page_data){
		$data = $this->_index($pagenum, $Page_data);
		$data['view'] = 'modules/listpage_frontend_index';

		return $data;
	}

	function _read($url){ //dd(Common_page_row('id'));
		$data = array();

		$row = db_entry('listpages', $url, 'url', ['title', 'content']);

		if (!empty($row)){
			$data['entry'] = $row;
			Common_crumb_push( $row['title'], null );

			// $this->db->order_by('created_on', 'DESC');
			// $this->db->limit(5);
			// $this->db->where('id !=', $row['id']);
			// $recent = module_entries('listpages');
			// $data['recent'] = $recent;
		} else {
			$data['is_404'] = true;
		}
		$this->db->select('taxonomies.*');
		
		$this->db->order_by('id', 'RANDOM');
		$this->db->limit(2);
		$this->db->join('taxonomies', 'taxonomies.id = listpages.category_id', 'left');
		$list = module_entries('listpages', PAGE_ID, ['title', 'summary', 'content']);
		$data['list'] = $list;

		return $data;
	}

	function _topic($id){ //dd(Common_page_row('id'));
		$data = array('view' => 'listpage_taxonomy');

		$this->db->where('topic_id', $id);
		$this->db->order_by('created_on', 'DESC');
		$list = module_entries('listpages', false, ['title', 'content']);
		$data['list'] = $list;

		$data['taxonomy'] = Taxonomy($id);

		return $data;
	}

	function _category($id){ //dd(Common_page_row('id'));
		$data = array('view' => 'listpage_taxonomy');

		$this->db->where('category_id', $id);
		$this->db->order_by('created_on', 'DESC');
		$list = module_entries('listpages', false, ['title', 'content']);
		$data['list'] = $list;

		$data['taxonomy'] = Taxonomy($id);

		return $data;
	}


}

/* End of file models/Frontend_listpage.php */
