<?php 

class Documento {

	private $table = 'documentos';
	private $conection;

	public function __construct() {
		
	}

	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	public function getDocumentos(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function createDocument($data, $ruta)
	{
		$ruta = explode("/", $ruta);
		$this->getConection();
		try 
		{
		$sql = "INSERT INTO ". $this->table." (nombre_personalizado,nombre_real,extension,mime_type,archivo) 
		        VALUES (?, ?, ?, ?, ?)";


		$insert = $this->conection->prepare($sql);
		$insert->execute(
				array(
                    $data['nombre_personalizado'],
                    $ruta['1'], 
                    $data['extension'],
                    $data['mime_type'],
					$ruta['1']
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editDocument($data)
	{		
		if(!empty($data['archivo']['name'])){
			$archivo = $data['archivo']['name'];
		}else{
			$archivo = $data['nombre_actual_edit'];
		}
		$this->getConection();
		try 
		{
			$sql = "UPDATE ". $this->table." SET nombre_personalizado = ?, nombre_real = ?, extension = ?, mime_type = ?, archivo = ? WHERE id = ?";

			$this->conection->prepare($sql)
			     ->execute(
				    array(
                        $data['nombre_personalizado'],
						$data['nombre_real'], 
						$data['extension'],
						$data['mime_type'],
						$archivo,
                        $data['id_document']
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function deleteDocumentById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>