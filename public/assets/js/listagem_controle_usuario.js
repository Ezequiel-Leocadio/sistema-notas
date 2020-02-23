$(document).ready(function() {			   
	$('#tabela_controle_usuario').DataTable( {	
		"bDeferRender": true,			
		"sPaginationType": "full_numbers",
			"ajax":{
            url:"listagem_controle_usuario.php",
            method:"POST",
        },
        "columnDefs":[{
            "target":[0,3,4],
            "orderable":false,
        },
        ],	
		"oLanguage": {
            "sProcessing":     "Procesando...",
		    "sLengthMenu": 'Mostrar <select>'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">All</option>'+
		        '</select> Registros',    
		    "sZeroRecords":    "Nenhum Resultado Encontrado",
		    "sEmptyTable":     "Nenhum Dado Disponivel Nesta Tabela",
		    "sInfo":           "Mostrando página _PAGE_ de _PAGES_",
		    "sInfoEmpty":      "Nenhum registro disponível",
		    "sInfoFiltered":   "(Filtrado de _MAX_ Total de registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Pesquisar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Por Favor Espere - Carregando...",
		    "oPaginate": {
		        "sFirst":    "Primeiro",
		        "sLast":     "Último",
		        "sNext":     "Proximo",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
        }
	});



    
});