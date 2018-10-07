<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/******************************************************************
*
*	Title		: 	Promotions Ads
*	Author		: 	Ronald Duque | ronaldduque24@gmail.com
*	Filename 	: 	Postdeal.php
*	Date 		: 	Sept 2018
*
******************************************************************/
class Postdeal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('dealer/postdeal_model','postdb',TRUE);
		$this->load->helper('string');
		$this->load->library('image_lib');
		$this->load->helper('text');
		$this->load->library('pagination');
		$this->load->helper('countryblock');
		if(!checkcountry()){
			redirect('/out-of-region');
		}
	}
	function index()
	{
		if($this->session->userdata('dealer_login'))
		{
			$data['category'] = $this->common->getallcategory();
			$data['states'] = $this->common->getallStates();
			$data['brands'] = $this->common->getallBrand();
			$data['code'] = random_string('alnum',6);
			$this->load->view('dealers/postdeal', $data);
		} else {
			
			$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your must login as Dealer to continue!</strong></div>';
			$this->session->set_flashdata('dealermessage', $message);
			redirect('dealer-login');
		}
	}

	#DROPZONE UPLOADING
	#-------------------------------------------------------------
	function dealsupload($code){
		if (!empty($_FILES)) {
			$tempFile = $_FILES['file']['tmp_name'];
			$file = str_replace(' ', '', $_FILES['file']['name']);
			$fileName = date('Y-m-dH-i-s').'-'.$file;
			$targetPath = 'uploads/deals/';
			$targetFile = $targetPath . $fileName ;
			move_uploaded_file($tempFile, $targetFile);
			$this->resize($fileName);
			$fileName = base_url('uploads/deals/'.$fileName);
			$this->db->insert('upload_temp',array('code' => $code, 'filename' => $fileName, 'created_at' => date('Y-m-d H:i:s')));
		}
	}
	
	#RESIZING IMAGE
	#-------------------------------------------------------------
	function resize($fileName){
	
		$config['image_library'] = 'gd2';
		$config['source_image'] = 'uploads/'.$fileName;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 313;
		$config['height'] = 234;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
		
	}
	
	#SAVE ADS
	#-------------------------------------------------------------
	function savedeals() {
		
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');
		$this->form_validation->set_rules('itemcode', 'Code', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[300]');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('brand', 'Brand', 'trim|max_length[10]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['category'] = $this->common->getallcategory();
			$data['states'] = $this->common->getallStates();
			$data['brands'] = $this->common->getallBrand();
			$data['code'] = random_string('alnum',6);
			$this->load->view('dealers/postdeal', $data);
		}
		else
		{
			$code = $this->security->xss_clean($this->input->post('code'));
			$itemcode = $this->security->xss_clean($this->input->post('itemcode'));
			$title = $this->security->xss_clean($this->input->post('title'));
			$brand = $this->security->xss_clean($this->input->post('brand'));
			$category = $this->security->xss_clean($this->input->post('category'));
			$subcategory = $this->security->xss_clean($this->input->post('subcategory'));
			$upc = $this->security->xss_clean($this->input->post('upc'));
			$sku = $this->security->xss_clean($this->input->post('sku'));
			$price = $this->security->xss_clean($this->input->post('price'));
			$shipping = $this->security->xss_clean($this->input->post('shipping'));
			
			if($this->postdb->checkDealsExist($itemcode)=== FALSE)
			{
				$url = $this->postdb->getProductURL($code);
				$data = array(
					'code' => $itemcode,
					'dealer_id' => $this->session->userdata('id'),
					'category_code' => $category,
					'sub_category_code' => $subcategory,
					'brand_id' => $brand,
					'title' => $title,
					'upc' => $upc,
					'sku' => $sku,
					'price' => $price,
					'shipping_fee' => $shipping,
					'image_url' => $url,
					'status'=> 'A',
					'created_at' => date('Y-m-d H:i:s')
				);
				
				if($this->postdb->insertProducts($data) !== FALSE)
				{
					$id = $this->db->insert_id(); 
					$descriptions = $this->security->xss_clean($this->input->post('editor1'));
					if($descriptions != '') {
						
						$desc = array(
							'product_id' => $id,
							'descriptions' => $descriptions,
							'status' => "A"
						);
						$this->postdb->insertProductDescription($desc);
					}

					$caliber = $this->security->xss_clean($this->input->post('caliber'));
					$framedesc = $this->security->xss_clean($this->input->post('framedesc'));
					$stock = $this->security->xss_clean($this->input->post('stock'));
					$type = $this->security->xss_clean($this->input->post('type'));
					$barrel = $this->security->xss_clean($this->input->post('barrel'));
					$capacity = $this->security->xss_clean($this->input->post('capacity'));
					$weight = $this->security->xss_clean($this->input->post('weight'));
					
					if($caliber != '' || $framedesc != '' || $stock != '' || $type != '' || $barrel != '' || $capacity != '' || $weight != '') {
						
						$info = array(
							'product_upc' => $upc,
							'caliber' => $caliber,
							'type' => $type,
							'stock_description' => $stock,
							'frame_description' => $framedesc,
							'barrel' => $barrel,
							'capacity' => $capacity,
							'weight' => $weight
						);
						$this->postdb->insertProductInfo($info);
					}

					$this->postdb->insertImages($id, $code);
					$this->postdb->deleteTempimages($code);
					$message = '<div class="alert alert-success"><strong><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Your deals has been listed.</strong></div>';
					$this->session->set_flashdata('message', $message);
					redirect("dealer/postdeal/");
				}
				else{
					$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Error Occurs. Please reports to administrator</div>';
					$this->session->set_flashdata('message', $message);
					$data['category'] = $this->common->getallcategory();
					$data['states'] = $this->common->getallStates();
					$data['brands'] = $this->common->getallBrand();
					$data['code'] = random_string('alnum',6);
					$this->load->view('dealers/postdeal', $data);
				}
			}
			else{
				$message = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Error Occurs. Please reports to administrator</div>';
				$this->session->set_flashdata('message', $message);
				redirect("dealer/postdeal/");
			}
		
		}
	}

	function getsubcategory(){
		$catid = $this->input->post('category');
		$return_data = $this->postdb->getSubcategory($catid);
		header('Content-Type: application/json');
		echo json_encode($return_data);
		exit();
	}

	function updatedeal($id = 0)
	{
		$data['deals'] = $this->postdb->getDealsbyid($id);
		$data['adsimages'] = $this->postdb->getDealImages($id);
		$data['code'] = random_string('alnum',6);
		$this->load->view('dealers/updatedeal', $data);
	}
	function update_ads(){
		
		$adsid = $this->input->post('adsid');
		$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="uk-alert uk-alert-danger" data-uk-alert><a href="" class="uk-alert-close uk-close"></a><p>', '</p></div>');
		$this->form_validation->set_rules('catid', 'Category', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[300]');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('address', 'Address', 'trim|max_length[300]');
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['ads'] = $this->item_model->getadsbyid($adsid);
			$data['adsimages'] = $this->item_model->getadsimages($adsid);
			$message = '<div class="uk-alert uk-alert-danger" data-uk-alert><a href="" class="uk-alert-close uk-close"></a><p>'.validation_errors().'</p></div>';
			$this->session->set_flashdata('errors', $message);
			redirect("item/editads/".$adsid);
		}
		else
		{
			$cat = $this->input->post('catid');
			$code = $this->input->post('code');
			$channel = $this->common_model->getparentcategory($cat);
			$data = array(
				'channel_id' => $channel,
				'category_id' => $cat,
				'title' => $this->input->post('title'),
				'price' => $this->input->post('price'),
				'countryid' => $this->input->post('country'),
				'regionid' => $this->input->post('region'),
				'address' => $this->input->post('address'),
				'description' => $this->input->post('description'),
				'rank' => 6,
				'images' => '',
				'enabled'=> 1,
				'created_at' => date('Y-m-d H:i:s'),
				'created_by' => $this->session->userdata('id')
			);
			
			if($this->item_model->update_ads($data, $adsid) !== FALSE)
			{
				$this->item_model->insert_images($adsid, $code);
				$this->item_model->delete_tempimages($code);
				
				$message = '<div class="uk-alert uk-alert-success" data-uk-alert><a href="" class="uk-alert-close uk-close"></a><p>Your ads has been successfully updated .</p></div>';
				$this->session->set_flashdata('message', $message);
				redirect("dashboard/myads");
			}
			else
			{
				//$message = 'Error in registration. Please report this to administrator';
				$message = '<div class="uk-alert uk-alert-danger" data-uk-alert><a href="" class="uk-alert-close uk-close"></a><p>Error in update. Please report this to administrator.</p></div>';
				$this->session->set_flashdata('message', $message);
				redirect("dashboard/myads");
			}
		}
	}
}
