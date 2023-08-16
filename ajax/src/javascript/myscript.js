function realizarProceso(v1, v2, v3){    
    const parametros = {
        "valorCaja1": v1,
        "valorCaja2": v2,
        "valorCaja3": v3,
    };
    $.ajax({
        data: parametros,
        url: "ejemplo_ajax_proceso.php",
        type: "post",
        beforeSend: function(){
            $("#resultado").html("Procesando, espere porfavor...");
        },
        success: function(response){
            $("#resultado").html(response)
        }
    })
}