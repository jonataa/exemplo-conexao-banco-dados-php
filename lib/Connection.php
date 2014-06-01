<?php

namespace My\Lib;

class Connection
{

	protected $db;

	public function __construct($dsn = 'sqlite:../db/loja.db')
	{
		$this->db = new \PDO($dsn);
	}

	public function getDB()
	{	return $this->db;
	}

}