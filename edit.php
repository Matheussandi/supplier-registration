<?php

include __DIR__ . '/vendor/autoload.php';

define('TITTLE', 'Editar fornecedor');

use \App\Entity\Fornecedor;

// Valida id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header ('location: index.php?status=error');
    exit;
}

// Consulta fornecedor
$obFornecedor = Fornecedor::getFornecedores($_GET['id']);

// Validação fornecedor
if(!$obFornecedor instanceof Fornecedor) {
    header ('location: listagem.php?status=error');
    exit;
}

// Validação do POST
if (isset($_POST['name'], $_POST['cnpj'], $_POST['specialty'])) {
    
    $obFornecedor->name = $_POST['name'];
    $obFornecedor->cnpj = $_POST['cnpj'];
    $obFornecedor->specialty = $_POST['specialty'];
    $obFornecedor->update();

    header('location: listagem.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form.php';
include __DIR__ . '/includes/footer.php';