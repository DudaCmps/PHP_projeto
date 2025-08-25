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
            
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </main>
</div>