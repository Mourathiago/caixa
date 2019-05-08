<?php
//incluo a classe de modelo;
require_once 'modelo.class.php';

//crio minha classe filho do meu modelo;

class cadastro extends modelo{
	
	//defino a tabela e suas colunas;

	protected $table = 'cadastro';
	private $solicitante;
	private $requisicao;
	private $motivo;
	private $data;

	//seto as colunas para armazenar durante a programação;

	public function setSolicitante($solicitante){
		$this->solicitante = $solicitante;
	}

	public function setRequisicao($requisicao){
	$this->requisicao = $requisicao;
	}

	public function setMotivo($motivo){
	$this->motivo = $motivo;
	}

	public function setUserid($userid){
	$this->userid = $userid;
	}

	//uso as funções abstrata;

	public function create(){

		$sql  = "INSERT INTO $this->table (solicitante, requisicao, motivo, data, userid) VALUES (:solicitante, :requisicao, :motivo, :data, :userid)";
		$stmt = db::prepare($sql);
		$stmt->bindParam(':solicitante', $this->solicitante, PDO::PARAM_STR);
		$stmt->bindParam(':requisicao', $this->requisicao, PDO::PARAM_INT);
		$stmt->bindParam(':motivo', $this->motivo, PDO::PARAM_STR);
		$stmt->bindParam(':data', date('Y/m/d'), PDO::PARAM_STR);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_STR);
		return $stmt->execute();

	}

}