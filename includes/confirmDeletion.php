<main>
    <form method="post" class="col text-center">

        <div class="form-group">
            <h3>Deseja realmente excluir o fornecedor <strong><?= $obFornecedor->name ?></strong> ?</h3>
        </div>

        <div class="form-group">
            <a href="index.php">
                <button type="button" class="btn btn-lg btn-success">Cancelar</button>
            </a>

            <button type="submit" name="delete" class="btn btn-lg btn-danger"> Confirmar </button>
        </div>
    </form>
</main>