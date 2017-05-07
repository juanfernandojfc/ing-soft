/**
 * Created by Carlos Mario on 22/11/2016.
 */

$("#btn-login").click(function (){

    var usuario = $("#usuario").val();
    var contra = $("#contra").val();

    if ($.trim(usuario).length > 0 && $.trim(contra).length > 0){
        $.ajax({
            url:"/login",
            type:"POST",
            data:{'usuario':usuario, 'contra':contra},
            cache:"false",
            beforeSend:function () {
               $("#btn-login").val("Conectando...");
            },
            success:function (data) {
                if (data == "1"){
                    $(location).attr('href','/user');
                }else{
                   swal("ERROR",data,"error");
                }
            }
        });
    }else{
        swal("ERROR","Llene los campos");
    }
});
