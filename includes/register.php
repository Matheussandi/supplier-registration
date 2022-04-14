<form method="post" class="col text-center">

    <div class="form-group mb-3">
        <label> Nome </label>
        <input type="text" class="form-control" name="name" placeholder="Digite o nome">
    </div>

    <div class="form-group mb-3">
        <label> CNPJ </label>
        <input type="text" class="form-control" name="cnpj" placeholder="Digite o CNPJ" minlength="14" maxlength="14">
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="specialty" value="comercio" checked>
        <label class="form-check-label">Comércio</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="specialty" value="servico">
        <label class="form-check-label">Serviço</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="specialty" value="industria">
        <label class="form-check-label">Indústria</label>
    </div>

    <div class="justify-content-between mt-3">
        <a href="index.php" class="btn btn-primary btn-lg">Voltar</a>
        <button type="submit" class="btn btn-primary btn-lg"> Enviar </button>
    </div>

</form>
</main>