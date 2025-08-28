<!-- Conteúdo formulario-->
<div class="wrapper" style="margin-left:16rem;">
    <main class="container-fluid px-4 mt-3">

    <form method="post">
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelos</label>
                <select name="modelo" class="form-select">
                <option value="" disabled selected>Selecione uma opção</option>
                    <option value="1">Corolla</option>
                    <option value="2">Yaris</option>
                    <option value="3">Civic</option>
                    <option value="4">Fit</option>
                    <option value="5">Fiesta</option>
                    <option value="6">Focus</option>
                </select>
                <!-- comentario para inputs -->
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>

            <div class="mb-3">
                <label for="ano_fabricacao" class="form-label">Ano de Fabricação</label>
                <input type="text" placeholder="AAAA" class="form-control" name="ano_fabricacao" >
            </div>

            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" name="placa" placeholder="XXX1X11" >
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select">
                    <option value="" disabled selected>Selecione uma opção</option>
                    
                    <option value="luxo">Luxo</option>
                    <option value="economico">Econômico</option>
                    <option value="suv">SUV</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">       
                    <option value="" disabled selected>Selecione uma opção</option>
                        
                    <option value="disponivel">Disponível</option>
                    <option value="alugado">Alugado</option>
                    <option value="manutencao">Manuntenção</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </form>

    </main>
</div>