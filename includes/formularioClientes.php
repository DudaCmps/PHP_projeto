<!-- Conteúdo formulario-->
<div class="wrapper" style="margin-left:16rem;">
    <main class="container-fluid px-4 mt-3">

    <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="name" class="form-control" name="nome" value="<?=$obCliente->nome?>">
                <!-- comentario para inputs -->
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" value="<?=$obCliente->cpf?>">
            </div>

            <div class="mb-3">
                <label for="data_nasc" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" name="data_nasc" value="<?=$obCliente->data_nasc?>">
            </div>

            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" value="<?=$obCliente->telefone?>">
            </div>

            <h4 style="padding:25px 0px">Endereço</h4>

             <div class="mb-3">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" name="cidade" >
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" name="estado" >
            </div>

            <div class="mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" name="cep" >
            </div>

            <div class="mb-3">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" name="bairro" >
            </div>

            <div class="mb-3">
                <label for="logradouro" class="form-label">Logradouro</label>
                <input type="text" class="form-control" name="logradouro" >
            </div>

            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="number" class="form-control" name="numero" >
            </div>

            <div class="mb-3">
                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" class="form-control" name="complemento" >
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
            
        </form>

    </main>
</div>