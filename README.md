Exemplo Simples – Banco de Dados + MVC
======================================

Esse projeto foi desenvolvido durante a aula do curso PHP UNIFACS 2014.1 (31/05/2014) a fim de exemplifcar como funciona o MVC e conexão com banco de dados utilizando a classe [PDO](http://www.php.net/manual/pt_BR/class.pdo.php).

Requesitos
----------
* PHP >= 5.4

Como usar
---------
Baixe o projeto em formato ZIP [aqui](https://github.com/jonataa/exemplo-conexao-banco-dados-php/archive/master.zip), descompacte-o em qualquer pasta e digite os comandos abaixo:
```shell
cd pasta/do/projeto
php -S localhost:8000 -t web/
```

Rotas Disponíveis
-----------------
> http://localhost:8000/produtos/listar
> http://localhost:8000/vendas/listar

Conexão com Banco de Dados
--------------------------
```php
<?php

$db = new \PDO('sqlite:pasta/do/banco/projeto.db');
$stmt = $db->prepare('INSERT INTO produtos(descricao, preco) VALUES(:descricao, :preco);');
$stmt->bindParam(':descricao', 'XBOX 360', \PDO::PARAM_STR);
$stmt->bindParam(':preco', 3999.00);
$stmt->execute();

?>
```
Mais informações: http://www.phptherightway.com/#databases
