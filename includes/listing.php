<?php

$message = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success';
            $message = '<div class="alert alert-success">Ação executada com sucesso</div>';
            break;
        case 'error':
            $message = '<div class="alert alert-danger">Id não encontrado</div>';
            break;
    }
}

$results = '';
foreach ($fornecedor as $fornecedor) {
    $results .= '<tr>
                        <td>' . $fornecedor->id . '</td>
                        <td>' . $fornecedor->name . '</td>
                        <td>' . $fornecedor->cnpj . '</td>
                        <td>' . $fornecedor->specialty . '</td>
                        <td>
                            <a href="edit.php?id=' . $fornecedor->id . '">
                                <button type="button" class="btn btn-primary">Editar</button>
                            </a>
                            <a href="delete.php?id=' . $fornecedor->id . '">
                                <button type="button" class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>';
}

$results = strlen($results) ? $results :    '<tr>
                                                    <td colspan="6" class="text-center">Nenhum fornecedor encontrado</td>
                                                </tr>';
?>

<main>

    <?= $message ?>

    <section>
        <table class="table table-dark mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Especialidade</th>
                </tr>
            </thead>
            <tbody>
                <?= $results ?>
            </tbody>
        </table>
    </section>

    <div class="container">
        <div class="row">
            <div class="col text-center mb-3">
                <a href="register.php" class="btn btn-primary btn-lg">Novo fornecedor</a>

            </div>
        </div>
        <div class="col text-center">
            <a href="index.php" class="btn btn-primary btn-lg">Voltar</a>
        </div>
    </div>
</main>