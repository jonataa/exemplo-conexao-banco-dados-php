<?php

define('URI', $_SERVER['REQUEST_URI']);
define('METHOD', $_SERVER['REQUEST_METHOD']);

include '../vendor/autoload.php';

use My\Lib\Connection as DB;
use My\App\Controllers\ProdutosController as Produtos;
use My\App\Models\Produtos as ProdutosModel;
use My\App\Controllers\VendasController as Vendas;

$conn = new DB;
$db = $conn->getDB();

if (URI == '/produtos/listar' && METHOD == 'GET') {			

	$controller = new Produtos(new ProdutosModel($db));
	$controller->listar($db);

} elseif (URI == '/vendas/listar') {		

	$controller = new Vendas;
	$controller->listar($db);

} elseif (URI == '/vendas/nova') {			

	$controller = new Vendas;
	$controller->nova($db);

} else { 
	header('Location: /404.html');
}