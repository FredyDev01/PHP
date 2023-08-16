/*GESTIÓN DE IMÁGENES*/

function getPreviewImage(event, idImage, idPlaceholder) {    
    const img = document.getElementById(idImage);
    const placeholder = document.getElementById(idPlaceholder);
    const files = event.target.files[0];    
    if(files){
        const reader = new FileReader();
        reader.readAsDataURL(files);
        reader.onload = (e) => {
            placeholder.classList.add("hidden");
            img.classList.remove("hidden");
            img.setAttribute("src", e.target.result);
            img.setAttribute("alt", files.name);
        }
    }else{
        e.value = null;
        placeholder.classList.remove("hidden");
        img.classList.add("hidden");
        img.setAttribute("src", "");
        img.setAttribute("alt", "");
    }
}

/* ENVIÓ DE FORMULARIO */

function submitForm(event, url, isFile = true) {
    event.preventDefault();
    const infoForm = new FormData(event.target);
    const objectData = Object.fromEntries(infoForm);
    const method = event.target.getAttribute("method") || "GET";    
    let contentType = "application/json";
    if(isFile || method.toUpperCase() === "GET"){
        contentType = false;
    }
    $.ajax({
        url,
        method,
        data: isFile ? infoForm : objectData,
        processData: isFile ? false : true,
        contentType,
        success: (response) => {
            console.log(response)
        },
    });
}

/* MANEJO DE INPUTS */
function onInputNumber (event) {
    const valueInput = event.target.value;
    const valueNumber = valueInput.replace(/\D/g, "");
    event.target.value = valueNumber;
}