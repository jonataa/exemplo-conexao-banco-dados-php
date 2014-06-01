<?php

namespace My\App\Controllers;

use My\Lib\Template as T;
use My\App\Models\Vendas;

class VendasController
{

	public function listar($db)
	{
		$vendasModel = new Vendas($db);
		$vendas = $vendasModel->getAll($db);

		$template = new T;
		$template->render(
			'../app/views/vendas-list.phtml', 
			['vendas' => $vendas]
		);
	}

	public function nova($db)
	{
		$vendasModel = new Vendas($db);

		$template = new T;
		$template->render(
			'../app/views/vendas-new.phtml'			
		);
	}

}