
<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Products_model extends CI_Model
{


		/* Select all products */
	public function selectAll(){
		return $this->db->get('products')->result();
	}

		/* Select a single product */
	public function selectOne($productID){
		$this->db->where('ID = ', $productID);
		return $this->db->get('products');

	}

		/* Select all cartridges that are compatible with a printer  */
	public function selectByPrinter($printerID){
		$this->db->join('compatibilities', 'printerID = ' . $printerID);
		$this->db->where('compatibilities.productID = products.ID');
		$this->db->where('products.available = 1');
		return $this->db->get('products')->result();
	}

		/* Add a single product */
	public function addOne($product){
		$this->db->insert('products', $product);
		return $this->db->insert_id();
	}

		/* Add a list of products */
	public function addAll($products){
		$inserted = [];
		return $this->db->insert_batch('products', $products);
	}

	public function addCompatibilities($comps){
		foreach($comps as $comp){
			$this->db->insert('compatibilities', $comp);
		}
	}

		/* Update a product */
	public function update($product){
		$this->db->where('ID = ', $product['ID']);
		return $this->db->update('products', $product);
	}

		/* Remove a single product */
	public function removeOne($productID){
		$this->db->where('ID', $productID);
		if(!$this->db->delete('products'))
			return false;
		else
			return true;
	}

		/* Remove all products */
	public function removeAll(){
		return $this->db->empty_table('products');
	}

	public function searchProducts($text, $available){
		$this->db->where('ID = ', $text);
		if(!$available)
			$this->db->where('available' == 1);
		$this->db->or_like('reference', $text, 'after');
		$this->db->or_like('label', $text, 'both');
		return $this->db->get('products')->result_array();
	}



}

?>