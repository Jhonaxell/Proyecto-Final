$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botón que activó el modal
    var tipo = button.data('tipo'); // Extraer información de los atributos de datos
    var avance = button.data('avance');
    var precio = button.data('precio');
    var modal = $(this);
    modal.find('#tipo').text(tipo); // Actualizar el contenido del modal con la información extraída
    modal.find('#avance').text(avance);
    modal.find('#precio').text(precio);
})



let year = document.querySelector("#year");

$(document).ready(function () {
year.innerText = new Date().getFullYear();
});



