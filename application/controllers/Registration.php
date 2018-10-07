<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('registration_model','register',true);
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}

	public function index()
	{
		$this->load->view('registration/index');
	}

	function saveregistration()
	{
	   $this->load->library('form_validation');
	   $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>', '</div>');
	   $this->load->helper('string');
	   $this->form_validation->set_rules('name', 'Name', 'trim|required');
	   $this->form_validation->set_rules('contact', 'Contact', 'trim|required|min_length[6]|is_unique[users.contact]');
	   $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[100]');
	   $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|matches[password]');
	   $this->form_validation->set_rules('accept_terms', 'Terms and Condition', 'callback_accept_terms');
	   $this->form_validation->set_message('max_length', '%s is not in valid format');
	   $this->form_validation->set_message('is_unique', 'The %s is already taken');
	   if($this->form_validation->run() == false)
	   {
			$this->load->view('registration/index');
	   }
	   else{
		   $name = $this->input->post('name');
		   $contact = $this->input->post('contact');
		   $email = $this->input->post('email');
		   $password = md5($this->input->post('password'));
		
		   $data = array(
				'name' => $name,
				'contact' => $contact,
				'email' => $email,
				'password' => $password ,
				'created_at	' => date("Y-m-d H:i:s")
			);
			
			if($this->register->addRegistration($data)){
				$id = $this->db->insert_id();
				$userid = base64_encode($id);
				$subject = 'Welcome to Gun Sale Finder!';
				$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							<head>
								<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
								<title>gunsalefinder.com - Find Gun in America</title>
							</head>
							<body style="margin:0px;">';
				$message .='<font face="Segoe UI Semibold, Segoe UI Bold, Helvetica Neue Medium, Arial, sans-serif ">
								<table cellspacing="0" cellpadding="0" style="width: 100%; font-size: 15px;color: #383838;  line-height: 26px;">
									<tr>
										<td style="background:#ea8916;height:60px;padding:0;background:#fff;">
											<img src="'.base_url().'assets/images/header/gunpro-header.png" style="width: 100px;left:10px;height:77px;"/>
										</td>
										<!--<td style="width:100%;">
											<img src="'.base_url().'assets/img/EmailLogo-BG.png" style="height: 77px; max-height: 77px;width: 100%;" />
										</td>-->
									</tr>
								</table>
								<table cellspacing="0" cellpadding="0" style="padding:0 20px;width: 100%; font-size: 15px;color: #383838;  line-height: 26px;">
									<tr><td colspan="2"><br />Hi there '.$this->common->getusername($id).',</td></tr>
									<tr>
										<td colspan="2"><br />
											It was a pleasure to know you have decided to join us here at Gun Sale Finder. <br />
											As your online business partner, we are looking forward to provide you with best price gun comparison. <br />
											To gain full access to all our features, please verify your account through the link below:<br /><br />
											<a href="'.base_url('registration/activateAccount/'.$userid).'" target="_blank" style="color: #FFF; text-decoration: none; background-color: #08c; border-radius: 5px; padding: 3px 10px;">Activate Now </a>&nbsp; &nbsp; or copy the following link: '.base_url('registration/activateAccount/'.$userid).'<br /><br /> 
											If the link doesn&#39;t work, please contact our support team through <a href="mailto:cs@gunsalefinder.com" style="color:#08c;text-decoration:none;">cs@gunsalefinder.com.ph</a> or call <a href="tel:+6329551000" style="color:#08c;text-decoration:none;">+6329551000</a>.<br /><br />
											Cheers, <br />
											Gunsalefinder
										</td>
									</tr>
								</table>
							</font>';
					$message .= "</body></html>";

					$this->load->library('email');
					$config['charset'] = "utf-8";
					$config['mailtype'] = "html";
					$config['newline'] = "\r\n";
					$config['validation'] = TRUE;
					$this->email->initialize($config);
					$this->email->from(EMAILFROM, EMAILNAME);
					$this->email->to($email); 
					// $this->email->cc('another@another-example.com'); 
					$this->email->bcc(EMAILBCC); 

					$this->email->subject($subject);
					$this->email->message($message);	

					$issent = $this->email->send();

					if($issent){
						$message = '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>We sent you a confirmation link to activate your account!</div>';
						$this->session->set_flashdata('message', $message);
						redirect("registration");
					}
					else{
						
						$this->session->set_flashdata('message', '<div class="alert alert-danger"><button class="close" data-dismiss="alert">x</button><strong>Error in sending email. Please report this to administrator.</strong></div>');
						redirect("registration");
					}

			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>Error on creating your account!</strong></div>');
				redirect('registration');
			}
			
		   
	   }
	}

	function accept_terms() {
		if (isset($_POST['accept_terms'])) return true;
		$this->form_validation->set_message('accept_terms', 'You must agree to our terms and conditions');
		return false;
	}

	function activateAccount($userid = 0) {
		$id = base64_decode($userid);
		$data = array(
			'isconfirm' =>1,
			'updated_at' => date('Y-m-d H:i:s'),
		);
			
			if($this->register->validateAccount($data, $id ) !== false)
			{
				//send email
					$email = $this->common->getUseremail($id);
					$subject = 'Your account has been verified';
					
					$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
								<html xmlns="http://www.w3.org/1999/xhtml">
								<head>
									<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
									<title>Gunsalefinder - Find sale Gun</title>
								</head>
								<body style="margin:0px;">
									<font face="Segoe UI Semibold, Segoe UI Bold, Helvetica Neue Medium, Arial, sans-serif ">
										<table cellspacing="0" cellpadding="0" style="width: 100%; font-size: 15px;color: #383838;  line-height: 26px;">
											<tr>
												<td style="background:#ea8916;height:60px;padding:0;background:#fff;">
													<img src="'.base_url().'assets/img/EmailLogo.png" style="width: 100px;left:10px;height:77px;"/>
												</td>
												<td style="width:100%;">
													<img src="'.base_url().'assets/img/EmailLogo-BG.png" style="height: 77px; max-height: 77px;width: 100%;" />
												</td>
											</tr>
										</table>
										<table cellspacing="0" cellpadding="0" style="padding:0 20px;width: 100%; font-size: 15px;color: #383838;  line-height: 26px;">
											<tr><td colspan="2"><br />Hi there '.$this->common->getusername($id).',</td></tr>
											<tr>
												<td colspan="2"><br />
													You have successfully verified your account with <a target="_blank" href="http://gunsalefinder.com" style="color:#08c;text-decoration:none;">Gunsalefinder</a>.<br />
													More than anything else, we hope our websites helps you find what gun you need. <br /><br />
													Cheers, <br />
													Gunsalefinder
												</td>
											</tr>
										</table>
									</font>
								</body>
								</html>';
		
					$this->load->library('email');
					$config['mailtype'] = "html";
					$config['newline'] = "\r\n";
					$config['validation'] = TRUE;
					$this->email->initialize($config);
					$this->email->from(EMAILFROM, EMAILNAME);
					$this->email->to($email); 
					// $this->email->cc('another@another-example.com'); 
					$this->email->bcc(EMAILBCC); 

					$this->email->subject($subject);
					$this->email->message($message);	

					$issent = $this->email->send();

					if($issent){
						$this->session->set_flashdata('message', '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Your account has been validated.</strong></div>');
						redirect("registration");
					}
					else{
						
						$this->session->set_flashdata('message', '<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button><strong>Error in sending email. Please report this to administrator.</strong></div>');
						redirect("registration");
					}
					
			}
			else{
				$message = '<div class="uk-alert uk-alert-danger" data-uk-alert> <a href="" class="uk-alert-close uk-close"></a> <p>Error in sending email. Please report this to administrator.</p> </div>';
				$this->session->set_flashdata('message', $message);
				redirect("user/register");
			}
	}
}