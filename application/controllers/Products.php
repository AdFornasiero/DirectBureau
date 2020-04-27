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
		
		$colorKeywords = array('black' => array('noir','black', 'multicolore', 'pack de 4', 'pack de 5', 'couleur', 'couleurs'),
								'cyan' => array('cyan', 'bleu', 'bleue','multicolore', 'pack de 4', 'pack de 5', 'couleur', 'couleurs'),
								'magenta' => array('magenta','multicolore', 'pack de 4', 'pack de 5', 'couleur', 'couleurs'),
								'yellow' => array('yellow','jaune','multicolore', 'pack de 4', 'pack de 5', 'couleur', 'couleurs'),
								'red' => array('red','rouge'));

		foreach($data['products'] as $product){

			$product->colors = [];
			foreach($colorKeywords['black'] as $keyword){
				if(stripos($product->label, $keyword)){
					array_push($product->colors, 'bg-black');
					break;
				}
			}
			foreach($colorKeywords['cyan'] as $keyword){
				if(stripos($product->label, $keyword)){
					array_push($product->colors, 'bg-teal-400');
					break;
				}
			}
			foreach($colorKeywords['magenta'] as $keyword){
				if(stripos($product->label, $keyword)){
					array_push($product->colors, 'bg-pink-700');
					break;
				}
			}
			foreach($colorKeywords['red'] as $keyword){
				if(stripos($product->label, $keyword)){
					array_push($product->colors, 'bg-red-700');
					break;
				}
			}
			foreach($colorKeywords['yellow'] as $keyword){
				if(stripos($product->label, $keyword)){
					array_push($product->colors, 'bg-yellow-400');
					break;
				}
			}
		}

		$this->load->view('header');
		$this->load->view('showProduct', $data);
	}

	public function searchPrinter($mark = null, $model = null, $printer = null){
		$data['emptyPrinters'] = [];
		$data['header'] = 'Sélectionnez la marque de votre imprimante';
		$data['marks'] = $this->Printers_model->selectMarks();
		if(isset($mark)){
			$data['header'] = 'Sélectionnez la gamme';
			$mark = str_replace('%20', ' ', $mark);
			$data['selectedMark'] = $mark;
			$data['models'] = $this->Printers_model->selectModels($mark);
			if(empty($data['models']))
				redirect('/Products/searchPrinter/');	
		}
		if(isset($model)){
			$data['header'] = 'Sélectionnez le modèle';
			$model = str_replace('%20', ' ', $model);
			$data['selectedModel'] = $model;
			$data['printers'] = $this->Printers_model->selectPrinters($mark, $model);
			if(empty($data['printers']))
				redirect('/Products/searchPrinter/'.$mark);	
			$data['emptyPrinters'] = $this->Printers_model->getEmptyPrinters($model, $data['printers']);
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
		if($this->input->post()){
			if($this->form_validation->run()){
				$printers = [];
				$compatibles = explode('|', $_POST['printers']);
				array_pop($compatibles);
				$product['reference'] = trim($_POST['reference']);
				$product['label'] = trim($_POST['label']);
				$product['price'] = $_POST['price'];
				if(isset($_POST['available']))
					$product['available'] = 1;
				else
					$product['available'] = 0;
			
				if($inserted = $this->Products_model->addOne($product)){
					foreach($compatibles as $printer){
						array_push($printers, array('productID' => $inserted,
											'printerID' => $printer));
					}
					$this->Products_model->addCompatibilities($printers);
					echo var_dump($printers);
					echo var_dump($product);
				}
	        }
	        else{
	            
	        }
		}
		else{
		}
		$this->load->view('header');
		$this->load->view('addForm');
	}

		/* Show the form to add a list of products */
	public function addList(){
		echo $this->Products_model->addAll($products);
	}

	public function printerSearchQuery(){
		$printers = [];
		$this->form_validation->run();
		$text = $this->input->post('input');
		if(!empty($text))
			$printers = $this->Printers_model->searchPrinter($text);
		echo json_encode($printers);
	}


}

?>
