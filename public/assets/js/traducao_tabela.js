//$('#nydata').dataTable();
      $(document).ready(function() {
    $('#nydata').DataTable( {
        "language": {
            "lengthMenu": "Exibição _MENU_ Registros por página",
            "zeroRecords": "Nada encontrado - desculpa",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ Total de registros)",
            "search":         "Pesquisar:",
            "paginate": {
              "first":      "Primeiro",
              "last":       "Último",
              "next":       "Próximo",
              "previous":   "Anterior"
             },
        }
    } );
} );