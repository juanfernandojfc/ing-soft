/**
 * Created by Carlos Mario on 23/11/2016.
 */

function estadoEmp(id,estado) {
    swal({
            title: "¿Desea cambiar de estado al usuario?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#4cd964",
            cancelButtonText: "No",
            confirmButtonText: "Sí, deseo cambiarlo",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                url:"/stadeEmpleado",
                type:"POST",
                data:{'id': id,'estado': estado},
                cache:"false",
                success:function (data) {

                    if(data=="1"){
                        swal("¡HECHO!","Cambio de estado exitoso","success");
                        $("#secTableEmp").empty();
                        cargarTablaEmp();
                    }else{
                        swal("ERROR",data,"error");
                    }

                }
            });
        });
}

function depenMod(idDepen,depen) {
    $.ajax({
        url: "/depDisponibles",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data == "") {
                $("#dependenciaEmp-mod").append('<option id="' + idDepen + '">' + depen + '</option>');
            } else {
                data = JSON.parse(data);
                $("#dependenciaEmp-mod").append('<option id="' + idDepen + '">' + depen + '</option>');
                $.each(data, function (index, item) {
                    $("#dependenciaEmp-mod").append('<option id="' + item[0] + '">' + item[1] + '</option>');
                });
            }
        }
    });
}

function cargarTablaEmp(){

    $.ajax({
        url: "/dataEmpleado",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data == "") {

            } else {

                var stade;
                var table = '<table class="table table-advance table-hover" id="id-tableEmp">'+
                    '<thead>'+
                    '<tr>'+
                    '<th><i class="icon_archive"></i> Estado</th>'+
                    '<th><i class="icon_id-2"></i> Cédula</th>'+
                    '<th><i class="icon_profile"></i> Nombre completo</th>'+
                    '<th><i class="icon_mail_alt"></i> Correo</th>'+
                    '<th><i class="icon_cogs"></i> Acciones</th>'+
                    '</tr>'+
                    '</thead>'+
                    '<tbody id="tableEmpleado">';


                data = JSON.parse(data);
                $.each(data, function (index, item) {

                    if(item[6] == "ACTIVO"){
                        stade = "btn btn-success";
                    }else{
                        stade = "btn btn-warning";
                    }


                    table += '<tr id="row' + item[0] + '">' +
                        '<td>'+
                        '<a id="' + item[0] + '" class="'+ stade +'" onclick=estadoEmp('+item[1]+',"'+ item[6] +'")>'+ item[6] +'</a>'+
                        '</td>' +
                        '<td>'+ item[2] +'</td>' +
                        '<td>'+ item[3] +' '+ item[4] + '</td>' +
                        '<td>'+ item[5] +'</td>' +
                        '<td>'+ '<div>'+
                        '<a class="btn btn-primary" onclick="activateModEmp('+item[0]+')"><i class="icon_pencil-edit_alt"></i></a>'+
                        '</div>' + '</td>' +
                        '</tr>';
                });
                table+= '</tbody>'+
                    '</table>';
                $("#secTableEmp").append(table);
            }
            $("#id-tableEmp").DataTable({
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

function activateModEmp(id) {
    $("#updateEmp").modal();

    $.ajax({
        url: "/dataEmpleadoUser",
        type: "POST",
        data:{'id': id},
        cache: "false",
        success: function (data) {
            if (data == "") {
            } else {

                data = JSON.parse(data);


                $("#idEmp-mod").val(data[0][0]);
                $("#idUser-mod").val(data[0][1]);
                $("#cedulaEmp-mod").val(data[0][2]);
                $("#nombreEmp-mod").val(data[0][3]);
                $("#apellidoEmp-mod").val(data[0][4]);
                $("#emailEmp-mod").val(data[0][5]);
                $("#telefonoEmp-mod").val(data[0][6]);
                $("#usuarioEmp-mod").val(data[0][8]);
                $("#rolEmp-mod").append('<option disabled selected>'+ data[0][11] +'</option>');
                depenMod(data[0][12],data[0][13]);

            }
        }
    })
}

function modificarEmp() {
    var idEmp = $("#idEmp-mod").val();
    var idUser = $("#idUser-mod").val();
    var nombreEmp = $("#nombreEmp-mod").val();
    var apellidoEmp = $("#apellidoEmp-mod").val();
    var telefonoEmp = $("#telefonoEmp-mod").val();
    var contraEmp = $("#contraEmp-mod").val();
    var dependenciaEmp = $('#dependenciaEmp-mod option:selected').attr('id');

    if($.trim(nombreEmp).length > 0 && $.trim(apellidoEmp).length > 0 && $.trim(telefonoEmp).length > 0 && $.trim(contraEmp).length > 0){
        swal({
                title: "¿Desea modificar al usuario?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4cd964",
                cancelButtonText: "No",
                confirmButtonText: "Sí, deseo modificarlo",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url:"/updateEmpleado",
                    type:"POST",
                    data:{'idEmp': idEmp,'idUser': idUser,'nombre': nombreEmp,
                        'apellido': apellidoEmp, 'telefono': telefonoEmp,
                        'contraseña': contraEmp, 'dependencia': dependenciaEmp},
                    cache:"false",
                    success:function (data) {

                        if(data=="1"){
                            swal("GUARDADO!","Empleado actualizado con exito","success");
                            cargarTablaEmp();
                            $('#dependenciaEmp-mod').empty();
                            $('#rolEmp-mod').empty();
                        }else{
                            swal("ERROR","No se pudo actualizar al empleado","error");
                        }
                    }
                });
            });
    }else{
        swal("¡ERROR!","Llene los campos faltantes","error");
    }
}

$(function () {
    $("#dependenciaEmp-mod").select2();
    cargarTablaEmp();
    $("#cerrarModal").click(function () {
        $('#dependenciaEmp-mod').empty();
        $('#rolEmp-mod').empty();
    });
});