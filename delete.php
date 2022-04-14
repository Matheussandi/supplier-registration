<?php

include __DIR__ . '/vendor/autoload.php';

use \App\Entity\Fornecedor;

// Valida id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header ('location: index.php?status=error');
    exit;
}

// Consulta vaga
$obFornecedor = Fornecedor::getFornecedores($_GET['id']);

// Validação da vaga
if(!$obFornecedor instanceof Fornecedor) {
    header ('location: index.php?status=error');
    exit;
}

// Validação do POST
if (isset($_POST['delete'])) {
    
    $obFornecedor->delete();

    header('location: index.php?status=success');
    exit;

}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmDeletion.php';
include __DIR__ . '/includes/footer.php';