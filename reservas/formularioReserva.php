<?php 
use \App\Entity\Usuario;
use App\Entity\Veiculo;

$usuarios = Usuario::getUsuarios();
$veiculos = Veiculo::getVeiculos();

$resultadosUsuario = '';
$resultadosCarro = '';

foreach ($usuarios as $usuario) {
    $resultadosUsuario .= '<option value="'.$usuario->id_user.'">'.$usuario->nome.'</option>';
}

foreach ($veiculos as $carro) {
    if ($carro->estado_carro != 'manutencao' && $carro->estado_carro != 'alugado') {
       $resultadosCarro .= '<option value="'.$carro->id_carro.'">'.$carro->nome.' - '.$carro->ano_fabricacao.' - '.$carro->placa.'</option>' ;
    }
}

?>
<!-- Conteúdo formulario-->
<div class="d-flex flex-column flex-grow-1">
            <div class="m-4">
              <div class="row">
                <div class="col-12">

                  <div class="card">
                    <div class="card-header">
                      <strong>Reserva</strong>
                    </div>

                    <div class="card-body">

    <form method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuarios</label>
                
                <select name="usuario" class="form-select">
                <option value="" disabled selected>Selecione um usuario</option>
                <?=$resultadosUsuario?>
                </select>
                <div id="emailHelp" class="form-text">Escolha o usuario que fará a reserva.</div>
            </div>

            <div class="mb-3">
                <label for="carro" class="form-label">Veículos</label>
                
                <select name="carro" class="form-select">
                <option value="" disabled selected>Selecione um carro</option>
                <?=$resultadosCarro?>
                </select>
                <div id="emailHelp" class="form-text">Escolha o carro para a reserva.</div>
            </div>

            <button type="submit" class="btn btn-outline-primary mb-3 mt-2">Reservar</button>

        </form>
        </div>

</div>
</div>
</div>
</div>
</div>

<!-- FECHAMENTO DA NAV -->
<?php 
include __DIR__.'/../includes/footer.php';
?>