<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('registration_model','register',TRUE);
		$this->load->model('dealer/dealer_model','dealerdb',TRUE);
		$this->load->library('pagination');
	}

	public function index()
	{
		if($this->session->userdata('dealer_login'))
		{
			$id = $this->session->userdata('id');
			$data['info'] = $this->dealerdb->getUserinfobyid($id);
			$data['states'] = $this->common->getallStates();
			$data['countries'] = $this->common->getallCountries();
			$data['subscriptions'] = $this->common->getallSubscriptions();
			$data['productcount'] = $this->dealerdb->countmyProduct( $id );
			$data['mysubscriptions'] = $this->dealerdb->getCurrentSubscription( $id );
			$data['userid'] = base64_encode($id);
			$this->load->view('dealers/profile', $data);
		} else {
			redirect('dealer-login');
		}
	}

	function updateinformation()
	{
	   $this->load->library('form_validation');
	   $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>', '</div>');
	   $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
	   $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
	   $this->form_validation->set_rules('email', 'Email', 'trim|required');
	   $this->form_validation->set_rules('zipcode', 'Zip code', 'trim|required');
	   $this->form_validation->set_rules('country', 'Country', 'trim|required');
	   $this->form_validation->set_rules('webpage', 'Webpage', 'trim|required');
	
	   if($this->form_validation->run() == FALSE)
	   {
			$id = $this->session->userdata('id');
			$data['info'] = $this->dealerdb->getUserinfobyid($id);
			$data['states'] = $this->common->getallStates();
			$data['countries'] = $this->common->getallCountries();
			$data['userid'] = base64_encode($id);
			$this->load->view('dealers/profile', $data);
	   }
	   else{
		   
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
			$jobtitle = $this->input->post('jobtitle');
			$contactnumber = $this->input->post('contactnumber');
			$webpage = $this->input->post('webpage');
	
			if($_FILES['profile']['name'] == '') {
				
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
					'job_title' => $jobtitle,
					'contact' => $contactnumber,
					'web_url' => $webpage,
					'updated_at' => date("Y-m-d H:i:s"),
					'updated_by' => $this->session->userdata('id')
				);

				$this->dealerdb->updateuserprofile($id,$data);
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Information successfully updated!</strong></div>');
				redirect('dealer/profile');
			   
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
						$this->load->view('dealers/profile', $data);
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
							redirect('dealer/profile');
						}else{
							// UPLOAD
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
								'job_title' => $jobtitle,
								'contact' => $contactnumber,
								'web_url' => $webpage,
								'picture' => $new_name,
								'updated_at' => date("Y-m-d H:i:s"),
								'updated_by' => $this->session->userdata('id')
							);
							$this->dealerdb->updateuserprofile($id,$data);
							$this->session->set_flashdata('message', '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Information successfully updated!</strong></div>');
							redirect('dealer/profile');
						}
					}
		    }
		   
	   }
		
	}

	function updatesubscription( )
	{

		if($this->session->userdata('dealer_login'))
		{
		   $id = $this->session->userdata('id');
		   $subscription = $this->security->xss_clean($this->input->post('subscription'));
		   $pmethod = $this->security->xss_clean($this->input->post('pmethod'));

			if ($this->dealerdb->subscriptionExists($id)) {
				$data['subscription_id'] = $subscription;
				$this->dealerdb->updateSubscription( $id, $data );
			} else {
				$data = array(
					'dealer_id' => $id,
					'subscription_id' => 1,
					'payment_method' => $pmethod
				);
				$this->dealerdb->addSubscription( $data );
			}
			$this->session->set_flashdata('message', '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Subscription successfully changed and waiting for approval! </strong></div>');
			redirect('dealer/profile');
		} else {
			redirect('dealer-login');
		}
	}

}
