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
		
		foreach($data['products'] as $product)
			$data['images'][$product->ID]  = $this->getImage($product->ID);

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
		$data['product'] = $this->Products_model->selectOne($productID);
		$data['printers'] = $this->Printers_model->selectCompatiblePrinters($productID);
		$data['image'] = $this->getImage($productID);

		if($this->input->post()){
			if($this->form_validation->run()){
				$printersToAdd = [];
				$printersToRemove = [];
				$initialPrinters = [];

				$product['reference'] = trim($_POST['reference']);
				$product['label'] = trim($_POST['label']);
				$product['price'] = $_POST['price'];

				if(isset($_POST['available']))
					$product['available'] = 1;
				else
					$product['available'] = 0;

				$now = new DateTime();
				$now = $now->format('Y-m-d H-i-s');
				$product['updated'] = $now;


				foreach($data['printers'] as $printer)
					array_push($initialPrinters, $printer->ID);
				$compsToSet = explode('|', $_POST['printers']);
				array_pop($compsToSet);
				foreach($compsToSet as $printer){
					if(!in_array($printer, $initialPrinters)){
						array_push($printersToAdd, array('productID' => $productID,
										'printerID' => $printer));
					}
				}
				foreach ($initialPrinters as $initialPrinter) {
					if(!in_array($initialPrinter, $compsToSet)){
						array_push($printersToRemove, array('productID' => $productID,
										'printerID' => $initialPrinter));
					}
				}

				if($data['updated'] = $this->Products_model->update($product, $productID)){
					if(!empty($printersToRemove))
						$this->Products_model->removeCompatibilities($printersToRemove);
					if(!empty($printersToAdd))
						$this->Products_model->addCompatibilities($printersToAdd);
				}
				$data['printers'] = $this->Printers_model->selectCompatiblePrinters($productID);

				if(!empty($_FILES['image']['name'])){
					
					$imageFolder = floor($productID / 100);
					if(!is_dir('assets\imgs\store\\'.$imageFolder)){
						mkdir('assets\imgs\store\\'.$imageFolder, 0755);
					}

					$config['upload_path'] = 'assets/imgs/store/'.$imageFolder.'/';
					$config['file_name'] = $productID;
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['overwrite'] = true;
					$config['max_width'] = 2048;
					$config['max_height'] = 2048;

					$this->load->library('upload', $config);
					if(!$this->upload->do_upload('image')){
						$data['uploadError'] = true;
					}
				}
			}
		}

		$this->load->view('header');
		$this->load->view('updateForm', $data);
	}

		/* Show the form to add a product */
	public function addForm(){
		$data = [];
		if($this->input->post()){
			if($this->form_validation->run()){
				$printers = [];
		
				$product['reference'] = trim($_POST['reference']);
				$product['label'] = trim($_POST['label']);
				$product['price'] = $_POST['price'];

				if(isset($_POST['available']))
					$product['available'] = 1;
				else
					$product['available'] = 0;
			
				$compatibles = explode('|', $_POST['printers']);
				array_pop($compatibles);

				if($inserted = $this->Products_model->addOne($product)){
					foreach($compatibles as $printer){
						array_push($printers, array('productID' => $inserted,
											'printerID' => $printer));
					}
					$this->Products_model->addCompatibilities($printers);
					$data['added'] = true;

					if(!empty($_FILES['image']['name'])){

						$imageFolder = floor($inserted / 100);
						if(!is_dir('assets\imgs\store\\'.$imageFolder)){
							mkdir('assets\imgs\store\\'.$imageFolder, 0755);
						}

						$config['upload_path'] = 'assets/imgs/store/'.$imageFolder.'/';
						$config['file_name'] = $inserted;
						$config['allowed_types'] = 'gif|jpg|jpeg|png';
						$config['overwrite'] = true;
						$config['max_width'] = 2048;
						$config['max_height'] = 2048;

						$this->load->library('upload', $config);
						if(!$this->upload->do_upload('image')){
							$data['uploadError'] = true;
						}
					}
				}
	        }
		}

		$this->load->view('header');
		$this->load->view('addForm', $data);
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

	public function productSearchQuery(){
		$products = [];
		$this->form_validation->run();
		$text = $this->input->post('text');
		$available = $this->input->post('available');
		$sort = $this->input->post('sort');
		$sort = str_replace('asc', ' ASC', $sort);
		$sort = str_replace('desc', ' DESC', $sort);
		$products = $this->Products_model->searchProducts($text, $available, $sort);
		foreach ($products as &$product) {
			$product['image'] = $this->getImage($product['ID']);
		}
		echo json_encode($products);
	}

	public function manageProducts(){
		$products = [];
		$images = [];
		$products = $this->Products_model->selectAll();
		$data['products'] = $products;

		foreach($products as $product)
			$images[$product->ID] = $this->getImage($product->ID);
		$data['images'] = $images;

		$this->load->view('header');
		$this->load->view('productsList', $data);
	}

	public function deleteProduct($productID = null){
		if(!isset($productID)){
			$this->form_validation->run();
			$productID = $this->input->post('id');
		}
		
		if(!strpos($this->getImage($productID), 'noimg.jpg')){
			array_map('unlink', glob('assets/imgs/store/'.floor($productID / 100).'/'.$productID.'.*'));
		}
		echo $this->Products_model->removeOne($productID);
	}

	public function getImage($productID){
		$baseImage = 'assets/imgs/noimg.jpg';
		$imagePath = 'assets/imgs/store/'.floor($productID / 100);
		$imageName = '';
		if(is_dir($imagePath)){
			$content = scandir($imagePath);
			foreach($content as $image){
				if(explode('.', $image)[0] == $productID){
					$imageName = $image;
					break;
				}
			}
		}

		if(!empty($imageName))
			return base_url($imagePath . '/' . $imageName);
		else
			return base_url($baseImage);
	}



}

?>
