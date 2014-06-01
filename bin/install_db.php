<?php

include '../lib/Connection.php';

use My\Lib\Connection as DB;

$conn = new DB;

// PRODUTOS
$conn->getDB()->exec('DROP TABLE produtos;');
$conn->getDB()->exec('CREATE TABLE produtos(id INTEGER PRIMARY KEY, descricao TEXT, preco REAL);');

$produtos[] = ['descricao' => 'TV 32" LED SAMSUNG', 'preco' => 1799.00];
$produtos[] = ['descricao' => 'Microsoft XBOX 360', 'preco' => 999.00];
$produtos[] = ['descricao' => 'Celular Samsung Galaxy S4', 'preco' => 2399.00];
$produtos[] = ['descricao' => 'Smartphone Moto G', 'preco' => 899.40];

$stmt = $conn->getDB()->prepare('INSERT INTO produtos(descricao, preco) VALUES(:descricao, :preco);');
foreach ($produtos as $produto) {	
	$stmt->bindParam(':descricao', $produto['descricao']);
	$stmt->bindParam(':preco', $produto['preco']);
	$stmt->execute();
}

// VENDAS
$conn->getDB()->exec('DROP TABLE vendas;');
$conn->getDB()->exec('CREATE TABLE vendas(id INTEGER PRIMARY KEY, produto_id INTEGER, descricao TEXT, preco REAL);');

$vendas[] = [
	'produto_id' => 1, 
	'descricao' => 'VENDA DIA 22/03/2014 - PREÇO R$ 1.799,00 - JOÃO DA SILVA', 
	'preco' => 1799.00
];

$vendas[] = [
	'produto_id' => 3, 
	'descricao' => 'VENDA DIA 16/04/2014 - PREÇO R$ 2.399,00 - FOO BAR', 
	'preco' => 2399.00
];

$stmt = $conn->getDB()->prepare('INSERT INTO vendas(produto_id, descricao, preco) VALUES(:produto_id, :descricao, :preco);');
foreach ($vendas as $venda) {	
	$stmt->bindParam(':produto_id', $venda['produto_id']);
	$stmt->bindParam(':descricao', $venda['descricao']);
	$stmt->bindParam(':preco', $venda['preco']);
	$stmt->execute();
}

// EXIBIR DADOS
$stmt = $conn->getDB()->query('SELECT * FROM produtos;');
$produtos_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->getDB()->query('SELECT * FROM vendas;');
$vendas_db = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($vendas_db);