$(document).ready(function(){
    $("#formNewAnime").submit(async function(event) {                
        event.preventDefault();         
        const ListChild = [...event.currentTarget];
        ListChild.forEach(elm => {
            elm.disabled = true
        });        
        const response = await onSubmitForm(event, "guardar", true); 
        console.log(response);
        ListChild.forEach(elm => {
            elm.disabled = false
        });            
    });

    $("#imageRef").change(function(event) {  
        onGetPreviewImage(event, "prwPortada", "plcPortada");
    });

    $("#linkHome").click(function(event) {
        event.currentTarget.firstElementChild.click()
    })

    onSetDatePicker("Lanzamiento");
});