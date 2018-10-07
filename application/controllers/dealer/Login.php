<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('dealer/login_model','logindb',TRUE);
	}
	
	public function index()
	{
		
		$dealerMessage = $this->session->flashdata('dealermessage');
		if(isset($dealerMessage))
	    {
	       $data['message'] = $dealerMessage;
	    }
		$data['isDealer'] = true;
		$this->load->view('login', $data);
	}

	function checklogin()
	{
	   $this->load->library('form_validation');
	   $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
	   $this->form_validation->set_rules('username', 'Username', 'trim|required');
	   $this->form_validation->set_rules('password', 'Password', 'trim|required');
	 
	   if($this->form_validation->run() == false)
	   {
	        $data['isDealer'] = true;
	        $this->load->view('login');
	   }
	   else
	   {
		   $username = $this->input->post('username');
		   $password = $this->input->post('password');
		   $result = $this->logindb->login($username, $password);
		   $status = true;
		 
		   if($result)
		   {
				 $sess_array = array();
				 foreach($result as $row)
				 {
				   if($row->status == 1){
					    $newdata = array(
						   'id'  => $row->id,
						   'name'     => $row->first_name.' '.$row->last_name,
						   'dealer_login' => true
						);
						$this->session->set_userdata($newdata);
				   }else{
					   $status = false;
				   }
				  
				 }

				if($status == false){
					$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Account aprroval for your account still pending!</div>';
					$this->session->set_flashdata('message', $message);
					redirect('dealer-login'); 
				 }else{
					redirect('dealer/profile'); 
				 }
		   }
		   else
		   {
				$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Invalid username or password!</div>';
				$this->session->set_flashdata('message', $message);
				redirect('dealer-login');
		   }
	   }
	  
	}

	function logout()
	{
		$this->session->unset_userdata('dealer_login');
		session_destroy();
		redirect('dealer-logout');
	}
	
	function forgotpassword()
	{
		$email = $this->input->post("email");
		$userid = $this->logindb->loginemailcheck($email);
		# if login success
		if( $userid !== false )
		{		
			//send email
			$name = $this->common->getusername($userid);
			$userid = base64_encode($userid);
			$userid = urlencode($userid);
			
			$subject = 'Password Reset';
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
						<html xmlns="http://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
							<title>Gunsalefinder - Reset Password</title>
						</head>
						<body style="margin:0px;">
							<font face="Segoe UI Semibold, Segoe UI Bold, Helvetica Neue Medium, Arial, sans-serif ">
								<table cellspacing="0" cellpadding="0" style="padding:0 20px;width: 100%; font-size: 15px;color: #383838;  line-height: 26px;">
									<tr><td colspan="2"><br />Hello '.$name.',</td></tr>
									<tr>
										<td colspan="2"><br />
											We received a request to change your password. To reset your password, please click this link:<br /><br />

											<a href="'.base_url('login/recoverpassword/'.$userid).'" style="color: #FFF;text-decoration: none;background-color: #08c;border-radius: 5px;padding: 3px 10px;">Reset Now</a> &nbsp; &nbsp; or copy the following link: '.base_url('login/recoverpassword/'.$userid).'<br /><br />
											If you did not request for a password reset, please ignore this message. If you think your account has been compromised, please contact our support team through <a href="mailto:support@gunsalefinder.com" style="color:#08c;text-decoration:none;">support@gunsalefinder.com</a> or call <a href="tel:+322 (13) 22222" style="color:#08c;text-decoration:none;">+2323 (13) 2</a>.
											<br /><br />
											Cheers, <br />
											Gun Sale Finder 
										</td>
									</tr>
								</table>
							</font>
						</body>
						</html>';
	
			$this->load->library('email');
			$config['charset'] = "utf-8";
			$config['mailtype'] = "html";
			$config['newline'] = "\r\n";
			$config['validation'] = TRUE;
			$this->email->from(EMAILFROM, EMAILNAME);
			$this->email->to($email); 
			// $this->email->cc('another@another-example.com'); 
			$this->email->bcc(EMAILBCC); 

			$this->email->subject($subject);
			$this->email->message($message);	

			$issent = $this->email->send();
						
			if(!$issent){
				$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Email not sent! Please contact our support through <a href="mailto:support@gunsalefinder.com" style="color:#08c;text-decoration:none;">support@gunsalefinder.com</a> or call <a href="tel:+966 (13) 8991621" style="color:#08c;text-decoration:none;">+2332 (13) 233223</a></div>';
				$this->session->set_flashdata('message', $message);
				redirect('login');
			}
			else{
				$this->session->set_flashdata('message', '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>We have sent you an email with the instructions to reset your password!</strong></div>');
				redirect('login');
			}
		}
		else {
			$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Invalid email address!</div>';
			$this->session->set_flashdata('message', $message);
			redirect('login');

		}
		
	}

	function recoverpassword($userid = 0)
	{
		$id = base64_decode(urldecode($userid));
		$data['userid'] = $id;
		$this->load->view('resetpassword', $data);
	}

	function saverecoverpassword() {
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
		$this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|min_length[5]|max_length[100]|matches[repeat]');
        $this->form_validation->set_rules('repeat', 'Reenter Password', 'trim|required|min_length[5]|max_length[100]');
		$id = $this->input->post('userid');
		
		if ($this->form_validation->run() == false){
			$data['userid'] = $id;
			$this->load->view('resetpassword', $data);
		}
		else
		{
			if(abs($id) > 0){
				
				$pwd = $this->input->post('newpassword');
				$password = md5($pwd);
	
				$data = array(
					'password' => $password,
					'updated_at' => date('Y-m-d H:i:s'),
					'updated_by' => $id
				);
				
				if($this->logindb->updatepassword($id, $data) !== false){
					$this->session->set_flashdata('message', '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Password successfully changed! You can now login!</strong></div>');
					redirect('login');
				}
				else{
					$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error in  recover password. Please report this to administrator.</div>';
					$this->session->set_flashdata('message', $message);
					redirect("login/recoverpassword");
				}
				
			}
			else {
				
				$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> This link already expired.</div>';
				$this->session->set_flashdata('message', $message);
				redirect("login/recoverpassword");
				
			}
			
			
		}
	}
}
