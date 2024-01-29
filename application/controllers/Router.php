<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Router extends Base_Controller {

	var $authorize = false;
	var $standalone_modules = array( 
		'Frontend_searchjob',
		'Frontend_job',
		'Frontend_search',
		'Frontend_tag',
		'Frontend_select',
		'Frontend_candidates',
		'Frontend_jobopening',
		'Backend_page',
		'Backend_user',
		'Backend_mediamanager',
		'Backend_taxonomy',
		'Backend_attachment',
		'Backend_subject',
		'Backend_manual'
	);

	function __construct(){
		parent::__construct();

		$this->load->model('Common_page');

		$this->form_validation->set_message('fv_required_select', 'The {field} field is required.');
		$this->form_validation->set_message('fv_unique_field', '{field} already exists, please enter different value.');
		$this->form_validation->set_message('fv_field_exists', 'invalid value entered for {field}');
		$this->form_validation->set_message('fv_subject_exists', 'The {field} field is required.');
		$this->form_validation->set_message('fv_recaptcha', 'The {field} field is required.');

		if ( !is_dir('uploads/') ){

			set_error_handler("Common_error_handler");
			try {
			   mkdir('uploads/');
			} catch(ErrorException $ex) {
			   Common_notification_push("Error: " . $ex->getMessage());
			}
			restore_error_handler();

			if ( is_dir('uploads/') ){
				mkdir('uploads/cache/');
				mkdir('uploads/media/');

				if ( is_dir('uploads/cache/') ){
					mkdir('uploads/cache/media/');
				}
			}
		}

		// Common_notification_push("Test notificatin");
	}

	public function index(){
		$this->frontend();
	}

	private function Page_data_filter(&$Page_data){
		$Prefix = $Page_data['Prefix'];

		$Page_data['Menu_parents'] = $this->Site->Menu_parents($Prefix);// dd($Page_data['Menu_parents']);
		$Page_data['Menu_children'] = $this->Site->Menu_children(null, $Prefix);
		$Page_data['Menu_hidden'] = $this->Site->Menu_hidden();
		$Page_data['Pages'] = $this->Site->Pages();
	}

	public function frontend($Page_name='home', $Page_action='index', $Page_id='', $Page_segment=1){
		//Common_crumb_push('Home', '');
		//dd($Page_name);
		$Page_data = $this->Load_data('Frontend', $Page_name, $Page_action, $Page_id, $Page_segment);
		//dd($Page_data);
		$this->Load_view($Page_data);
	}

		public function frontend_i18n($lang, $Page_name='home', $Page_action='index', $Page_id=''){
			$lang_code = $lang;
			//dd($lang);
			if (in_array($lang_code, languages())){
				$this->session->set_userdata('language_preference', $lang_code);
				$this->frontend($Page_name, $Page_action, $Page_id, 2);
				//redirect_site(str_replace($lang.'/', '', $this->uri->uri_string()));
			} else {
				$this->show_404();
			}
		}

		public function frontend_i18n_default($Page_name='home', $Page_action='index', $Page_id=''){
			$this->session->set_userdata('language_preference', lang_default());
			$this->frontend($Page_name, $Page_action, $Page_id);
			// $uri_string = uri_string();

			// if ( (substr($uri_string, 0, 3) == 'en/') || (substr($uri_string, 0, 3) == 'id/') ){
			// 	$this->show_404();	
			// } else {
			// 	redirect(lang_preferred(true).'/'.uri_string(), 'auto', 301);
			// }
		}

	public function backend($Page_name='home', $Page_action='index', $Page_id=''){
		$this->restrict_access();

		$this->load->helper('tag');
		$this->load->helper('control');
		$this->load->model('Common_form');

		if (is_logged_in()){
			if ( ! (is_admin() || is_editor()) ){
				redirect_site();
			}
			//dd($Page_name);
			if (!is_allowed($Page_name)){
				redirect_site();
			}
		} else {
			if ($Page_name != 'login'){
				redirect_site('login');
			}
		}

		//dd($this->ion_auth->get_users_groups()->result(), 'USER GROUPS')

		$Page_data = $this->Load_data('Backend', $Page_name, $Page_action, $Page_id);
		//dd($Page_data);

		$this->Load_view($Page_data);
	}

	protected function Load_data($Prefix, $Page_name, $Page_action, $Page_id, $Page_segment = 1){
		$Page_entry_exists = false;
		$Page_model_exists = false;

		$Page_name = xss_clean($Page_name);
		$Page_action = str_replace('-', '_', xss_clean($Page_action));
		$Page_id = xss_clean($Page_id);

		$Page = db_entry_fill('pages', $Page_name, 'url', [], ['title']); 
		// dd($Page);

		$Page_data = array(
			'id' => null,
			'Page_name' => $Page_name,
			'Page_action' => $Page_action,
			'Page_id' => $Page_id,
			'Prefix' => $Prefix,
			'Page' => $Page,
			'is_404' => false
		); //dd($Page_data);

		$this->Page_data_filter($Page_data);

		$Page_prefix = strtolower($Page_data['Prefix']);

		$Prefix = $Prefix.'_';
		$Page_class = $Prefix.$Page_name;
		//dd(CI_model_exists($Page_class));
		//dd($Page_class);
		//dd(in_array($Page_class, $this->standalone_modules));
		if ( CI_model_exists($Page_class) && in_array($Page_class, $this->standalone_modules) ){
			$Page_model_exists = true; //dd($Page_model_exists);
			$Page_data['Template'] = $Page_name;

			if (!empty($Page)){
				$Page_entry_exists = true;
				$Page_data['Page'] = $Page; //dd($Page);

				if ($Page_prefix == 'frontend'){
					Common_crumb_push( $Page['title'], $Page['url'] );
				}
			}
		} else {
			if (!empty($Page)){
				$Page_url = $Page['url'];

				if ($Page['template'] == 'menu'){
					$Parent = array();

					$this->Load_data_menu($Page_prefix, $Page_url, $Parent, $Page, $Page_segment);

					$Page_data['Page_name'] = uri_segment($Page_segment);
					$Page_data['Page_action'] = ( uri_segment($Page_segment+1) )? uri_segment($Page_segment+1) : 'index';
					$Page_data['Page_id'] = uri_segment($Page_segment+2);

					$Page_data['Page_action'] = str_replace('-', '_', xss_clean($Page_data['Page_action']));

					$Page_name = $Page_data['Page_name'];
					$Page_action = $Page_data['Page_action'];
					$Page_id = $Page_data['Page_id'];

					if ($Page_prefix == 'frontend'){
						Common_crumb_push( $Page['title'], $Parent['url'].'/'.$Page['url'] );
					}
				} else { //dd($Page_prefix);
					if ($Page_prefix == 'frontend' && $Page['template'] !== 'service'){
						Common_crumb_push( $Page['title'], $Page['url'] );
					} else {
						Common_crumb_push( $Page['title'], null );
					}
				}
			}
			//dd(empty($Page['id']));
			if (!empty($Page['id'])){
				$Page_entry_exists = true;

				$Page_data['Page'] = $Page;
				$Page_options = [];
				if ( !empty($Page['template']) ){
					$Page_class = $Prefix.$Page['template'];

					$Page_options = (empty($Page['template_options']))? $Page_options : explode(',', $Page['template_options']);
				} else { //dd($Page);
					$Page_class = $Prefix.$Page['url'];
				}

				$Page_data['Page_options'] = $Page_options;
				
				//dd($Page_class);
				//dd(CI_model_exists($Page_class));
				//dd( is_string($Page_action) );
				if (CI_model_exists($Page_class) && is_string($Page_action)){
					$Page_model_exists = true; //dd($Page_model_exists);
				} else {
					$Page_class = $Prefix.'singlepage';

					if (CI_model_exists($Page_class) && $Page_action == 'index'){
						$Page_model_exists = true;
					}
				}
			} else {
				//$Page_entry_exists = false;
			}
		}  //dd($Page_data);
		//dd($Page_entry_exists, 'Page entry exists');
		if (is_production() && !$Page_model_exists && !$Page_entry_exists){
			$this->show_404();
		}

		if (!$Page_model_exists && !$Page_entry_exists){
			//$this->show_404();
		}

		if ($Page_entry_exists){
			$this->Common_page->data = $Page_data;
			$this->Common_page->row = $Page;
			define('PAGE_ID', $Page['id']);
		}

		if ( $Page_prefix == 'backend' ){
			$Page_data['Page_url'] = control_url($Page_data['Page_name']);
		} elseif ( !empty($Page_url) ) {
			$Page_data['Page_url'] = site_url($Page_url);
		} else {
			$Page_data['Page_url'] = site_url($Page_data['Page_name']);
		}
		
		//dd($Page_class);
		//dd(method_exists($this, $Page_class));
		if ($Page_model_exists){
			$this->load->model($Page_class, 'Page');

			$this->Page->name = $Page_name;
			$this->Page->Name = ucfirst($Page_name);
			$this->Page->db_table = plural($Page_name); //dd(plural('spot'));
			//dd($this->Page);
			//dd(property_exists($this->Page, 'index_only'));
			//dd(isset($this->Page->index_only));
			if (property_exists($this->Page, 'index_only')){
				$Page_id = $Page_action;
				$Page_data['Page_id'] = $Page_action;

				$Page_action = 'index';
				$Page_data['Page_action'] = $Page_action;
			} //dd($Page_method);

			$Page_method = '_' . $Page_action;

			$Page_submit_method = $Page_method . '_save';
			$Page_submit_data = null;
			//dd($this->Page);
			if (is_submit()){
				if (method_exists($this->Page, $Page_submit_method)){
					$Page_submit_data = $this->Page->$Page_submit_method($Page_id, $Page_data);
				}
			}

			if (method_exists($this->Page, $Page_method) ){

				if (is_submit() && is_array($Page_submit_data)){
					$Page_module_data = $Page_submit_data;
				} else {
					$Page_module_data = $this->Page->$Page_method($Page_id, $Page_data);
				} //dd($Page_module_data);

				$Page_data = array_merge($Page_data, $Page_module_data);
			}
		}

		if ($Page_data['is_404'] === true){
			$this->show_404();
		}
		//dd($Page_data);

		return $Page_data;
	}

		protected function Load_data_menu($Page_prefix, &$Page_url, &$Parent, &$Page, &$Page_segment){
			$Page_segment++;
			
			if ($Page_prefix == 'frontend'){
				Common_crumb_push( $Page['title'], null );
			}
			
			$Parent = $Page;
			//var_dump($Page_segment); echo "\n<br>";
			//var_dump(uri_segment($Page_segment)); echo "\n<br>";
			$Parent_url = (!empty($Page['parent_url']))? $Page['parent_url'].'/'.$Page['url'] : $Page['url'];
			$this->db->where('parent_url', $Parent_url);
			$Page = db_entry('pages', uri_segment($Page_segment), 'url', ['title']);
			// var_dump($Page); echo "\n\n\n<br><br><br>";
			if (!empty($Page)){
				$Page_url .= '/'.$Page['url'];
			}
			if ($Page['template'] == 'menu'){
				$this->Load_data_menu($Parent, $Page_url, $Parent, $Page, $Page_segment);
			}
		}

	protected function Load_view($Page_data){ //dd($Page_data);
		$Page = $Page_data['Page'];

		$Page_prefix = strtolower($Page_data['Prefix']);

		// $Page_data['view'] = $Page['view'];

		if (!array_key_exists('view', $Page_data)){
			$Module_template_by_Page_name = 'modules/'.strtolower($Page_data['Page_name'].'_'.$Page_prefix.'_'.$Page_data['Page_action']);
			$Module_template_by_Page_template = 'modules/'.strtolower($Page['template'].'_'.$Page_prefix.'_'.$Page_data['Page_action']);;

			$Template_by_Page_name = strtolower($Page_prefix.'/'.$Page_data['Page_name'].'_'.$Page_data['Page_action']); 
			$Template_by_Page_template = strtolower($Page_prefix.'/'.$Page['template'].'_'.$Page_data['Page_action']); 
			//var_dump($Page_prefix . '/' . $Page_template_compatibility);
			//dd(CI_view_exists($Page_prefix . '/' . $Page_template_compatibility));
			if (CI_view_exists($Module_template_by_Page_name)){
				$Page_data['view'] = $Module_template_by_Page_name;
			} elseif (CI_view_exists($Module_template_by_Page_template)){
				$Page_data['view'] = $Module_template_by_Page_template;
			} elseif (CI_view_exists($Template_by_Page_name)){
				$Page_data['view'] = $Template_by_Page_name;
			} else {
				$Page_data['view'] = $Template_by_Page_template;
			}
			//dd($Page_data['view']);
		} else{
			$Page_data['view'] = (strpos($Page_data['view'], 'modules/') === false)? $Page_prefix . '/' . $Page_data['view'] : $Page_data['view'];
		}

		$Page_data['view'] = ( !CI_view_exists($Page_data['view']) && empty($Page['template']) )? $Page_prefix . '/singlepage_index' : $Page_data['view'];

		$Page_data['title'] = (!empty($Page['title']))? $Page['title'] : ucfirst($Page_data['Page_name']);
		
		if (!array_key_exists('subtitle', $Page_data))
			$Page_data['subtitle'] = '';
		
		if (!array_key_exists('navigation', $Page_data))
			$Page_data['navigation'] = $Page_prefix . '/' . strtolower($Page_data['Page_name'].'_nav');

		if (!CI_view_exists($Page_data['navigation']) && array_key_exists('template', $Page)){
			$Page_data['navigation'] = $Page_prefix . '/' . strtolower($Page['template'].'_nav');

			if (!CI_view_exists($Page_data['navigation'])){
				$Page_data['navigation'] = 'modules/' . strtolower($Page['template'].'_'.$Page_prefix.'_nav');
			}
		}

		//dd($Page_data);
		//dd($Page_data['view']);
		if ( CI_view_exists($Page_data['view']) ) {
			$Page_layout = '/_layout';

			if (is_ajax()){
				$Page_layout = '/_layout_ajax';
				$Page_module = $Page_data['Page_name'];
			} //dd($Page);

			$Page_data['Template'] = (!empty($Page['template']))? $Page['template'] : $Page['url'];
			$Page_data['Template'] = (!empty($Page_data['Template']))? $Page_data['Template'] : $Page_data['Page_name'];
			//dd($Page_data['Template']);

			$Page_data['pages'] = db_entries('pages');

			$this->load->view($Page_prefix.$Page_layout, $Page_data);
		} else {
			$this->show_404();
		}
	}

	//
	// RECAPTCHA

	function fv_recaptcha($response){
		if (ENVIRONMENT == 'development' || strpos(current_url(), 'localhost')){
			
		} else {
			
		}

		$secret_key = '6LerkfYUAAAAAH-e5OThHS0FUmC4IZGdQnFPUmYy';
		$public_key = '6LerkfYUAAAAAED7xV5ka4mS0rR2a3AIgq1bB7m4';
		
		// $secret_key = option_value('secretkey');
		// $public_key = option_value('sitekey');

		$data = array(
			'secret' => $secret_key,
			'response' => $response
		);

		$post_data = http_build_query($data);

	// 	INITIATE CURL
		$curl = curl_init();

		curl_setopt_array($curl, Array(
			CURLOPT_URL            	=> 'https://www.google.com/recaptcha/api/siteverify',
			CURLOPT_TIMEOUT        	=> 180,
			CURLOPT_CONNECTTIMEOUT 	=> 180,
			CURLOPT_RETURNTRANSFER 	=> TRUE,
			CURLOPT_POST      		=> TRUE,
			CURLOPT_POSTFIELDS 		=> $post_data
		));

		$feedback = curl_exec($curl);

		curl_close($curl);

		$feedback_array = json_decode($feedback, TRUE);

		$validated = (array_key_exists('success', $feedback_array))? $feedback_array['success'] : false;

		return $validated;
	}

	//==========================================================================================
	// FORM VALIDATION CALLBACKS

	public function fv_required_select($value=null, $option=null){
		return fv_required_select($value, $option);
	}

	public function fv_not_required($value=null, $option=null){
		return fv_not_required($value, $option);
	}

	public function fv_unique_field($value, $option=null){ //dd($value);
		return fv_unique_field($value, $option);
	}

	public function fv_field_exists($value, $option=null){ //dd($value);
		return fv_field_exists($value, $option);
	}

	public function fv_subject_exists($value, $option=null){ //dd($value);
		return fv_subject_exists($value, $option);
	}

}

/* End of file controllers/Router.php */