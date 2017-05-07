/**
 * Created by Carlos Mario on 1/12/2016.
 */

function cargarSuministrosSolicitud() {
    $.ajax({
        url: "/suministroSel",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data == "") {
                $("#nombreSum-sol").append('<option disabled>No hay suministros disponibles</option>');
            } else {
                data = JSON.parse(data);
                $.each(data, function (index, item) {
                    $("#nombreSum-sol").append('<option id="' + item[0] + '">' + item[1] + '</option>');
                });
            }
        }
    });
}

function borrarRegSol(id) {
    $("#row"+id).remove();
}

function detalleSol() {
    this.idSuministro;
    this.cantidad;
}


$(function () {
    cargarSuministrosSolicitud()

    $("#buscarSum-sol").click(function () {
        var id = $("#nombreSum-sol option:selected").attr('id');
        $.ajax({
            url: "/suministroRecord",
            type: "POST",
            data:{'id': id},
            cache: "false",
            success: function (data) {
                if (data == "") {

                } else {
                    data = JSON.parse(data);
                    $("#codigoSum-sol").val(data[0][0]);
                    $("#tipoSum-sol").val(data[0][1]);
                    $("#cantidadSum-sol").attr("max", parseInt(data[0][2]));
                }
            }
        })
    });

    $("#btnAgregarSol").click(function () {

        if($.trim($("#codigoSum-sol").val()).length>0 && $.trim($("#tipoSum-sol").val()).length>0 &&
            $.trim($("#cantidadSum-sol").val()).length>0){
            var val=true;
            $("#tablaSolicitud-reg tr").find('td:eq(0)').each(function () {
                if ($(this).html() == $("#codigoSum-sol").val()){
                    val = false;
                }
            });

            if (val){

                if ((parseInt($("#cantidadSum-sol").attr('max')) >= parseInt($("#cantidadSum-sol").val())) && parseInt($("#cantidadSum-sol").val()) > 0){
                    var id = $("#nombreSum-sol option:selected").attr('id');
                    var codigoSum = $("#codigoSum-sol").val();
                    var nombreSum = $("#nombreSum-sol").val();
                    var tipoSum = $("#tipoSum-sol").val();
                    var stockSum = $("#cantidadSum-sol").val();

                    var table = '<tr id="row'+ id +'">'+
                        '<td>' + codigoSum + '</td>'+
                        '<td>' + nombreSum + '</td>'+
                        '<td>' + tipoSum + '</td>'+
                        '<td>' + stockSum + '</td>'+
                        '<td>'+
                        '<a id="' + id + '" class="btn btn-danger" onclick="borrarRegSol('+ id +')"><i class="icon_close_alt2"></i></a>'+
                        '</td>' +
                        '</tr>';

                    $("#tableBody-Solicitud").append(table);
                }else{
                    swal("¡Error de cantidad!","No hay suficientes o no esta pidiendo nada","error");
                }

            }else{
                swal("¡Coincidencias!","Ya agrego este producto","error");
            }

        }else{
            swal("¡ERROR!","Llene los campos","error");
        }
    });
    
    $("#btnHacerSol").click(function () {
        if($("#textDescripcion").val() !== ""){
            if($.trim($("#tableBody-Solicitud").html()).length > 0){

                var descripcion = $("#textDescripcion").val();
                var tipo = "ENTREGA";

                data = $("#tablaSolicitud-reg tbody tr");
                var obj = [];
                data.each(function () {
                    detalle = new detalleSol();
                    detalle.idSuministro = $(this).attr("id");
                    detalle.idSuministro = detalle.idSuministro.replace("row","0");
                    $(this).children("td").each(function (index2)
                    {
                        switch (index2)
                        {
                            case 3: detalle.cantidad = $(this).text();
                                    break;
                        }
                    })
                    obj.push(detalle);
                });

                swal({
                        title: "¿Desea hacer esta solicitud?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#4cd964",
                        cancelButtonText: "No",
                        confirmButtonText: "Sí, deseo registrarlo",
                        closeOnConfirm: false
                    },
                    function(){
                        $.ajax({
                            url:"/addSolicitud",
                            type:"POST",
                            data:{'descripcion': descripcion, 'tipo': tipo, 'detalles': obj},
                            cache:"false",
                            success:function (data) {
                                if(data=="1"){
                                    $("#tableBody-Solicitud").empty();
                                    swal("GUARDADA!","Solicitud registrada con exito","success");
                                }else{
                                    swal("ERROR","No se pudo guardar la solicitud","error");
                                }
                            }
                        });
                    });

            }else{
                swal("¡ERROR!","No hay suministros en esta solicitud","error");
            }
        }else{
            swal("¡ERROR!","campos faltantes","error");
        }

    });

});