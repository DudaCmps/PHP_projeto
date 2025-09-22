<div class="d-flex flex-column flex-grow-1">

  <div class="m-4">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <div class="card-header">
            <strong>Cadastro</strong>
          </div>

          <div class="card-body">
            <form method="post">

              <div class="input-group mb-3">
                <label for="nome" class="input-group-text" id="basic-addon1">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?=$obUsuario->nome?>" required>
              </div>

              <div class="input-group mb-3">
                <label for="telefone" class="input-group-text">Telefone</label>
                <input type="text" class="form-control me-3" id="telefone" placeholder="(00) 00000-0000"
                  style="border-radius: 0px 5px 5px 0px" name="telefone" value="<?=$obUsuario->telefone?>" required>

                <label for="cpf" class="input-group-text" style="border-radius: 5px 0px 0px 5px">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" value="<?=$obUsuario->cpf?>" required>
              </div>

              <div class="input-group mb-3">
                <label for="data_nasc" class="input-group-text">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" max="2005" value="<?=$obUsuario->data_nasc?>" required>
              </div>

              <button type="submit" class="btn btn-primary mb-3 mt-2">Cadastrar</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- FECHAMENTO DA NAV -->
</div>
</body>
</html>
