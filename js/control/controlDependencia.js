/**
 * Created by Carlos Mario on 23/11/2016.
 */


function estadoDep(id,estado) {
    swal({
            title: "¿Desea cambiar de estado a la dependencia?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#4cd964",
            cancelButtonText: "No",
            confirmButtonText: "Sí, deseo cambiarlo",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                url:"/stadeDependencia",
                type:"POST",
                data:{'identificador': id,'estado': estado},
                cache:"false",
                success:function (data) {

                    if(data=="1"){
                        swal("¡HECHO!","Cambio de estado exitoso","success");
                        $("#secTableDepen").empty();
                        cargarTablaDep();
                    }else{
                        swal("ERROR","La dependencia no cambió de estado","error");
                    }

                }
            });
        });

}

function cargarTablaDep(){

    $.ajax({
        url: "/dataDependencia",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data != "") {

                var stade;
                var asig;
                var table= '<table class="table table-advance table-hover" id="id-tableDependencia">'+
                    '<thead>'+
                    '<tr>'+
                    '<th><i class="icon_archive"></i> Estado</th>'+
                    '<th><i class="icon_archive"></i> Nombre</th>'+
                    '<th><i class="icon_pin_alt"></i> Dirección</th>'+
                    '<th><i class="icon_phone"></i> Teléfono</th>'+
                    '<th><i class="icon_box-checked"></i> Asignada</th>'+
                    '<th><i class="icon_cogs"></i> Acciones</th>'+
                    '</tr>'+
                    '</thead>'+
                    '<tbody id="tableDependencia">';

                data = JSON.parse(data);
                $.each(data, function (index, item) {

                    if(item[5] == "ACTIVO"){
                        stade = "btn btn-success";
                    }else{
                        stade = "btn btn-warning";
                    }

                    if(item[1] == null){
                        asig = 'NO';
                    }else{
                        asig = 'SI';
                    }

                    table += '<tr id="row' + item[0] + '">' +
                        '<td>'+
                        '<a id="' + item[0] + '" class="'+ stade +'" onclick=estadoDep('+item[0]+',"'+ item[5] +'")>'+ item[5] +'</a>'+
                        '</td>' +
                        '<td>'+ item[2] +'</td>' +
                        '<td>'+ item[3] +'</td>' +
                        '<td>'+ item[4] +'</td>' +
                        '<td>'+ asig +'</td>' +
                        '<td>'+ '<div>'+
                        '<a class="btn btn-primary" onclick="activateModDep('+item[0]+')"><i class="icon_pencil-edit_alt"></i></a>'+
                        '</div>' + '</td>' +
                        '</tr>';
                });

                table+= '</tbody>'+
                    '</table>';
                $("#secTableDepen").append(table);
            }
            $("#id-tableDependencia").DataTable({
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

function activateModDep(id) {
    var fila = "#row" + id;
    data = $(fila).children('td');
    var obj = [];
    data.each(function () {
        obj.push($(this).text());
    });

    $("#updateDep").modal();
    $("#idDep-mod").val(id);
    $("#nombreDep-mod").val(obj[1]);
    $("#direccionDep-mod").val(obj[2]);
    $("#telefonoDep-mod").val(obj[3]);
}

function modificarDep() {

    var idDep = $("#idDep-mod").val();
    var nombreDep = $("#nombreDep-mod").val();
    var direccionDep =$("#direccionDep-mod").val();
    var telefonoDep =$("#telefonoDep-mod").val();


    if($.trim(direccionDep).length > 0 && $.trim(nombreDep).length > 0 && $.trim(telefonoDep).length > 0){
        $.ajax({
            url:"/updateDependencia",
            type:"POST",
            data:{'id': idDep, 'nombre': nombreDep, 'direccion': direccionDep, 'telefono': telefonoDep},
            cache:"false",
            success:function (data) {

                if(data=="1"){
                    $("#updateDep").modal('toggle');
                    swal("¡HECHO!","Dependencia se actualizada con exito","success");
                    $("#secTableDepen").empty();
                    cargarTablaDep();
                }else{
                    swal("ERROR",data,"error");
                }

            }
        });
    }else{
        swal("ERROR","Llene los campos","error");
    }
}

$(function () {
    cargarTablaDep();
});