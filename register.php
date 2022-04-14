<?php

include __DIR__ . '/vendor/autoload.php';

define('TITTLE', 'Cadastrar fornecedor');

use \App\Entity\Fornecedor;
$obFornecedor = new Fornecedor;

// VALIDAÇÃO DO POST
if (isset($_POST['name'], $_POST['cnpj'], $_POST['specialty'])) {
    
    $obFornecedor->name = $_POST['name'];
    $obFornecedor->cnpj = $_POST['cnpj'];
    $obFornecedor->specialty = $_POST['specialty'];
    $obFornecedor->register();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/register.php';
include __DIR__ . '/includes/footer.php';