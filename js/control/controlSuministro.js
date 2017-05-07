/**
 * Created by Carlos Mario on 23/11/2016.
 */

function cargarTablaSum(){

    $.ajax({
        url: "/dataSuministro",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data != "") {

                var table = '<table class="table table-advance table-hover" id="id-tableSum">'+
                    '<thead>'+
                    '<tr>'+
                    '<th><i class="icon_id-2"></i> Referencia</th>'+
                    '<th><i class="icon_folder"></i> Nombre</th>'+
                    '<th><i class="icon_datareport"></i> Stock</th>'+
                    '<th><i class="icon_ribbon"></i> Tipo</th>'+
                    '<th><i class="icon_cogs"></i> Acciones</th>'+
                    '</tr>'+
                    '</thead>'+
                    '<tbody id="tableSum">';

                data = JSON.parse(data);
                $.each(data, function (index, item) {
                    table +='<tr>' +
                        '<td>'+ item[1] +'</td>' +
                        '<td>'+ item[2] +'</td>' +
                        '<td>'+ item[3] +'</td>' +
                        '<td>'+ item[4] +'</td>' +
                        '<td>'+ '<div>'+
                        '<a id="' + item[0] + '" class="btn btn-primary" href="#"><i class="icon_pencil-edit_alt"></i></a>'+
                        '<a id="' + item[0] + '" class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>'+
                        '</div>' + '</td>' +
                        '</tr>';
                });

                table+= '</tbody>'+
                    '</table>';
                $("#secTableSum").append(table);
            }
            $("#id-tableSum").DataTable({
                "language": {
                    "search": "<span>Filtrar:</span>",
                    "paginate": {'first': 'Primero', 'last': 'Ultimo', 'next': 'Siguiente', 'previous': 'Anterior'},
                    "lengthMenu": "Mostrando  _MENU_  Registros",
                    "zeroRecords": "No hay Informacion disponible",
                    "info": "Mostrando _PAGE_ de _PAGES_",
                    "infoEmpty": "No se encontraron datos",
                    "infoFiltered": "(Filtrado de un total de _MAX_ registros)"
                }
            });
        }
    });

}

$(function () {
    cargarTablaSum();
});