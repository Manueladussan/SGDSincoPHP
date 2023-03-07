<?php 

require_once 'model/documento.php';

class documentoController{
	public $page_title;
	public $view;
	public $model;

	public function __construct() {
		$this->view = 'documentos';
		$this->page_title = '';
		$this->model = new Documento();
	}

	public function list(){
		return $this->model->getDocumentos();
	}

	public function create(){
		if(isset($_POST) && isset($_FILES['archivo'])){			
			if(!empty($_FILES['archivo']['name'])){
				$ruta = 'upload/' . $_FILES['archivo']['name'];
				if (file_exists($ruta)) {
					$ruta = explode(".", $ruta);
					$ruta = $ruta['0'] . date('His') .".". $ruta['1'];
				}
				if(move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta)){
					echo "Subio";
				}else{
					echo "No subio";
				}
			}
		}
		$data = array_merge($_POST, $_FILES);
		$this->model->createDocument($data, $ruta);
		header('Location: index.php?controller=documento&action=list');
		exit();
	}

	public function edit(){
		if(!empty($_FILES['archivo']['name'])){
			$ruta_unlink = 'upload/'. $_POST['name_document'];
			unlink($ruta_unlink);
			$ruta_upload = 'upload/' . $_FILES['archivo']['name'];
			move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_upload);
		}
		$data = array_merge($_POST, $_FILES);		
		$this->model->editDocument($data);
		header('Location: index.php?controller=documento&action=list');
		exit();
	}

	public function delete(){
		$ruta = 'upload/' . $_GET['archivo'];
		unlink($ruta);
		$this->model->deleteDocumentById($_GET["id"]);
		header('Location: index.php?controller=documento&action=list');
		exit();
	}

}

?>