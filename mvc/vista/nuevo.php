<?php
require_once("layouts/header.php");
?>

<main class="w-form p-8 bg-white rounded-md shadow-md">
    <h1 class="titleSmall">Registrar nuevo anime<hr></h1>
    <form class="bg-white grid grid-cols-[1fr_1fr] gap-x-4 gap-y-6" method="post" onsubmit="submitForm(event, 'guardar', true)">        
        <div class="col-span-full">
            <input class="hidden" type="file" id="imageRef" accept="image/*" name="portada" onchange="getPreviewImage(event, 'prwPortada', 'plcPortada')">            
            <label for="imageRef" class="w-full p-4 h-40 border border-dashed rounded-md border-indigo-600 flex items-center justify-center cursor-pointer" title="Previsualizar portada">                
                <img id="prwPortada" class="w-full h-full object-contain hidden" src="" alt="">
                <div id="plcPortada">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto stroke-indigo-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <p class="mt-2 text-gray-700 text-sm">Subir una portada</p>                
                </div>
            </label>
        </div>
        <div class="formItem">
            <input type="text" placeholder="Nombre del anime" name="nombre"> 
        </div>
        <div class="formItem">
            <input type="text" placeholder="Temporadas" name="temporadas" oninput="onInputNumber(event)"> 
        </div>        
        <div class="formItem">
            <input type="text" id="Lanzamiento" placeholder="Fecha de lanzamiento" name="lanzamiento">
        </div>
        <div class="formItem">
            <input type="text" placeholder="Link de visualización" name="visualización">
        </div>        
        <div class="formItem col-span-full">
            <textarea class="min-h-[150px] max-h-[200px]" placeholder="Ingrese la sinopsis" name="sinopsis"></textarea>
        </div>
        <div class="col-span-full flex justify-center">
            <button type="submit" class="btn_primary">Guardar</button>
            <button>Cancelar</button>
        </div>
    </form>
</main>

<script>
    $(document).ready(function (){
        $("#Lanzamiento").datepicker({
            dateFormat: "dd-mm-yyyy",
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
            dateFormat: 'dd/mm/yy',
            firstDay: 1,
        })
    })
</script>

<?php
require_once("layouts/footer.php");
?>