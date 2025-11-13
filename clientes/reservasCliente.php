<?php
include __DIR__.'/../includes/iniciaSessao.php';
include __DIR__.'/../public/header.php';
include __DIR__ . '/../config.php';
?>

<!-- <input id="idClienteReserva" type="hidden" value="<?=$_SESSION['id_user']?>"> -->

<div class="d-flex justify-content-center fundo"  style="min-height: 723px;">
<div style="width: 1300px;">
<div class="d-flex flex-column flex-grow-1">
<div class="m-4">
<div class="row">
<div class="col-12">
          
<div class="card">
<div class="card-header">
<strong>Minhas reservas</strong>
</div>

<div class="card-body">
<div class="example">
<div class="tab-content rounded-bottom">
<div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
    
            <table class="table table-striped border datatable dataTable table-hover">

            <thead>
                <th scope="col">#</th>
                <th scope="col" class="text-center">Nome do usuario</th>
                <th scope="col" class="text-center">Placa do Veículo</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center">Ações</th>

            </thead>

            <tbody id="listaClienteReservas">

            </tbody>

            </table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>       
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="../js/crudReservas.js"></script>
<!-- FECHAMENTO DA NAV -->
<?php 
include __DIR__.'/../public/footer.php';
?> 