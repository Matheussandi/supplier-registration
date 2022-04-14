<?php

include __DIR__ . '/vendor/autoload.php';

use \App\Entity\Fornecedor;

$fornecedor = Fornecedor::getFornecedor();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listing.php';
include __DIR__ . '/includes/footer.php';