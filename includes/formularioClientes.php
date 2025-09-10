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
                <input type="text" class="form-control" id="nome" name="nome" value="<?=$obCliente->nome?>" required>
              </div>

              <div class="input-group mb-3">
                <label for="telefone" class="input-group-text">Telefone</label>
                <input type="text" class="form-control me-3" id="telefone" placeholder="(00) 00000-0000"
                  style="border-radius: 0px 5px 5px 0px" name="telefone" value="<?=$obCliente->telefone?>" required>

                <label for="cpf" class="input-group-text" style="border-radius: 5px 0px 0px 5px">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00" value="<?=$obCliente->cpf?>" required>
              </div>

              <div class="input-group mb-3">
                <label for="data_nasc" class="input-group-text">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" max="2005" value="<?=$obCliente->data_nasc?>" required>
              </div>

              <label class="form-label">Endereço</label>

              <div class="input-group mb-3">
                <label for="cep" class="input-group-text">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000">
              </div>

              <div class="input-group mb-3">
                <label for="cidade" class="input-group-text">Cidade</label>
                <input type="text" class="form-control me-3" id="cidade" name="cidade" style="border-radius: 0px 5px 5px 0px">

                <label for="estado" class="input-group-text" style="border-radius: 5px 0px 0px 5px">Estado</label>
                <input type="text" class="form-control me-3" id="estado" name="estado" style="border-radius: 0px 5px 5px 0px">

                <label for="numero" class="input-group-text" style="border-radius: 5px 0px 0px 5px">Número</label>
                <input type="text" class="form-control" id="numero" name="numero">
              </div>

              <div class="input-group mb-3">
                <label for="bairro" class="input-group-text">Bairro</label>
                <input type="text" class="form-control me-3" id="bairro" name="bairro">

                <label for="logradouro" class="input-group-text" style="border-radius: 5px 0px 0px 5px">Logradouro</label>
                <input type="text" class="form-control" id="logradouro" name="logradouro">
              </div>

              <div class="input-group mb-3">
                <label for="complemento" class="input-group-text">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento">
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
