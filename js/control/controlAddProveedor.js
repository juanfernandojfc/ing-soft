/**
 * Created by Carlos Mario on 22/11/2016.
 */

$("#btnAgg-pro").click(function () {

    var nitPro = $("#nitPro").val();
    var nombrePro = $("#nombrePro").val();
    var direccionPro =$("#direccionPro").val();
    var telefonoPro =$("#telefonoPro").val();

    if($.trim(direccionPro).length > 0 && $.trim(nombrePro).length > 0 && $.trim(telefonoPro).length > 0 && $.trim(nitPro).length > 0){
        swal({
                title: "¿Desea guardar como proveedor a " + nombrePro + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4cd964",
                cancelButtonText: "No",
                confirmButtonText: "Sí, deseo guardarlo",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url:"/addProveedor",
                    type:"POST",
                    data:{'nit': nitPro, 'nombre': nombrePro, 'direccion': direccionPro, 'telefono': telefonoPro},
                    cache:"false",
                    success:function (data) {

                        if(data=="1"){
                            swal("GUARDADO!","Dependencia guardada con exito","success");
                        }else{
                            swal("ERROR","La dependencia no se guardó","error");
                        }

                    }
                });
            });
    }else{
        swal("ERROR","Llene los campos","error");
    }
});

$("#btnLimp-pro").click(function () {
    $("#nitPro").val("");
    $("#nombrepro").val("");
    $("#direccionPro").val("");
    $("#telefonopro").val("");
});