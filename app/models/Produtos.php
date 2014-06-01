<?php

namespace My\App\Models;

class Produtos
{

	protected $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function getAll()
	{
		$stmt = $this->db->query('SELECT * FROM produtos');
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

}