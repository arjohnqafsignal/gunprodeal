<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('registration_model','register',TRUE);
		$this->load->model('profile_model','profile',TRUE);
		$this->load->library('pagination');
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$userid = $this->session->userdata('id');
			$data['info'] = $this->register->getuserinfobyid($userid);
			$data['states'] = $this->common->getallStates();
			$data['countries'] = $this->common->getallCountries();
			$userid = base64_encode($userid);
			$data['userid'] = urlencode($userid);
			$this->load->view('dashboard/profile', $data);
		} else {
			redirect('login');
		}
	}

	function updateinformation()
	{
	   $this->load->library('form_validation');
	   $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
	   $this->form_validation->set_rules('name', 'Name', 'trim|required');
	   $this->form_validation->set_rules('contact', 'Contact', 'trim|required');
	   $this->form_validation->set_rules('email', 'Email', 'required|min_length[5]|valid_email|callback_email_checkedit');
	
	   if($this->form_validation->run() == FALSE)
	   {
			$id = $this->session->userdata('id');
			$data['info'] = $this->register->getuserinfobyid($id);
			$data['states'] = $this->common->getallStates();
			$data['countries'] = $this->common->getallCountries();
			$data['userid'] = base64_encode($id);
			$this->load->view('dashboard/profile', $data);
	   }
	   else{
		   $id = $this->session->userdata('id');
		   $name = $this->input->post('name');
		   $email = $this->input->post('email');
		   $contact = $this->input->post('contact');
		   $state = $this->input->post('state');
		   $country = $this->input->post('country');
	
			if($_FILES['profile']['name'] == '') {
				
				$data = array(
					'name' => $name,
					'contact' => $contact,
					'email' => $email,
					'state' => $state,
					'country' => $country,
					'updated_at' => date("Y-m-d H:i:s"),
					'updated_by' => $this->session->userdata('id')
				);
				$this->profile->updateuserprofile($id,$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Profile successfully updated!</strong></div>');
				redirect('profile');
			   
		    } else {
					$config['upload_path']          = './assets/pictures/';
					$config['allowed_types']        = 'gif|jpg|png';
					$config['max_width']            = 360;
					$config['max_height']           = 362;
					$new_name = time().$_FILES['profile']['name'];
					$new_name = preg_replace('/[^a-zA-Z0-9_.]/', '', $new_name);
					$config['file_name'] = $new_name;

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('profile'))
					{
						$data['info'] = $this->register->getuserinfobyid($id);
						$data['states'] = $this->common->getallStates();
						$data['countries'] = $this->common->getallCountries();
						$data['userid'] = base64_encode($id);
						$data['error'] = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>'.$this->upload->display_errors().'</div>';
						$this->load->view('dashboard/profile', $data);
					}
					else
					{
						$data = array('profile' => $this->upload->data());
						//Image Resizing
						$config['source_image'] = $this->upload->upload_path.$this->upload->file_name;
						$config['maintain_ratio'] = FALSE;
						$config['width'] = 360;
						$config['height'] = 362;

						$this->load->library('image_lib', $config);
						#IMAGE RESIZE
						if ( ! $this->image_lib->resize()){
							$this->session->set_flashdata('message', $this->image_lib->display_errors('<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>', '</strong></div>'));
							redirect('profile');
						}else{
							// UPLOAD
							$data = array(
								'name' => $name,
								'contact' => $contact,
								'email' => $email,
								'state' => $state,
								'country' => $country,
								'picture' => $new_name,
								'updated_at' => date("Y-m-d H:i:s"),
								'updated_by' => $this->session->userdata('id')
							);
							$this->profile->updateuserprofile($id,$data);
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Profile successfully updated!</strong></div>');
							redirect('profile');
						}
					}
		    }
		   
	   }
		
	}

	function email_checkedit($email)
	{
		$id = $this->session->userdata('id');
		if ($this->profile->email_checkedit($email, $id))
		{
			$this->form_validation->set_message('email_checkedit', '%s already taken');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}
