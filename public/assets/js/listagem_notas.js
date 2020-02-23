$(document).ready(function() {
    var chave;
    var numero;
    var nome;
    var cnpj;
    var data;
    var footerTeste;



    listar_notas();

    function listar_notas(chave = '', numero = '', nome = '', cnpj = '', data = '') {



        var dataTable = $('#tabela_nota').DataTable({



            "processing": true,
            "serverSide": true,
            "order": [],
            // "sPaginationType": "full_numbers",
            "ajax": {
                url: "listagem_notas.php",
                type: "POST",
                data: {
                    chave: chave,
                    numero: numero,
                    nome: nome,
                    cnpj: cnpj,
                    data: data


                },


            },
            "columnDefs": [{
                "target": [0, 3, 4],
                "orderable": false,
            }, ],

            
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

            //alert()
        });
        var data = dataTable.data().toArray();


        // alert(data);


    }

    $('#pesquisarAjax').click(function() {
        chave = $('#txtChave').val();
        numero = $('#txtNumero').val();
        nome = $('#txtNomeF').val();
        cnpj = $('#txtCnpj').val();
        data = $('#txtData').val();

        $('#tabela_nota').DataTable().destroy();
        listar_notas(chave, numero, nome, cnpj, data);

        // dataTable.ajax.reload();


    });

    $('#limpar').click(function() {
        $('#elert_erro').addClass("elert_erro");
        $('#elert_sucesso').addClass("elert_sucesso");

        $('#tabela_nota').DataTable().destroy();
        listar_notas();
    });


    $('#enviarNota').on('submit', function(e) {
        // if the validator does not prevent form submits
        if (!e.isDefaultPrevented()) {

            var num_nota = $('#txtNumero').val();

            $.ajax({
                url: '../controller/controller_nota.php',
                type: 'POST',
                data: 'txtChave=' + $('#txtChave').val() + '&txtNumero=' + $('#txtNumero').val() + '&txtCnpj=' + $('#txtCnpj').val() + '&txtNomeF=' + $('#txtNomeF').val() + '&txtValor=' + $('#txtValor').val() + '&cadastrar=' + $('cadastrar').val,
                success: function(data) {
                    var retorno = data;
                    // info_ajax = data;
                    //$('#resultado').html(data);
                    // alert(info_ajax);
                    // var teste = "($('#txtChave').val())";
                    // alert(retorno);



                    if (retorno == "1") {
                        $('#elert_sucesso').removeClass("elert_sucesso");
                        $('#elert_erro').addClass("elert_erro");
                        $('#num_nota').empty();
                        $('#num_nota').append("Nota de Número: " + num_nota + " Inserido com Sucesso.");
                    } else {
                        $('#elert_erro').removeClass("elert_erro");
                        $('#elert_sucesso').addClass("elert_sucesso");
                        $('#num_nota_e').empty();
                        $('#num_nota_e').append(num_nota + retorno);
                    }

                    if (retorno == "cadastrado") {
                        $('#elert_erro').removeClass("elert_erro");
                        $('#elert_sucesso').addClass("elert_sucesso");
                        $('#num_nota_e').empty();
                        $('#num_nota_e').append(num_nota + "<br> NOTA JÁ CADASTRADA!!!!!!!");

                    }

                    if (retorno == "alterado") {
                        $('#elert_sucesso').removeClass("elert_sucesso");
                        $('#elert_erro').addClass("elert_erro");
                        $('#num_nota').empty();
                        $('#num_nota').append("USUÁRIO DA NOTA " + num_nota + " ALTERADO!!");
                         $('#enviarNota')[0].reset();

                    }

                   $('#tabela_nota').DataTable().destroy();
                    listar_notas();
                    $('#enviarNota')[0].reset();

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