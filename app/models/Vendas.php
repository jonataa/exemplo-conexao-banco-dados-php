<?php

namespace My\App\Models;

class Vendas
{

	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getAll()
	{
		$stmt = $this->db->query('SELECT * FROM vendas');
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

}