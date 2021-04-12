<script>
jQuery(document).ready(function() {
    var table = jQuery('#daftarPesananTable').DataTable( {
        lengthChange: false,
        buttons: [ 'excel', 'print' ]
    } );
 
    table.buttons().container()
        .appendTo( '#daftarPesananTable_wrapper .col-md-6:eq(0)' );
} );
</script>