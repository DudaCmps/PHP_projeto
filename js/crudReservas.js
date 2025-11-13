const divReservas = document.getElementById("listaClienteReservas");

$(document).ready(function() {
  if (divReservas) {
    carregarReservasCliente();
  }
});

function carregarReservasCliente(){
    
    // var id_cliente = document.getElementById("idClienteReserva").value;

    $.ajax({
        url: '../clientes/listagemReservasAjax.php',
        type: 'GET',
        dataType: 'json',
        success: function(obReserva) {
          let html = '';
    
          if (obReserva.length === 0) {
            html = '<tr><td colspan="7" class="text-center">Sem registros</td></tr>';
          } else {
            obReserva.forEach(reserva => {
                
                let botaoStatus = '';
                let botaoAluguel = '';
                let botaoCancelar = '';
                let status = '';

                switch (reserva.status){
                    case 'confirmada':
                        // exemplo: se tiver aluguel confirmado
                        if (aluguelConfirmado === true) {
                            botaoStatus = '<span class="status status-warning">Finalize o aluguel ativo antes de iniciar outro.</span>';
                        } else {
                            botaoAluguel = `<button type="button" class="btn btn-sm me-1 btn-primary" title="Iniciar aluguel"><i class="cil-calendar-check"></i></button>`;
                            botaoCancelar = `<button type="button" class="btn btn-sm btn-danger" title="Cancelar"><i class="cil-trash"></i></button>`;
                        }
                        status = `<span class="status status-success">${reserva.status}</span>`;
                        break;

                    case 'pendente':
                        botaoCancelar = `<button type="button" class="btn btn-sm btn-danger" title="Cancelar"><i class="cil-trash"></i></button>`;
                        botaoStatus = `<span class="status status-warning">Esta reserva está em análise.</span>`;
                        status = `<span class="status status-warning">${reserva.status}</span>`;
                        break;

                    default:
                        status = `<span class="status status-danger">${reserva.status}</span>`;
                        break;
                }

                html += `
                  <tr>
                    <td>${reserva.id_reserva}</td>
                    <td class="text-center">${reserva.nome}</td>
                    <td class="text-center">${reserva.placa}</td>
                    <td class="text-center">${status}</td>
                    <td class="text-center">
                     ${botaoStatus} ${botaoAluguel} ${botaoCancelar} 
                    </td>
                  </tr>`;
            });
          }
    
          $('#listaClienteReservas').html(html);
        },
        error: function() {
          $('#listaClienteReservas').html('<tr><td colspan="7" class="text-center text-danger">Erro ao carregar clientes.</td></tr>');
        }
      });
}
