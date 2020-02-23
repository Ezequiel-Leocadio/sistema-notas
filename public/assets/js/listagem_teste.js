  $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example thead td').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control input-md" placeholder="Pesquisar por '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();

 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

} );
