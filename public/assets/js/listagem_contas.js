$(document).ready(function() {
    // var nf;        
    // var codEmp;    
    // var nomeEmp;   
    // var codLoja;   
    // var nomeLoja ; 
    // var status;    
    // var valor;     
    // var dataVen;   
    // var dataInicio;
    // var dataFim;   
    // var dataAtual ; 

    listar_contas();

    function listar_contas(
        nf = '', 
        codEmp = '', 
        nomeEmp = '', 
        codLoja = '', 
        nomeLoja = '',
        status = '',
        valor = '',
        dataVen = '',
        dataInicio = '',
        dataFim = '',
        dataAtual = ''
        ) {

        var dataTable = $('#tabela_contas').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],
            // "sPaginationType": "full_numbers",
            "ajax": {
                url: "listagem_contas.php",
                type: "POST",
                data: {
                    nf: nf,
                    codEmp: codEmp,
                    nomeEmp: nomeEmp,
                    codLoja: codLoja,
                    nomeLoja: nomeLoja,
                    status:status,
                    valor:valor,
                    dataVen:dataVen,
                    dataInicio:dataInicio,
                    dataFim:dataFim,
                    data:dataAtual,
                    total:"nao"
                },

            },
            "columnDefs": [{
                "target": [0, 3, 4],
                "orderable": false,
            }, ],

            "footerCallback": function(recordsFiltered, data, start, end, display) {
                var api = this.api(),
                dataTable;

                // Update footer
                $(api.column(1).footer()).html(

                    $.ajax({
                        url: 'listagem_contas.php',
                        type: 'POST',
                        data: {
                            nf: nf,
                            codEmp: codEmp,
                            nomeEmp: nomeEmp,
                            codLoja: codLoja,
                            nomeLoja: nomeLoja,
                            status:status,
                            valor:valor,
                            dataVen:dataVen,
                            dataInicio:dataInicio,
                            dataFim:dataFim,
                            data:dataAtual,
                            total:"sim"
                        },
                        success: function(data) {
                            $('#total').html("Total: R$ " + data);

                        }
                    })

                );
            },
            "oLanguage": {
                "sProcessing": "Procesando...",
                "sLengthMenu": 'Mostrar <select>' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select> Registros',
                "sZeroRecords": "Nenhum Resultado Encontrado",
                "sEmptyTable": "Nenhum Dado Disponivel Nesta Tabela",
                "sInfo": "Mostrando página _PAGE_ de _PAGES_",
                "sInfoEmpty": "Nenhum registro disponível",
                "sInfoFiltered": "(Filtrado de _MAX_ Total de registros)",
                "sInfoPostFix": "",
                "sSearch": "Pesquisar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Por Favor Espere - Carregando...",
                "oPaginate": {
                    // "sFirst":    "Primeiro",            // "sLast":     "Último",
                    "sNext": "Proximo",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
        });
        
    }

    // Executa quando preciona a tecla enter
    $('#txtContasEmpresa').keypress(function(e){

        if (e.which == 13) {
             alert("teste"); 
        }

    });

    $('#pesquisarContaAjax').click(function() {

        nf = $('#txtContasNf').val();       
        codEmp = $('#txtContasEmpresa').val();   
        nomeEmp = $('#txtContasNomeEmpresa').val();  
        codLoja = $('#txtContasLoja').val();  
        nomeLoja = $('#txtContasNomeLoja').val(); 
        status = $('#txtContasStatus').val();   
        valor = $('#txtContasValor').val();    
        dataVen = $('#txtContasDataVen').val();  
        dataInicio= $('#txtContasDataInicio').val();
        dataFim = $('#txtContasDataFim').val();  
        dataAtual  = $('#txtContasData').val();  

        $('#tabela_contas').DataTable().destroy();
        listar_contas(nf,codEmp,nomeEmp,codLoja,nomeLoja,status,valor,dataVen,dataInicio,dataFim,dataAtual);

    });

    $('#limparContas').click(function() {

        $('#elert_erro').addClass("elert_erro");
        $('#elert_sucesso').addClass("elert_sucesso");
        // $('#txtContasLoja').('deselectAll');
        // $('#txtContasLoja').reset();
        $('.select2').val(null).trigger('change');
        $('#tabela_contas').DataTable().destroy();
        listar_contas();

    });

    $('#enviarContas').on('submit', function(e) {
        // if the validator does not prevent form submits
        if (!e.isDefaultPrevented()) {

            var num_conta = $('#txtContasNf').val();

            $.ajax({
                url: '../controller/controller_contas.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(data) {
                    // alert(data);
                    var retorno = data;
                    // info_ajax = data;
                    //$('#resultado').html(data);
                    // alert(info_ajax);
                    // var teste = "($('#txtChave').val())";
                    // alert(retorno);

                    if (retorno == "1") {
                        $('#elert_sucesso').removeClass("elert_sucesso");
                        $('#elert_erro').addClass("elert_erro");
                        $('#num_contas').empty();
                        $('#num_contas').append("Conta : NF :" + num_conta + " Inserido com Sucesso.");
                    } else {
                        $('#elert_erro').removeClass("elert_erro");
                        $('#elert_sucesso').addClass("elert_sucesso");
                        $('#num_contas_e').empty();
                        $('#num_contas_e').append(num_conta + retorno);
                    }

                    if (retorno == "cadastrado") {
                        $('#elert_erro').removeClass("elert_erro");
                        $('#elert_sucesso').addClass("elert_sucesso");
                        $('#num_contas_e').empty();
                        $('#num_contas_e').append(num_conta + "<br> CONTA JÁ CADASTRADA!!!!!!!");

                    }

                    if (retorno == "alterado") {
                        $('#elert_sucesso').removeClass("elert_sucesso");
                        $('#elert_erro').addClass("elert_erro");
                        $('#num_contas').empty();
                        $('#num_contas').append("USUÁRIO DA CONTA " + num_conta + " ALTERADO!!");

                    }
                    $('#tabela_contas').DataTable().destroy();
                    listar_contas();
                    // Resetar o formulário
                    $('#enviarContas')[0].reset();
                    $('.select2').val(null).trigger('change');

                    //      $('#tabela_usuario').DataTable( {
                    //    "ajax": {
                    //         "url": "../admin/list/listagem_usuario.php",
                    //           "type": "POST"
                    //     },    
                    // )};  
                }
            });
            return false;
        }

    });





});