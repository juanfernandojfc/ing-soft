/**
 * Created by Carlos Mario on 22/11/2016.
 */

$("#btnAgg-dep").click(function () {

    var nombreDep = $("#nombreDep").val();
    var direccionDep =$("#direccionDep").val();
    var telefonoDep =$("#telefonoDep").val();

    if($.trim(direccionDep).length > 0 && $.trim(nombreDep).length > 0 && $.trim(telefonoDep).length > 0){
        swal({
                title: "¿Desea guardar la dependencia " + nombreDep + "?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4cd964",
                cancelButtonText: "No",
                confirmButtonText: "Sí, deseo guardarla",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url:"/addDependencia",
                    type:"POST",
                    data:{'nombre': nombreDep, 'direccion': direccionDep, 'telefono': telefonoDep},
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

$("#btnLimp-dep").click(function () {
    $("#nombreDep").val("");
    $("#direccionDep").val("");
    $("#telefonoDep").val("");
});
