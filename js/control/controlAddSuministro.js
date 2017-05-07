/**
 * Created by Carlos Mario on 22/11/2016.
 */
    function estadoSum(id,estado) {

        swal({
            title: "¿Desea cambiar de estado al suministro?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#4cd964",
            cancelButtonText: "No",
            confirmButtonText: "Sí, deseo cambiarlo",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                url:"/stadeSuministro",
                type:"POST",
                data:{'identificador': id,'estado': estado},
                cache:"false",
                success:function (data) {

                    if(data=="1"){
                        swal("¡HECHO!","Cambio de estado exitoso","success");
                        $("#secTableSum-2").empty();
                        cargarTablaSum2();
                    }else{
                        swal("ERROR","El suministro no cambió de estado","error");
                    }

                }
            });
        });

    }

    function activeModSum(id) {
        var fila = "#row" + id;
        data = $(fila).children('td');
        var obj = [];
        data.each(function () {
            obj.push($(this).text());
        });

        $("#updateSum").modal();
        $("#referenciaSum-mod").val(obj[1]);
        $("#nombreSum-mod").val(obj[2]);
        $("#tipoSum-mod").val(obj[4]);
    }

    function cargarTablaSum2(){
    $.ajax({
        url: "/dataSuministro",
        type: "GET",
        cache: "false",
        success: function (data) {
            if (data != "") {

                var stade;
                var ofi;
                var table= '<table class="table table-advance table-hover" id="id-tableSum-2">'+
                    '<thead>'+
                    '<tr>'+
                    '<th><i class="icon_archive"></i> Estado</th>'+
                    '<th><i class="icon_id-2"></i> Referencia</th>'+
                    '<th><i class="icon_folder"></i> Nombre</th>'+
                    '<th><i class="icon_datareport"></i> Stock</th>'+
                    '<th><i class="icon_ribbon"></i> Tipo</th>'+
                    '<th><i class="icon_cogs"></i> Acciones</th>'+
                    '</tr>'+
                    '</thead>'+
                    '<tbody id="tableSum-2">';

                data = JSON.parse(data);
                $.each(data, function (index, item) {

                    if(item[5] == "ACTIVO"){
                        stade = "btn btn-success";
                    }else{
                        stade = "btn btn-warning";
                    }

                    if(item[4] == "OFIMATICO"){
                        ofi = '<a id="' + item[0] + '" class="btn btn-lg" ><i class="icon_clipboard"></i></a>';
                    }else{
                        ofi = '';
                    }


                    table += '<tr id="row'+ item[0]+'">' +
                        '<td>'+
                        '<a id="' + item[0] + '" class="'+ stade +'" onclick=estadoSum('+item[0]+',"'+ item[5] +'")>'+ item[5] +'</a>'+
                        '</td>' +
                        '<td>'+ item[1] +'</td>' +
                        '<td>'+ item[2] +'</td>' +
                        '<td>'+ item[3] +'</td>' +
                        '<td>'+ item[4] +'</td>' +
                        '<td>'+ '<div>'+
                        '<a id="' + item[0] + '" class="btn btn-primary" onclick=activeModSum('+item[0]+')><i class="icon_pencil-edit_alt"></i></a>'+
                        ofi+
                        '</div>' + '</td>' +
                        '</tr>';
                });

                table+= '</tbody>'+
                    '</table>';
                $("#secTableSum-2").append(table);
            }
            $("#id-tableSum-2").DataTable({
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

    function modificarSum() {
        var nombreMod = $("#nombreSum-mod").val();

        if($.trim(nombreMod).length > 0){

            $.ajax({
                url:"/updateSuministro",
                type:"POST",
                data:{'referencia': $("#referenciaSum-mod").val(), 'nombre': nombreMod},
                cache:"false",
                success:function (data) {

                    if(data=="1"){
                        $("#updateSum").modal('toggle');
                        swal("¡HECHO!","Suministro se actualizó con exito","success");
                        $("#secTableSum-2").empty();
                        cargarTablaSum2();
                    }else{
                        swal("ERROR","El suministro no se actualizó","error");
                    }

                }
            });
        }else{
            swal("ERROR","Llene los campos","error");
        }
    }


$(function () {
    $("#btnAgg-sum").click(function () {
        var referenciaSum = $("#referenciaSum").val();
        var nombreSum = $("#nombreSum").val();
        var tipoSum = $("#tipoSum").val();

        if($.trim(referenciaSum).length > 0 && $.trim(nombreSum).length > 0 && tipoSum != null){
            swal({
                    title: "¿Desea guardar el suministro " + nombreSum + "?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#4cd964",
                    cancelButtonText: "No",
                    confirmButtonText: "Sí, deseo guardarlo",
                    closeOnConfirm: false
                },
                function(){
                    $.ajax({
                        url:"/addSuministro",
                        type:"POST",
                        data:{'referencia': referenciaSum, 'nombre': nombreSum, 'tipo': tipoSum},
                        cache:"false",
                        success:function (data) {

                            if(data=="1"){
                                swal("GUARDADO!","Suministro guardado con exito","success");
                                $("#secTableSum-2").empty();
                                cargarTablaSum2();
                            }else{
                                swal("ERROR","El suministro no se guardó","error");
                            }

                        }
                    });
                });
        }else{
            swal("ERROR","Llene los campos","error");
        }
    });
    cargarTablaSum2();
});