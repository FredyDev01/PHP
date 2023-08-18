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

function onGetProducts() {
    $.ajax({
        url: "actions/mostrar.php",
        method: "GET",            
        success: function (response){
            const JSONResponse = JSON.parse(response);
            if(JSONResponse.res){
                const data = JSONResponse.data;
                let row = "";
                for(product of data){
                    row+=`
                        <tr>
                            <td>${product.id}</td>
                            <td>${product.nombre}</td>
                            <td>${product.precio}</td>
                            <td>${product.stock}</td>
                            <td>${product.envió}</td>
                            <td>${product.caducidad}</td>
                        </tr>
                    `;
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
            }else{
                showAlert("Error al guardar el producto", true);
            }
        }
    })
};

$(document).ready(onGetProducts());