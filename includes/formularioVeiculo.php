<div class="d-flex flex-column flex-grow-1">
            <div class="m-4">
              <div class="row">
                <div class="col-12">

                  <div class="card">
                    <div class="card-header">
                      <strong><?=TITLE?></strong>
                    </div>

                    <div class="card-body">

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
            </div>
    

            <div class="input-group mb-3">

                <label for="placa" class="input-group-text" id="basic-addon1">Placa</label>
                <input type="text"  name="placa" class="form-control me-3"style="border-radius: 0px 5px 5px 0px" value="<?=$obCarro->placa?>" maxlength="10">
                
                <label for="ano_fabricacao"class="input-group-text" id="basic-addon1" style="border-radius: 5px 0px 0px 5px">Ano de Fabricação</label>
                <input type="text" class="form-control" placeholder="YYYY" name="ano_fabricacao" value="<?=$obCarro->ano_fabricacao?>">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select">
                    <option value="" disabled selected>Selecione uma opção</option>
                    
                    <option value="luxo" <?= $obCarro->categoria == 'luxo' ? 'selected' : '' ?> >Luxo</option>
                    <option value="economico" <?= $obCarro->categoria == 'economico' ? 'selected' : '' ?> >Econômico</option>
                    <option value="suv" <?= $obCarro->categoria == 'suv' ? 'selected' : '' ?> >SUV</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary mb-3 mt-2">Enviar</button>

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