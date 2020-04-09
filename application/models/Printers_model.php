<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Printers_model extends CI_Model
{

	public function selectMarks(){
		$this->db->select('mark');
		$this->db->distinct();
		$this->db->order_by('mark');
		return $this->db->get('printers')->result();
	}

	public function selectModels($mark){
		$this->db->select('model');
		$this->db->distinct();
		$this->db->like('mark', $mark, 'none');
		$this->db->order_by('model');
		return $this->db->get('printers')->result();
	}

	public function selectPrinters($mark, $model){
		$this->db->select('model, printer');
		$this->db->like('mark', $mark, 'none');
		$this->db->like('model', $model, 'none');
		$this->db->order_by('printer');
		return $this->db->get('printers')->result();
	}

	public function getPrinterID($model, $printer){
		$this->db->select('id');
		$this->db->like('model', $model, 'none');
		$this->db->like('printer', $printer, 'none');
		return $this->db->get('printers')->result()[0]->id;
	}

	public function getPrinterModel($printerID){
		$this->db->where('id = ', $printerID);
		return $this->db->get('printers')->result();
	}


}

?>