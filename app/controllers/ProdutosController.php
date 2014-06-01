<?php

namespace My\App\Controllers;

use My\Lib\Template;
use My\App\Models\Produtos;

class ProdutosController
{

	protected $model;

	public function __construct(Produtos $produtos)
	{
		$this->model = $produtos;
	}

	public function listar()
	{		
		$produtos = $this->model->getAll();	
		
		$template = new Template;
		$template->render(
			'../app/views/produtos-list.phtml', 
			['produtos' => $produtos]
		);
	}

}