<?php

include __DIR__ . '/vendor/autoload.php';

use \App\Entity\Fornecedor;

$fornecedor = Fornecedor::getFornecedor();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/selection.php';
include __DIR__ . '/includes/footer.php';

?>