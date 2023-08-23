/*--------- GESTIÓN DE IMÁGENES ---------*/

function onGetPreviewImage(event, idImage, idPlaceholder) {    
    const img = document.getElementById(idImage);
    const placeholder = document.getElementById(idPlaceholder);
    const files = event?.target?.files[0];    
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
        event.value = null;
        placeholder.classList.remove("hidden");
        img.classList.add("hidden");
        img.setAttribute("src", "");
        img.setAttribute("alt", "");
    }
};

/*--------- ENVIÓ DE FORMULARIO ---------*/

function onSubmitForm(event, url, isFile = true) {
    event.preventDefault();    
    const infoForm = new FormData(event.target);
    const objectData = Object.fromEntries(infoForm);
    const method = event.target.getAttribute("method") || "GET";    
    let contentType = "application/json";
    if(isFile || method.toUpperCase() === "GET"){
        contentType = false;
    }    
    return new Promise(resolve => {
        $.ajax({
            url,
            method,
            data: isFile ? infoForm : objectData,
            processData: isFile ? false : true,
            contentType,
            success: (response) => {   
                resolve(response);
                console.log("dsasd");
            },
        });
    });
};

function onStatusForm(event) {
    const listElements = [...event.target]
    
}

/*--------- MANEJO DE FECHAS CON DATEPICKER ---------*/

function onSetDatePicker(id) {
    $(`#${id}`).datepicker({
        dateFormat: "dd-mm-y",
        maxDate: new Date(),
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
    });
};