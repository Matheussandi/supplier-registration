<main>
    <form method="post" class="col text-center">

        <div class="form-group mb-3">
            <label> Nome </label>
            <input type="text" class="form-control" name="name" placeholder="Digite o nome" value="<?= $obFornecedor->name ?>">
        </div>

        <div class="form-group mb-3">
            <label> CNPJ </label>
            <input type="text" name="cnpj" class="form-control" placeholder="Digite o CNPJ" minlength="14" maxlength="14" value="<?= $obFornecedor->cnpj ?>">
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="specialty" value="comercio" checked>
            <label class="form-check-label">Comércio</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="specialty" value="servico" <?= $obFornecedor->specialty == 'servico' ? 'checked' : '' ?>">
            <label class="form-check-label">Serviço</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="specialty" value="industria" <?= $obFornecedor->specialty == 'industria' ? 'checked' : '' ?>">
            <label class="form-check-label">Indústria</label>
        </div>

        <div class="justify-content-between mt-3">
            <a href="index.php" class="btn btn-primary btn-lg">Voltar</a>
            <button type="submit" class="btn btn-primary btn-lg"> Enviar </button>
        </div>

    </form>
</main>