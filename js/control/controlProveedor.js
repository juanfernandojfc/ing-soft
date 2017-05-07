/**
 * Created by Carlos Mario on 23/11/2016.
 */

function estadoProv(id,estado) {
    swal({
            title: "¿Desea cambiar de estado al proveedor?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#4cd964",
            cancelButtonText: "No",
            confirmButtonText: "Sí, deseo cambiarlo",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                url:"/stadeProveedor",
                type:"POST",
                data:{'identificador': id,'estado': estado},
                cache:"false",
                success:function (data) {

                    if(data=="1"){
                        swal("¡HECHO!","Cambio de estado exitoso","success");
                        $("#secTableProv").empty();
                        cargarTablaProv();
                    }else{
                        swal("ERROR","El proveedor no cambió de estado","error");
                    }

                }
            });
        });

}

function cargarTablaProv(){

    $.ajax({
        url: "/dataProveedor",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data == "") {

            } else {

                var stade;
                var table='<table class="table table-advance table-hover" id="id-tableProv">'+
                    '<thead>'+
                    '<tr>'+
                    '<th><i class="icon_archive"></i> Estado</th>'+
                    '<th><i class="icon_id-2"></i> NIT</th>'+
                    '<th><i class="icon_profile"></i> Nombre</th>'+
                    '<th><i class="icon_pin_alt"></i> Dirección</th>'+
                    '<th><i class="icon_phone"></i> Teléfono</th>'+
                    '<th><i class="icon_cogs"></i> Acciones</th>'+
                    '</tr>'+
                    '</thead>'+
                    '<tbody id="tableProveedor">';


                data = JSON.parse(data);
                $.each(data, function (index, item) {

                    if(item[5] == "ACTIVO"){
                        stade = "btn btn-success";
                    }else{
                        stade = "btn btn-warning";
                    }

                    table += '<tr id="row' + item[0] + '">' +
                        '<td>'+
                        '<a id="' + item[0] + '" class="'+ stade +'" onclick=estadoProv('+item[0]+',"'+ item[5] +'")>'+ item[5] +'</a>'+
                        '</td>' +
                        '<td>'+ item[1] +'</td>' +
                        '<td>'+ item[2] +'</td>' +
                        '<td>'+ item[3] +'</td>' +
                        '<td>'+ item[4] +'</td>' +
                        '<td>'+ '<div>'+
                        '<a class="btn btn-primary" onclick="activateModProv('+item[0]+')"><i class="icon_pencil-edit_alt"></i></a>'+
                        '</div>' + '</td>' +
                        '</tr>';
                });
                table+= '</tbody>'+
                    '</table>';
                $("#secTableProv").append(table);
            }
            $("#id-tableProv").DataTable({
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

function activateModProv(id) {

    var fila = "#row" + id;
    data = $(fila).children('td');
    var obj = [];
    data.each(function () {
        obj.push($(this).text());
    });

    $("#updateProv").modal();
    $("#idPro-mod").val(id);
    $("#nitPro-mod").val(obj[1]);
    $("#nombrePro-mod").val(obj[2]);
    $("#direccionPro-mod").val(obj[3]);
    $("#telefonoPro-mod").val(obj[4]);
}

function modificarProv() {

    var idPro = $("#idPro-mod").val();
    var nitPro = $("#nitPro-mod").val();
    var nombrePro = $("#nombrePro-mod").val();
    var direccionPro =$("#direccionPro-mod").val();
    var telefonoPro =$("#telefonoPro-mod").val();

    if($.trim(direccionPro).length > 0 && $.trim(nombrePro).length > 0 && $.trim(telefonoPro).length > 0 && $.trim(nitPro).length > 0){

                $.ajax({
                    url:"/updateProveedor",
                    type:"POST",
                    data:{'id': idPro, 'nit': nitPro, 'nombre': nombrePro, 'direccion': direccionPro, 'telefono': telefonoPro},
                    cache:"false",
                    success:function (data) {

                        if(data=="1"){
                            $("#updateProv").modal('toggle');
                            swal("¡HECHO!","Proveedor actualizado con exito","success");
                            $("#secTableProv").empty();
                            cargarTablaDep();
                        }else{
                            swal("ERROR","El proveedor no se modificó","error");
                        }

                    }
                });
    }else{
        swal("ERROR","Llene los campos","error");
    }

    /*
    var idDep = $("#idDep-mod").val();
    var nombreDep = $("#nombreDep-mod").val();
    var direccionDep =$("#direccionDep-mod").val();
    var telefonoDep =$("#telefonoDep-mod").val();


    if($.trim(direccionDep).length > 0 && $.trim(nombreDep).length > 0 && $.trim(telefonoDep).length > 0){
        swal({
                title: "¿Desea modificar la dependencia " + nombreDep + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#58FA58",
                cancelButtonText: "No",
                confirmButtonText: "Sí, deseo modificarla",
                closeOnConfirm: false
            },
            function(){
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
            });
    }else{
        swal("ERROR","Llene los campos","error");
    }
    */
}

$(function () {
    cargarTablaProv();
});