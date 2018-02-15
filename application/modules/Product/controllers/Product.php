<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->model("ModelHome");
		$this->load->library("pagination");
	}

	function search(){
		$keyword = "";
		if(isset($_GET["key"])){
			$keyword = str_replace("%"," ",$_GET["key"]);
		}
		// konfigurasi class pagination
		$config['per_page']		= 12;
		$config['num_links'] 	= 2;
		$config['uri_segment']	= 4;
		$config['full_tag_open'] = '<div class="pagination-number"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['base_url']		= base_url()."product/search?key=".$keyword;
		$config['total_rows']	= $this->db->query("SELECT * FROM ryu_product WHERE product_name like '%$keyword%'")->num_rows();
		
		$this->pagination->initialize($config);
		$start = $this->uri->segment(4, 0);
		// $category_name 			= $this->ModelHome->getCategoryname($type);
		$data["listproduct"] 	= $this->ModelHome->getProductSearch($keyword,$config['per_page'],$start);
		$data["tittle"] 		= "Search Product";
		// $data["category_id"]	= $type;
		$data["pagination"]		= $this->pagination->create_links();
		$data["start"]			= $start;
		$data["jml_record"]		= $config['total_rows'];
		$this->layout->content("search",$data);
	}

	public function index($category=null)
	{
		if($category != null){
			$category_name 			= $this->ModelHome->getCategoryname($category);
			$data["tittle"] 		= $category_name;
			$data["category_id"]	= $category;
			$data["listproduct"] 	= $this->ModelHome->getProductCategory($category);
			$this->layout->content("index",$data);
		}else{
			$data["tittle"] 		= "Not Found";
			$this->layout->content("404",$data);
		}
	}

	function shop($type=null){
		 // konfigurasi class pagination
		$config['per_page']		= 12;
		$config['num_links'] 	= 2;
		$config['uri_segment']	= 4;
		$config['full_tag_open'] = '<div class="pagination-number"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['base_url']		= base_url()."product/shop/$type";
		$config['total_rows']	= $this->db->query("SELECT * FROM ryu_product WHERE product_category = '$type'")->num_rows();
		
		$this->pagination->initialize($config);
		$start = $this->uri->segment(4, 0);
		$category_name 			= $this->ModelHome->getCategoryname($type);
		$data["listproduct"] 	= $this->ModelHome->getProductType($type,$config['per_page'],$start);
		$data["tittle"] 		= $category_name;
		$data["category_id"]	= $type;
		$data["pagination"]		= $this->pagination->create_links();
		$data["start"]			= $start;
		$data["jml_record"]		= $config['total_rows'];
		$this->layout->content("shop",$data);
	}

	function category($type){
		$config['per_page']		= 12;
		$config['num_links'] 	= 2;
		$config['uri_segment']	= 4;
		$config['full_tag_open'] = '<div class="pagination-number"><ul>';
		$config['full_tag_close'] = '</ul></div>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['base_url']		= base_url()."product/category/$type";
		$config['total_rows']	= $this->db->query("SELECT * FROM ryu_product WHERE product_subcategory = '$type'")->num_rows();
		$sql 	= "SELECT * FROM ryu_subcategory WHERE sub_id = '$type'";
		$query	= $this->db->query($sql);
		if($query->num_rows()>0){
			$row = $query->row();
			$sub_parent_id = $row->sub_parent_id;
		}
		$this->pagination->initialize($config);
		$start = $this->uri->segment(4, 0);
		$category_name 			= $this->ModelHome->getSubname($type);
		$data["listproduct"] 	= $this->ModelHome->getProductTypeSub($type,$config['per_page'],$start);
		$data["tittle"] 		= $category_name;
		$data["category_id"]	= $sub_parent_id;
		$data["pagination"]		= $this->pagination->create_links();
		$data["start"]			= $start;
		$data["jml_record"]		= $config['total_rows'];
		$this->layout->content("shop",$data);
	}

	function detail($product_id){
		$data["detail"] = $this->ModelHome->getDetailProduct($product_id);
		$data["spek"]	= $this->ModelHome->getDetailProductSpec($product_id);
		$data["tittle"] = "PRODUCT";
		$this->layout->content("detail",$data);
	}
}
