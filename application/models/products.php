<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class products extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
	}
	
	function getproducts($num,$offset,$id,$name,$reference,$category,$status)
	{
		$this->db->select('products.id,product_medias.path,product_medias.filename,products.name,products.reference,category.name as category,category.link_rewrite as slug,products.link_rewrite,products.price,products.active');
		$this->db->from('products');
		$this->db->join('category', 'products.category_default_id = category.id','left');
		$this->db->join('product_medias','product_medias.product_id = products.id','left');
		if(!empty($id)){
			$this->db->like('products.id', $id);
		}
		else if(!empty($name))
		{
			$this->db->like('products.name', $name);
		}
		else if(!empty($reference))
		{
			$this->db->like('products.reference', $reference);
		}
		else if(!empty($category))
		{
			$this->db->like('category.name',$category);
		}
		else if(!empty($status))
		{
			$this->db->like('products.active',$status);
		}
		if($num!=='' && $offset!==''){$this->db->limit($num,$offset);}
		$this->db->group_by('products.id');
		
		return $this->db->get()->result();
	}
	function getcountproduct($id,$name,$reference,$category,$status)
	{
		$this->db->select('products.id,product_medias.path,products.name,products.reference,category.name as category,category.link_rewrite as slug,products.link_rewrite,products.price,products.active');
		$this->db->from('products');
		$this->db->join('category', 'products.category_default_id = category.id','left');
		$this->db->join('product_medias','product_medias.product_id = products.id','left');
		if(!empty($id)){
			$this->db->like('products.id', $id);
		}
		else if(!empty($name))
		{
			$this->db->like('products.name', $name);
		}
		else if(!empty($reference))
		{
			$this->db->like('products.reference', $reference);
		}
		else if(!empty($category))
		{
			$this->db->like('category.name',$category);
		}
		else if(!empty($status))
		{
			$this->db->like('products.active',$status);
		}
		$this->db->group_by('products.id');
		
		return $this->db->get()->num_rows();
	}
	function getAllProduct($id)
	{
		$this->db->select(" products.id,discount.reduction_type,
							discount.reduction,discount.price as discount,
							product_medias.path,product_medias.filename,
							products.name,products.reference,
							category.link_rewrite as slug,category.name as category,
							products.category_default_id,products.link_rewrite,
							products.price,products.active,products.available_for_order,
							products.show_price,products.description,products.condition,
							products.price,products.height,products.depth,products.weight,
							products.width,products.meta_title,products.meta_description,
							CASE	
								WHEN discount.reduction_type = 'percentage' THEN (products.price - (products.price * discount.reduction / 100))
								WHEN discount.reduction_type = 'amount' THEN (products.price - discount.price)
							END AS fix_price ");
		$this->db->from('products');
		$this->db->join('category', 'products.category_default_id = category.id','left');
		$this->db->join('product_medias','product_medias.product_id = products.id','left');
		$this->db->join('(SELECT * FROM specific_prices WHERE `to` >= now() and `from` <= now()) discount', 'discount.product_id = products.id','left');
		$this->db->group_by('products.id');
		$this->db->where('products.id',$id);
		return $this->db->get()->result();
	}
	function getProductByLink($slug,$link)
	{
		$this->db->select(" products.id,discount.reduction_type,
							discount.reduction,discount.price as discount,
							product_medias.path,product_medias.filename,
							products.name,products.reference,
							category.link_rewrite as slug,category.name as category,
							products.category_default_id,products.link_rewrite,
							products.price,products.active,products.available_for_order,
							products.show_price,products.description,products.condition,
							products.price,products.height,products.depth,products.weight,
							products.width,products.meta_title,products.meta_description,
							CASE	
								WHEN discount.reduction_type = 'percentage' THEN (products.price - (products.price * discount.reduction / 100))
								WHEN discount.reduction_type = 'amount' THEN (products.price - discount.price)
							END AS fix_price ");
		$this->db->from('products');
		$this->db->join('category', 'products.category_default_id = category.id','left');
		$this->db->join('product_medias','product_medias.product_id = products.id','left');
		$this->db->join('(SELECT * FROM specific_prices WHERE `to` >= now() and `from` <= now()) discount', 'discount.product_id = products.id','left');
		$this->db->group_by('products.id');
		$this->db->where('products.link_rewrite',$link);
		$this->db->where('category.link_rewrite',$slug);
		return $this->db->get()->result();
	}
	function getProductCategories($id)
	{
		$this->db->select('products_categories.*,categories.name,categories.id as parent_id');
		$this->db->from('products_categories');
		$this->db->join('category', 'products_categories.category_id = category.id','left');
		$this->db->where('products_categories.product_id',$id);		
		return $this->db->get()->result();
	}
	function changeStatus($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('products', $data);
		return true;
	}
	function deleteProduct($id,$where,$tablename)
	{
		$this->db->where($where,$id);
		$this->db->delete($tablename);
		return true;
	}
	function updateProduct($id,$where,$tablename,$data)
	{
		$this->db->where($where,$id);
		$this->db->update($tablename,$data);
		return true;
	}
	function insertproduct($tablename,$data)
	{
		$this->db->insert($tablename, $data); 
		$id = $this->db->insert_id();
		return $id;
	}
	function getProductStock($id)
	{
		$this->db->select('*');
		$this->db->from('product_stocks');
		$this->db->where('product_id',$id);
		return $this->db->get()->result();
	}
	function getProductMedias($id)
	{
		$this->db->select('product_medias.*,products.name as caption');
		$this->db->from('product_medias');
		$this->db->join('products', 'products.id = product_medias.product_id','left');
		$this->db->where('product_medias.product_id',$id);
		return $this->db->get()->result();
	}
	function getProductmediasbyID($id)
	{
		$this->db->select('*');
		$this->db->from('product_medias');
		$this->db->where('id',$id);
		return $this->db->get()->result();
	}
	function getProductByCategory($id)
	{
		$this->db->select(" products.id,discount.reduction_type,
							discount.reduction,discount.price as discount,
							product_medias.path,product_medias.filename,
							products.name,products.reference,
							category.link_rewrite as slug,category.name as category,
							products.category_default_id,products.link_rewrite,
							products.price,products.active,products.available_for_order,
							products.show_price,products.description,products.condition,
							products.price,products.height,products.depth,products.weight,
							products.width,products.meta_title,products.meta_description,
							CASE	
								WHEN discount.reduction_type = 'percentage' THEN (products.price - (products.price * discount.reduction / 100))
								WHEN discount.reduction_type = 'amount' THEN (products.price - discount.price)
							END AS fix_price ");
		$this->db->from('products');
		$this->db->join('category', 'products.category_default_id = category.id','left');
		$this->db->join('product_medias','product_medias.product_id = products.id','left');
		$this->db->join('(SELECT * FROM specific_prices WHERE `to` >= now() and `from` <= now()) discount', 'discount.product_id = products.id','left');
		$this->db->group_by('products.id');
		$this->db->where('products.category_default_id',$id);
		$this->db->where('product_medias.cover','1');
		$this->db->where('products.active','1');
		return $this->db->get()->result();
	}
	function getProductByName($name)
	{
		$this->db->select(" products.id,discount.reduction_type,
							discount.reduction,discount.price as discount,
							product_medias.path,product_medias.filename,
							products.name,products.reference,
							category.link_rewrite as slug,category.name as category,
							products.category_default_id,products.link_rewrite,
							products.price,products.active,products.available_for_order,
							products.show_price,products.description,products.condition,
							products.price,products.height,products.depth,products.weight,
							products.width,products.meta_title,products.meta_description,
							CASE	
								WHEN discount.reduction_type = 'percentage' THEN (products.price - (products.price * discount.reduction / 100))
								WHEN discount.reduction_type = 'amount' THEN (products.price - discount.price)
							END AS fix_price ");
		$this->db->from('products');
		$this->db->join('category', 'products.category_default_id = category.id','left');
		$this->db->join('product_medias','product_medias.product_id = products.id','left');
		$this->db->join('(SELECT * FROM specific_prices WHERE `to` >= now() and `from` <= now()) discount', 'discount.product_id = products.id','left');
		$this->db->group_by('products.id');
		$this->db->where('product_medias.cover','1');
		$this->db->where('products.active','1');
		$this->db->like('products.name',$name);
		return $this->db->get()->result();
	}
	function getProductAllin()
	{
		$this->db->select(" products.id,discount.reduction_type,
							discount.reduction,discount.price as discount,
							product_medias.path,product_medias.filename,
							products.name,products.reference,
							category.link_rewrite as slug,category.name as category,
							products.category_default_id,products.link_rewrite,
							products.price,products.active,products.available_for_order,
							products.show_price,products.description,products.condition,
							products.price,products.height,products.depth,products.weight,
							products.width,products.meta_title,products.meta_description,
							CASE	
								WHEN discount.reduction_type = 'percentage' THEN (products.price - (products.price * discount.reduction / 100))
								WHEN discount.reduction_type = 'amount' THEN (products.price - discount.price)
							END AS fix_price ");
		$this->db->from('products');
		$this->db->join('category', 'products.category_default_id = category.id','left');
		$this->db->join('product_medias','product_medias.product_id = products.id','left');
		$this->db->join('(SELECT * FROM specific_prices WHERE `to` >= now() and `from` <= now()) discount', 'discount.product_id = products.id','left');
		$this->db->group_by('products.id');
		$this->db->where('product_medias.cover','1');
		$this->db->where('products.active','1');
		return $this->db->get()->result();
	}
	function getProductJson($name)
	{
		$this->db->select('id,name');
		$this->db->from('products');
		$this->db->where('active','1');
		$this->db->like('name',$name);
		return $this->db->get();
	}
	function showAllProductDiscount()
	{ 						
		$this->db->select(" products.id,discount.reduction_type,
							discount.reduction,discount.price as discount,
							product_medias.path,product_medias.filename,
							products.name,products.reference,
							category.link_rewrite as slug,category.name as category,
							products.category_default_id,products.link_rewrite,
							products.price,products.active,products.available_for_order,
							products.show_price,products.description,products.condition,
							products.price,products.height,products.depth,products.weight,
							products.width,products.meta_title,products.meta_description,
							CASE	
								WHEN discount.reduction_type = 'percentage' THEN (products.price - (products.price * discount.reduction / 100))
								WHEN discount.reduction_type = 'amount' THEN (products.price - discount.price)
							END AS fix_price ");
		$this->db->from('products');
		$this->db->join('category', 'products.category_default_id = category.id','left');
		$this->db->join('product_medias','product_medias.product_id = products.id','left');
		$this->db->join('specific_prices discount', 'discount.product_id = products.id','left');
		$this->db->group_by('products.id');
		$this->db->where('product_medias.cover','1');
		$this->db->where('products.active','1');
		$this->db->where('discount.from <=', date('Y-m-d H:i:s'));
		$this->db->where('discount.to >=', date('Y-m-d H:i:s'));
		return $this->db->get()->result();

	}
	//$this->db->JOIN('(SELECT * FROM hist_promo WHERE status = "0" and  NOW() BETWEEN period_from and period_to) promo', 'promo.product_id = product.product_id', 'left');
}