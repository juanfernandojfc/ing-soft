/**
 * Created by Carlos Mario on 22/11/2016.
 */

function depen() {
    $.ajax({
        url: "/depDisponibles",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data == "") {
                $("#dependenciaEmp").append('<option disabled selected>No disponibles</option>');
            } else {
                data = JSON.parse(data);
                $("#dependenciaEmp").append('<option disabled selected>Escoja una opción</option>');
                $.each(data, function (index, item) {
                    $("#dependenciaEmp").append('<option id="' + item[0] + '">' + item[1] + '</option>');
                });
            }
        }
    });
}

function roles() {
    $.ajax({
        url: "/roles",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data == "") {
                $("#rolEmp").append('<option disabled selected>No disponibles</option>');
            } else {
                data = JSON.parse(data);
                $("#rolEmp").append('<option disabled selected>Escoja una opción</option>');
                $.each(data, function (index, item) {
                    $("#rolEmp").append('<option id="' + item[0] + '">' + item[1] + '</option>');
                });
            }
        }
    });
}

$(function () {

    $("#dependenciaEmp").select2();

    $("#btnAgg-emp").click(function () {

        var cedulaEmp = $("#cedulaEmp").val();
        var nombreEmp = $("#nombreEmp").val();
        var apellidoEmp = $("#apellidoEmp").val();
        var emailEmp = $("#emailEmp").val();
        var telefonoEmp = $("#telefonoEmp").val();
        var usuarioEmp = $("#usuarioEmp").val();
        var contraEmp = $("#contraEmp").val();
        var dependenciaEmp = $('#dependenciaEmp option:selected').attr('id');
        var rolEmp = $('#rolEmp option:selected').attr('id');
        var sexoEmp = $('input[name=generoEmp]:checked').attr('value');

        if(rolEmp !== undefined && sexoEmp !== undefined && $.trim(cedulaEmp).length > 0
            && $.trim(nombreEmp).length > 0 && $.trim(apellidoEmp).length > 0 && $.trim(emailEmp).length > 0
            && $.trim(telefonoEmp).length > 0 && $.trim(usuarioEmp).length > 0 && $.trim(contraEmp).length > 0){

            if($.trim(cedulaEmp).length <= 11 && $.trim(cedulaEmp).length >= 7){

                if ((rolEmp =="1" && dependenciaEmp !== undefined) == true || (rolEmp =="2" || rolEmp =="3" || rolEmp =="4" && dependenciaEmp == undefined)==true){
                    swal({
                            title: "¿Desea registrar al usuario " + nombreEmp + "?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#4cd964",
                            cancelButtonText: "No",
                            confirmButtonText: "Sí, deseo registrarlo",
                            closeOnConfirm: false
                        },
                        function(){
                            $.ajax({
                                url:"/addEmpleado",
                                type:"POST",
                                data:{'nombre': nombreEmp, 'apellido': apellidoEmp, 'cedula': cedulaEmp, 'genero': sexoEmp,
                                    'correo': emailEmp, 'telefono': telefonoEmp, 'rol': rolEmp, 'usuario': usuarioEmp,
                                    'contraseña': contraEmp, 'dependencia': dependenciaEmp},
                                cache:"false",
                                success:function (data) {

                                    if(data=="1"){
                                        swal("GUARDADO!","Empleado registrado con exito","success");
                                    }else{
                                        swal("ERROR","No se pudo guardar el empleado","error");
                                    }
                                }
                            });
                        });
                }else{
                    swal("Error","No se ha vinculado a ninguna dependencia","error");
                }
            }else{
                swal("Error","Digite cedula valida","error");
            }
        }else{
            swal("Error","Llene el formulario en su totalidad","error");
        }
    });

    $("#btnLimp-emp").click(function () {
        $("#cedulaEmp").val("");
        $("#nombreEmp").val("");
        $("#apellidoEmp").val("");
        $("#emailEmp").val("");
        $("#telefonoemp").val("");
        $("#usuarioEmp").val("");
        $("#contraEmp").val("");
    });

    roles();
    depen();
});