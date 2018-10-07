<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('subscribe_model','subscribedb',TRUE);
	}

	public function index()
	{
		$data['states'] = $this->subscribedb->getAllStates();
		$data['countries'] = $this->subscribedb->getAllCountries();
		$this->load->view('dealers/registration', $data);
	}

	function saveDealerregistration()
	{
	   $this->load->library('form_validation');
	   $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>', '</div>');
	   $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
	   $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
	   $this->form_validation->set_rules('email', 'Email', 'trim|required');
	   $this->form_validation->set_rules('zipcode', 'Zip code', 'trim|required');
	   $this->form_validation->set_rules('country', 'Country', 'trim|required');
	   $this->form_validation->set_rules('webpage', 'Webpage', 'trim|required');
	   $this->form_validation->set_rules('username', 'Username', 'required|min_length[3]|max_length[15]|is_unique[dealers.username]');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required');
	   $this->form_validation->set_rules('confirm', 'Password Confirmation', 'required|matches[password]');
	   $this->form_validation->set_rules('accept_terms', 'Terms and Condition', 'callback_accept_terms');
	   if($this->form_validation->run() == false)
	   {
			$data['states'] = $this->subscribedb->getAllStates();
			$data['countries'] = $this->subscribedb->getAllCountries();
			$this->load->view('dealers/registration', $data);
	   }
	   else{
		   if($_FILES['ffl']['size'] > 0) {
				#UPLOAD
				$config['upload_path']          = './uploads/ffl/';
				$config['allowed_types']        = 'gif|jpg|png|docx|pdf';
				$new_name = time().$_FILES['ffl']['name'];
				$ffl = preg_replace('/[^a-zA-Z0-9_.]/', '', $new_name);
				$config['file_name'] = $ffl;

				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('ffl'))
				{
					$error = array('error' => $this->upload->display_errors());
					$data['error'] = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>'.$error['error'].'</div>';
					$data['states'] = $this->subscribedb->getAllStates();
					$data['countries'] = $this->subscribedb->getAllCountries();
					$this->load->view('dealers/registration', $data);
				}
				else
				{
			   		
				   $config2['upload_path']          = './uploads/sot/';
				   $config2['allowed_types']        = 'gif|jpg|png|docx|pdf';
				   $sot_name = time().$_FILES['sot']['name'];
				   $sot = preg_replace('/[^a-zA-Z0-9_.]/', '', $sot_name);
				   $config2['file_name'] = $sot;
				   $this->upload->initialize($config2); 
				  	if ( ! $this->upload->do_upload('sot'))
					{
						$error = array('error' => $this->upload->display_errors());
						$data['error'] = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>'.$error['error'].'</div>';
						$data['states'] = $this->subscribedb->getAllStates();
						$data['countries'] = $this->subscribedb->getAllCountries();
						$this->load->view('dealers/registration', $data);
					}else{

					   $title = $this->input->post('title');
					   $firstname = $this->input->post('firstname');
					   $middlename = $this->input->post('middlename');
					   $lastname = $this->input->post('lastname');
					   $suffix = $this->input->post('suffix');
					   $email = $this->input->post('email');
					   $address = $this->input->post('address');
					   $city = $this->input->post('city');
					   $state = $this->input->post('state');
					   $zipcode = $this->input->post('zipcode');
					   $country = $this->input->post('country');
					   $companyname = $this->input->post('companyname');
					   $jobtitle = $this->input->post('jobtitle');
					   $contactnumber = $this->input->post('contactnumber');
					   $webpage = $this->input->post('webpage');
					   $expiration = $this->input->post('expiration');
					   $username = $this->input->post('username');
					   $password = md5($this->input->post('password'));
					   $data = array(
							'title' => $title,
							'first_name' => $firstname,
							'middle_name' => $middlename,
							'last_name' => $lastname,
							'suffix' => $suffix,
							'email' => $email,
							'address' => $address,
							'city' => $city,
							'state' => $state,
							'zip_code' => $zipcode,
							'country' => $country,
							'company_name' => $companyname,
							'job_title' => $jobtitle,
							'contact' => $contactnumber,
							'web_url' => $webpage,
							'ffl_document' => $ffl,
							'expiration' => $expiration,
							'sot' => $sot,
							'username' => $username,
							'password' => $password,
							'created_at' => date("Y-m-d H:i:s")
						);
						$this->subscribedb->addRegistration($data);
						$this->session->set_flashdata('message', '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><strong>Successfully registered, We will contact you very soon!!</strong></div>');
						redirect('dealer/subscribe');

					}

				}
		   }else{
			   
			  		
					$data['error'] = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>FFL or SOT is required!</div>';
					$data['states'] = $this->subscribedb->getAllStates();
					$data['countries'] = $this->subscribedb->getAllCountries();
					$this->load->view('dealers/registration', $data);
			   
		   }
		   
	   }
	}

	function accept_terms() {
		if (isset($_POST['accept_terms'])) return true;
		$this->form_validation->set_message('accept_terms', 'You must agree to our terms and conditions');
		return false;
	}
}
