<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{


		/* Products details for a printer */
	public function showProducts($printerID = null){

		if(!isset($printerID)){
			redirect('/Products/searchPrinter/');
		}
		elseif(empty($printer = $this->Printers_model->getPrinterModel($printerID)[0])){
			redirect('/Products/searchPrinter/');
		}

		$data['products'] = $this->Products_model->selectByPrinter($printerID);
		$data['mark'] = $printer->mark;
		$data['model'] = $printer->model;
		$data['printer'] = $printer->printer;
		
		$this->load->view('header');
		$this->load->view('showProduct', $data);
	}

	public function searchPrinter($mark = null, $model = null, $printer = null){
		$data['marks'] = $this->Printers_model->selectMarks($mark);
		if(isset($mark)){
			$mark = str_replace('%20', ' ', $mark);
			$data['selectedMark'] = $mark;
			$data['models'] = $this->Printers_model->selectModels($mark);			
		}
		if(isset($model)){
			$model = str_replace('%20', ' ', $model);
			$data['selectedModel'] = $model;
			$data['printers'] = $this->Printers_model->selectPrinters($mark, $model);
		}
		if(isset($printer)){
			$printer = str_replace('%20', ' ', $printer);
			$printerID = $this->Printers_model->getPrinterID($model, $printer);
			redirect('/Products/showProducts/'.$printerID);
		}
		$this->load->view('header');
		$this->load->view('browsePrinters', $data);
	}

		/* Show the form to update a product */
	public function updateForm($productID){

	}

		/* Show the form to add a product */
	public function addForm(){
		echo $this->Products_model->addOne($product);
	}

		/* Show the form to add a list of products */
	public function addList(){
		echo $this->Products_model->addAll($products);
	}


}

?>
