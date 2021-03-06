<?php

// Incluo a classe de conexão ao db;

require_once('db.class.php');

// Crio minha classe abstrata (Classes abstratas são modelos para classes filhos, todos os termos abtratos devem ser herdados);

abstract class modelo extends db {

	//defino a minha tabela nas classes filhos;

	protected $table;

	//abstraio as funções para as classes;

	abstract public function create();
}
