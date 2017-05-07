/**
 * Created by Carlos Mario on 30/11/2016.
 */

function cargarSuministrosCompra() {
    $.ajax({
        url: "/suministroSel",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data == "") {
                $("#nombreSum-com").append('<option disabled>No hay suministros disponibles</option>');
            } else {
                data = JSON.parse(data);
                $.each(data, function (index, item) {
                    $("#nombreSum-com").append('<option id="' + item[0] + '">' + item[1] + '</option>');
                });
            }
        }
    });
}

function cargarProveedores() {
    $.ajax({
        url: "/proveedorSel",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data == "") {
                $("#nombreProv-com").append('<option disabled>No hay proveedores disponibles</option>');
            } else {
                data = JSON.parse(data);
                $.each(data, function (index, item) {
                    $("#nombreProv-com").append('<option id="' + item[0] + '">' + item[1] + '</option>');
                });
            }
        }
    });
}

function borrarReg(id) {
    $("#row"+id).remove();
    $("#modalOfi"+id).remove();
}

function creaModals(id,obj) {

    var cantidad = parseInt(obj[3]);
    var ofimatics = "";

    for (var i=0; i<cantidad; i++) {
        ofimatics +=  '<div class="form-group">'+
            '<label for="cemail" class="control-label col-lg-2">Referencia <span class="required"></span></label>'+
            '<div class="col-lg-4">'+
            '<input class="form-control" id="referenciaOfi'+id+i+'" type="text" placeholder="Referencia"  value="'+obj[0]+'" disabled />'+
            '</div>'+
            '<label for="cname" class="control-label col-lg-1">Codigo serial <span class="required"></span></label>'+
            '<div class="col-lg-4">'+
            '<input class="form-control" id="codigoOfi'+id+i+'" type="text" placeholder="Serial" required />'+
            '</div>'+
            '</div>';
    }

    var modal = '<div id="modalOfi'+id+'" class="modal fade" role="dialog">'+
        '<div style="width:80%;" class="modal-dialog modal-lg">'+
        '<div class="modal-content">'+
        '<div class="modal-header" style="padding:35px 170px;">'+
        '<h4 style="text-align:center;" class="modal-title">Agregar ofimatico</h4>'+
        '</div>'+
        '<div class="modal-body">'+
        '<form class="form-validate form-horizontal">'+
        ofimatics+
        '</form>'+
        '</div>'+
        '<div class="modal-footer">'+
        '<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>'+
        '<button class="btn btn-success" data-dismiss="modal" >Agregar</button>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';

    return modal;
}

function modalOfi(id) {
    if ($("#modalOfi"+id).length > 0){
        $("#modalOfi"+id).modal();
    }else{

        var fila = "#row" + id;
        data = $(fila).children('td');
        var obj = [];
        data.each(function () {
            obj.push($(this).text());
        });
        var modal = creaModals(id,obj);

        $("#modals-ofi").append(modal);
        $("#modalOfi"+id).modal();
    }
}

function detalleCompra() {
    this.idSuministro;
    this.tipo;
    this.cantidad;
    this.valorUnitario;
}

function ofimaticos() {
    this.idSuministro;
    this.codSerial;
}


$(function () {

    $("#nombreSum-com").select2();

    $("#nombreProv-com").select2();

    cargarSuministrosCompra();
    cargarProveedores();

    $("#buscarProv").click(function () {
        var id = $("#nombreProv-com option:selected").attr('id');
        $.ajax({
            url: "/proveedorRecord",
            type: "POST",
            data:{'id': id},
            cache: "false",
            success: function (data) {
                if (data == "") {
                    $("#nitProv-com").val("");
                } else {
                    data = JSON.parse(data);
                    $("#nitProv-com").val(data[0][0]);
                }
            }
        })
    });

    $("#buscarSum").click(function () {
        var id = $("#nombreSum-com option:selected").attr('id');
        $.ajax({
            url: "/suministroRecord",
            type: "POST",
            data:{'id': id},
            cache: "false",
            success: function (data) {
                if (data == "") {

                } else {
                    data = JSON.parse(data);
                    $("#codigoSum-com").val(data[0][0]);
                    $("#tipoSuministro-com").val(data[0][1]);
                }
            }
        })
    });

    $("#btnAgregarSum").click(function () {

        if($.trim($("#codigoSum-com").val()).length>0 && $.trim($("#tipoSuministro-com").val()).length>0 &&
            $.trim($("#stockSuministro-com").val()).length>0 && $.trim($("#valorSuministro-com").val()).length>0){
             var val=true;
            $("#tableCompra tr").find('td:eq(0)').each(function () {
                if ($(this).html() == $("#codigoSum-com").val()){
                    val = false;
                }
            });

            if (val){
                var ofi;
                var id = $("#nombreSum-com option:selected").attr('id');
                var codigoSum = $("#codigoSum-com").val();
                var nombreSum = $("#nombreSum-com").val();
                var tipoSum = $("#tipoSuministro-com").val();
                var stockSum = $("#stockSuministro-com").val();
                var valorSum = $("#valorSuministro-com").val();

                if (tipoSum == "OFIMATICO"){
                    ofi = '<a id="' + id + '" class="btn btn-primary" onclick="modalOfi('+ id +')"><i class="icon_clipboard"></i></a>';
                }else{
                    ofi = '';
                }
                var table = '<tr id="row'+ id +'">'+
                    '<td>' + codigoSum + '</td>'+
                    '<td>' + nombreSum + '</td>'+
                    '<td>' + tipoSum + '</td>'+
                    '<td>' + stockSum + '</td>'+
                    '<td>' + valorSum + '</td>'+
                    '<td>'+ '<div>'+
                    ofi+
                    '<a id="' + id + '" class="btn btn-danger" onclick="borrarReg('+ id +')"><i class="icon_close_alt2"></i></a>'+
                    '</div>' + '</td>' +
                    '</tr>';

                $("#tableBody-Compra").append(table);
            }else{
                swal("¡Coincidencias!","Ya agrego este producto","error");
            }

        }else{
            swal("¡ERROR!","Llene los campos","error");
        }
    });
    
    $("#btnRegistrarCompra").click(function () {
        if($("#fechaCompra").val() !== "" && $("#nitProv-com").val() !== ""){
            if($.trim($("#tableBody-Compra").html()).length > 0){

                var fecha = $("#fechaCompra").val();
                var nit = $("#nombreProv-com option:selected").attr('id');

                data = $("#tableCompra tbody tr");
                var obj = [];
                var ofimats = [];
                var valOfi=true;
                data.each(function () {
                    detalle = new detalleCompra();
                    detalle.idSuministro = $(this).attr("id");
                    detalle.idSuministro = detalle.idSuministro.replace("row","");
                    $(this).children("td").each(function (index2)
                    {
                        switch (index2)
                        {
                            case 2: detalle.tipo = $(this).text();
                                break;
                            case 3: detalle.cantidad = parseInt($(this).text());
                                break;
                            case 4: detalle.valorUnitario = parseInt($(this).text());
                                break;
                        }
                    });
                    if(detalle.tipo == "OFIMATICO"){
                        for(var i=0; i<detalle.cantidad; i++){
                            if($.trim($("#codigoOfi"+detalle.idSuministro+i).val()).length > 0){
                                ofimatico = new ofimaticos();
                                ofimatico.idSuministro = detalle.idSuministro;
                                ofimatico.codSerial  = $("#codigoOfi"+detalle.idSuministro+i).val();
                                ofimats.push(ofimatico);
                            }else{
                                parseInt(detalle.cantidad);
                                valOfi=false;
                            }
                        }
                    }
                    obj.push(detalle);
                });

                if (valOfi == true){
                    swal({
                            title: "¿Desea registrar esta compra?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#4cd964",
                            cancelButtonText: "No",
                            confirmButtonText: "Sí, deseo registrarla",
                            closeOnConfirm: false
                        },
                        function(){
                            $.ajax({
                                url:"/addCompra",
                                type:"POST",
                                data:{'fecha': fecha, 'nit': nit, 'detalles': obj, 'ofimaticos': ofimats},
                                cache:"false",
                                success:function (data) {
                                    if(data=="1"){
                                        $("#modals-ofi").empty();
                                        $("#tableBody-Compra").empty();
                                        swal("GUARDADA!","Solicitud registrada con exito","success");
                                    }else{
                                        swal("ERROR","No se pudo guardar la solicitud","error");
                                    }
                                }
                            });
                        });
                }else{
                    swal("¡ERROR!","Hay ofimaticos sin registrar","error");
                }

            }else{
                swal("¡ERROR!","No hay suministros en esta compra","error");
            }
        }else{
            swal("¡ERROR!","campos faltantes","error");
        }
    });

});