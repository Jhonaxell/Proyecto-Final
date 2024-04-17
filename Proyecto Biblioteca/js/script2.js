$(document).ready(function(){
    $('.show-author-info').click(function(){
        var telefono = $(this).data('telefono');
        var direccion = $(this).data('direccion');
        var ciudad = $(this).data('ciudad');
        var estado = $(this).data('estado');
        var pais = $(this).data('pais');
        
        $('#telefono').text(telefono);
        $('#direccion').text(direccion);
        $('#ciudad').text(ciudad);
        $('#estado').text(estado);
        $('#pais').text(pais);
    });
});