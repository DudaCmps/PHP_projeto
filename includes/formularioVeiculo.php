<!-- Conteúdo formulario-->
<div class="wrapper" style="margin-left:16rem;">
    <main class="container-fluid px-4 mt-3">

    <form method="post">
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelos</label>
                <select name="modelo" class="form-select">
                <option value="" disabled selected>Selecione uma opção</option>
                    <option value="1" <?= $obCarro->fk_modelo == '1' ? 'selected' : '' ?> >Corolla</option>
                    <option value="2" <?= $obCarro->fk_modelo == '2' ? 'selected' : '' ?> >Yaris</option>
                    <option value="3" <?= $obCarro->fk_modelo == '3' ? 'selected' : '' ?> >Civic</option>
                    <option value="4" <?= $obCarro->fk_modelo == '4' ? 'selected' : '' ?> >Fit</option>
                    <option value="5" <?= $obCarro->fk_modelo == '5' ? 'selected' : '' ?> >Fiesta</option>
                    <option value="6" <?= $obCarro->fk_modelo == '6' ? 'selected' : '' ?> >Focus</option>
                </select>
                <!-- comentario para inputs -->
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>

            <div class="mb-3">
                <label for="ano_fabricacao" class="form-label">Ano de Fabricação</label>
                <input type="text" placeholder="AAAA" class="form-control" name="ano_fabricacao" value="<?=$obCarro->ano_fabricacao?>">
            </div>

            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" name="placa" placeholder="XXX1X11" value="<?=$obCarro->placa?>" >
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select">
                    <option value="" disabled selected>Selecione uma opção</option>
                    
                    <option value="luxo" <?= $obCarro->categoria == 'luxo' ? 'selected' : '' ?> >Luxo</option>
                    <option value="economico" <?= $obCarro->categoria == 'economico' ? 'selected' : '' ?> >Econômico</option>
                    <option value="suv" <?= $obCarro->categoria == '6' ? 'suv' : '' ?> >SUV</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">       
                    <option value="" disabled selected>Selecione uma opção</option>
                        
                    <option value="disponivel" <?= $obCarro->estado == 'disponivel' ? 'selected' : '' ?> >Disponível</option>
                    <option value="alugado"  <?= $obCarro->estado == 'alugado' ? 'selected' : '' ?> >Alugado</option>
                    <option value="manutencao" <?= $obCarro->estado == 'manutencao' ? 'selected' : '' ?> >Manuntenção</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>

        </form>

    </main>
</div>