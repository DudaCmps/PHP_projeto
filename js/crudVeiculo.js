$(document).ready(function() {
  
  const divCarro = document.getElementById("listaCarros");
  if (divCarro) {
    carregarVeiculos();
  }
});

function carregarVeiculos() {
    $.ajax({
      url: '../admin/listagemVeiculosAjax.php',
      type: 'GET',
      dataType: 'json',
      success: function(veiculos) {
        let html = '';
  
        if (veiculos.length === 0) {
          html = '<tr><td colspan="7" class="text-center">Sem registros</td></tr>';
        } else {
          veiculos.forEach(carro => {

              const ativoCarro = carro.ativo == 1
                ? '<span class="status status-success">Sim</span>'
                : '<span class="status status-warning">Não</span>';

              const categoria = carro.categoria == 'luxo'
              ? 'Luxo'
              : carro.categoria == 'economico'
                ? 'Econômico'
                : 'SUV';

                const statusCarro = carro.status == 'alugado'
                ? 'Alugado'
                : carro.status == 'manutencao'
                  ? 'Manutenção'
                  : 'Disponível';
  
              const botaoAtivo = carro.ativo == 1
                ? `<button onclick="inativarAtivarCarro(${carro.id_carro})"  type="button" class="btn btn-sm me-1 btn-warning" data-coreui-toggle="tooltip" title="Inativar">
                        <i class="fa-solid fa-ban"></i>
                  </button>`
                : `<button onclick="inativarAtivarCarro(${carro.id_carro})" type="button" class="btn btn-sm me-1 btn-success" data-coreui-toggle="tooltip" title="Ativar">
                        <i class="cil-check-circle"></i>
                    </button>`;
              
              const botaoEditar = carro.ativo == 1
              ? `<button onclick="editarVeiculo(${carro.id_carro})"  type="button" class="btn btn-sm me-1 btn-primary" title="Editar">
                            <i class="fa-regular fa-pen-to-square" style="color: black;"></i>
                  </button>`
              : `<button type="button" class="btn btn-sm btn-primary me-1 disabled" data-coreui-toggle="tooltip" data-coreui-placement="top" title="Editar">
                  <i class="fa-regular fa-pen-to-square" style="color: black;"></i>
              </button>`;

              const botaoManutencao = carro.ativo == 1
              ? `<button onclick="manutencaoVeiculo(${carro.id_carro})" type="button" class="btn btn-sm btn-secondary me-1" title="Manutenção">
                                <i class="cil-settings" style="color: black;font-size:16px;"></i>
                  </button>`
              : `<button type="button" class="btn btn-sm btn-secondary me-1 disabled" title="Manutenção">
                      <i class="cil-settings" style="color: black;font-size:16px;"></i>
                  </button>`;
        
              html += `
                <tr>
                  <td>${carro.id_carro}</td>
                  <td class="text-center">${carro.nome_modelos}  ${carro.nomeMarca}</td>
                  <td class="text-center">${carro.ano_fabricacao}</td>
                  <td class="text-center">${carro.placa}</td>
                  <td class="text-center">${categoria}</td>
                  <td class="text-center">${statusCarro}</td>
                  <td class="text-center">${ativoCarro}</td>
                  <td class="text-center">
                    ${botaoEditar}
                    ${botaoManutencao}
                    ${botaoAtivo}
                    <button onclick="deleteVeiculo(${carro.id_carro})" type="button" class="btn btn-sm me-1 btn-danger" title="Excluir">
                        <i class="cil-trash"></i>
                    </button>
                  </td>
                </tr>`;
          });
        }
        
        $('#listaCarros').html(html);
      },
      error: function() {
        $('#listaCarros').html('<tr><td colspan="7" class="text-center text-danger">Erro ao carregar veículos.</td></tr>');
      }
    });
}

function cadastrarVeiculo() {
    var modelo = $("#modelo").val();
    var placa = $("#placa").val();
    var ano_fabricacao = $("#ano_fabricacao").val();
    var categoria = $("#categoria").val();

    if (!validateCadastro(modelo,  placa, ano_fabricacao, categoria)) {
        return false;
    }

    $.ajax({
        method: "post",
        url: "../veiculos/cadastrarVeiculo.php",
        data: {modelo:modelo,placa:placa, ano_fabricacao:ano_fabricacao, categoria:categoria},
        dataType: "json",
        success: function (response) {

            if (response.status == 'success') {
                alert('Cadastrado com sucesso.');
                $('#carroNovoModal').modal('hide');
                $('#modelo, #placa, #ano_fabricacao, #categoria').val('');
                carregarVeiculos();
                
            }else {
                alert(response.message || 'Erro no cadastro.');
            }
        },
        error: function () {
          alert('Erro na comunicação com o servidor.');
        }
    });
}

function validateCadastro(modelo,placa, ano_fabricacao, categoria) {
    
    let valid = true;

    if(modelo == null){
        $("#modeloError").html("Selecione um modelo");
        valid = false;
    }

    if (placa == "") {
        $("#placaError").html("Digite a placa corretamente");
        valid = false;
    }

    if(ano_fabricacao == ""){
        $("#anoError").html("Digite o ano corretamente");
        valid = false;
    }

    if (categoria == null) {
        $("#categoriaError").html("Selecione uma categoria");
        valid = false;
    }

    return valid;
}
//-------------------------------------------------


//FUNÇÕES DE EDITAR VEICULO

function editarVeiculo(idCarro) {

  const modal = new coreui.Modal($('#carroEditar'));
  const conteudo = $('#conteudoEditarVeiculo');

  modal.show();

  $.ajax({
      url: "../veiculos/formularioEditarVeiculo.php",
      type: "get",
      data: { id_carro:idCarro },
      success: function (response) {
        conteudo.html(response);
      },
      error: function () {
        conteudo.html('<p>Erro ao carregar dados</p>');
      }
  });
    
}

function atualizarVeiculo() {
    const modal = $('#carroEditar');
    var id_carro = modal.find("#id_carro").val();
    var modelo = modal.find("#modelo").val();
    var placa = modal.find("#placa").val();
    var ano_fabricacao = modal.find("#ano_fabricacao").val();
    var categoria = modal.find("#categoria").val();

    $.ajax({
      method: "POST",
      url: "/locafast/Veiculos/atualizarVeiculo.php",
      data: {
        id_carro: id_carro,
        modelo: modelo,
        placa: placa,
        ano_fabricacao: ano_fabricacao,
        categoria: categoria
      },
      dataType: "json",
      success: function (response) {
        console.log(response.debug);
        alert(response.message || 'ALO');

        // Atualiza os campos no formulário/modal
        modal.find("#modelo").val(modelo);
        modal.find("#placa").val(placa);
        modal.find("#ano_fabricacao").val(ano_fabricacao);
        modal.find("#categoria").val(categoria);

        // Recarrega a listagem de veículos
        carregarVeiculos();
        
      },
      error: function (response) {
        alert(response.message || 'FODASE');
      }
    });
}

// FUNCÕES DE INATIVAR/ATIVAR VEICULO
function inativarAtivarCarro (idCarro) {

    $.ajax({
      method: "GET",
      url: "../veiculos/inativarVeiculo.php",
      data: { id_carro: idCarro },
      dataType: "json",
      success: function (response) {
          if (response.status === 'success') {
              carregarVeiculos();
          } else {
              alert(response.message || 'Erro.');
          }
      },
      error: function () {
          alert('SOCORRO');
      }
    });
}

// FUNÇÃO DE EXCLUIR
function deleteVeiculo(idCarro) {
  
  if(confirm("Tem certeza que deseja excluir?")){

    $.ajax({
      method: "GET",
      url: "../veiculos/excluirVeiculo.php",
      data: {id_carro:idCarro},
      dataType: "json",
      success: function (response) {
        if (response.status === 'success') {
          carregarVeiculos();
        } else {
          alert(response.message || 'Erro.');
        }
      },
      error: function () {
        alert('ERRO');
      }
    
    });
  }
  
}

//FUNÇÕES MANUTENÇÃO DE VEÍCULO

function manutencaoVeiculo (idCarro) {

  const modalManutencao = new coreui.Modal($('#manutencaoModal'));
  const conteudoManutencao = $('#conteudoManutencaoVeiculo');

  modalManutencao.show();

  $.ajax({
    url: "../manutencoes/formularioManutencao.php",
    type: "get",
    data: {id_carro: idCarro},
    success: function (response){
      conteudoManutencao.html(response);
    },
    error: function () {
      conteudoManutencao.html("<p>Erro ao carregar formulário</p>");
    }
  });
}

function agendaManutencao () {

  const modalManutencao = $('#manutencaoModal');
  var id_carro = $("#id_carro").val();
  var descricao = $("#descricao").val();
  var data_manutencao = $("#data_manutencao").val();

  if (!validateManutencao(descricao, data_manutencao)) {
      return false;
  }

  $.ajax({
    method: "POST",
    url: "/locafast/manutencoes/processaManutencao.php",
    data: {
      id_carro: id_carro,
      descricao: descricao,
      data_manutencao: data_manutencao
    },
    dataType: "json",
    success: function (response) {
      console.log(response.debug);
      alert(response.message || 'ALO');

      // Atualiza os campos no formulário/modal
      modalManutencao.find("#descricao").val(descricao);
      modalManutencao.find("#id_carro").val(id_carro);
      modalManutencao.find("#data_manutencao").val(data_manutencao);

      // Recarrega a listagem de veículos
      carregarVeiculos();
      
    },
    error: function (response) {
      alert(response.message || 'FODASE');
    }
  });

}

function validateManutencao(descricao, data_manutencao) {
    
  let valid = true;

  if(descricao == null){
      $("#descricaoError").html("Informe uma descrição breve");
      valid = false;
  }

  if (data_manutencao == "") {
      $("#data_manutencaoError").html("Informe a data corretamente");
      valid = false;
  }

  return valid;
}

// FUNÇÃO DE EXCLUIR
function deleteManutencao(idCarro) {
  
  if(confirm("Tem certeza que deseja excluir?")){

    $.ajax({
      method: "GET",
      url: "../manutencoes/excluirManutencao.php",
      data: {id_carro:idCarro},
      dataType: "json",
      success: function (response) {
        if (response.status === 'success') {
          carregarVeiculos();
        } else {
          alert(response.message || 'Erro.');
        }
      },
      error: function () {
        alert('ERRO');
      }
    
    });
  }
  
}