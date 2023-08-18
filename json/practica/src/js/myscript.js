function onGetProducts() {
    $.ajax({
        url: "actions/mostrar.php",
        method: "GET",            
        success: function (response){
            const JSONResponse = JSON.parse(response);
            if(JSONResponse.res){
                const data = JSONResponse.data;
                let row = "";
                if(data.length){
                    for(product of data){
                        row+=`
                            <tr>
                                <td><p>${product.id}</p></td>
                                <td><p>${product.nombre}</p></td>
                                <td><p>${product.precio}</p></td>
                                <td><p>${product.stock}</p></td>
                                <td><p>${product.envió}</p></td>
                                <td><p>${product.caducidad}</p></td>
                                <td class="max-w-[180px]"><p class="truncate">${product.observación}</p></td>
                            </tr>
                        `;
                    }  
                }else{
                    row += `
                        <tr>
                            <td colspan="7"><p>No hay productos registrados</p></td>    
                        </tr>
                    `
                }
                $("#data").html(row);                 
            }
        }
    })    
};

function onAddProduct(event) {
    event.preventDefault();
    const JSONData = Object.fromEntries(new FormData(event.target));
    const formInvalid = Object.values(JSONData).some(val => val.trim() === "");
    if(formInvalid) return showAlert("Debe llenar el formulario", true);
    $.ajax({
        url: "actions/guardar.php",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify(JSONData),
        success: function (response) {
            const JSONResponse =  JSON.parse(response);
            if(JSONResponse.res){
                onGetProducts();
                showAlert("Producto registrado");
                $("#txtNombre").val("");
                $("#txtPrecio").val("");
                $("#txtStock").val("");
                $("#txtEnvió").val("");
                $("#txtCaducidad").val("");
                $("#txtObservación").val("");
            }else{
                console.log(JSONResponse.error);
                showAlert("Error al guardar el producto", true);
            }
        }
    })
};

function showAlert(text, isError = false) {
    let bgAlert = "linear-gradient(to right, rgb(16, 185, 129), rgb(34, 197, 94))";
    let icon = "successIcon.png"
    if(isError){
        bgAlert = "linear-gradient(to right, rgb(185, 28, 28), rgb(239, 68, 68))";
        icon = "errorIcon.png"
    }
    Toastify({
        text,
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        avatar: `./assets/${icon}`,
        style: {
            "background": bgAlert,
            "display": "flex",
            "align-items": "center",  
            "gap": "10px",
        },
      }).showToast();
};

$(document).ready(function() {
    onGetProducts();
    const formatPicker = {
        changeYear: true,
        dateFormat: "dd/mm/y",
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        firstDay: 1,
    }
    $("#txtEnvió").datepicker(formatPicker);
    $("#txtCaducidad").datepicker(formatPicker);
});