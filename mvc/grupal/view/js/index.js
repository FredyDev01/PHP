/*------------ ELEMENTOS GENERALES DEL FORMULARIO ------------*/
let listaProductos = []
let editarProducto = null

const form = $('#formProductos')
const titulo = $('#formTitulo')
const txtEnviar = $('#txtEnviar')
const btnCancelar = $('#formCancelar')
const prwImage = $('#prwImagen')
const plcImage = $('#plcImagen')
const inpImagen = $('#inpImagen')
const inpCategoria = $('#inpCategoria')
const inpNombre = $('#inpNombre')
const inpPrecio = $('#inpPrecio')
const inpStock = $('#inpStock')
const inpDescripcion = $('#inpDescripcion')

/*------------ OBTENER TODOS LOS PRODUCTOS ------------*/
function obtenerProductos(){
    $.ajax({
        url: '../index.php?method=obtenerProductos',
        method: 'GET',
        success: function(response){
            const dataJSON = JSON.parse(response);
            if(dataJSON.res){
                listaProductos = dataJSON.data;                
                let filas = ''
                if(listaProductos.length){                    
                    listaProductos.forEach(producto => {

                        if(producto.descripcion.length == 0){
                            producto.descripcion = 'Sin descripción'
                        }

                        filas += `
                        <tr>
                            <td><p>${producto.id_producto}</p></td>
                            <td><p>${producto.categoria} </p></td>
                            <td><p>${producto.nombre} </p></td>
                            <td><p>S/ ${(producto.precio).toFixed(2)} </p></td>
                            <td><p>${producto.stock}</p></td>    
                            <td><p>${producto.descripcion}</p></td>
                            <td>                             
                                <img class='max-w-[100px] max-h-[40px] mx-auto' src='${producto.url_image}' name='image_${producto.nombre}' />                                
                            </td>
                            <td> 
                                <div class='flex gap-3'>
                                    <button class='btnIcon success' data-action='editar' data-id='${producto.id_producto}'>
                                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'>
                                            <path stroke-linecap='round' stroke-linejoin='round' d='M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10' />
                                        </svg>
                                    </button> 
                                    <button class='btnIcon danger' data-action='eliminar' data-id='${producto.id_producto}'>
                                        <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor'>
                                            <path stroke-linecap='round' stroke-linejoin='round' d='M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0' />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        `
                    });
                } else{
                    filas += `
                    <tr>
                        <td colspan='8'> No hay Productos </td>
                    </tr>
                    `
                }
                $('#data').html(filas);
            }
        }
    })
}

$(document).ready(function(){
    obtenerProductos();
});


/*------------ ELIMINACIÓN Y EDICIÓN DE PRODUCTOS ------------*/
function eliminarProducto(id){    
    swal({
        title: '¿Estas Seguro?',
        text: 'Una vez eliminado, no se volverá a recuperar el registro',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if(willDelete) {
            const producto = listaProductos.find(prd => prd.id_producto === id)
            $.ajax({
                url: `../index.php?method=eliminarProducto&id=${id}&public_id=${producto.public_id}`,
                method: 'GET',
                success: function(response){
                    const dataJSON = JSON.parse(response)
                    if(dataJSON.res){
                        swal('Producto Eliminado!', {icon: 'success'});                        
                        obtenerProductos();   
                    } else{
                        swal('Error al eliminar producto!', {icon: 'error'});
                    }
                }
            })
        }
    })
}

function prepararFormulario(id = null) {
    if(id === null){
        editarProducto = id
        titulo.html('Agregar Producto<hr/>')
        txtEnviar.text('Guardar')
        btnCancelar.addClass('hidden')
        inpImagen.val(null)
        inpCategoria.val('')
        inpNombre.val('')
        inpPrecio.val('')
        inpStock.val('')      
        inpDescripcion.val('')  
    }else{
        editarProducto = listaProductos.find(prd => prd.id_producto === id)
        titulo.html('Editar Producto<hr/>')
        txtEnviar.text('Actualizar')
        btnCancelar.removeClass('hidden')
        inpCategoria.val(editarProducto.categoria)
        inpNombre.val(editarProducto.nombre)
        inpPrecio.val(editarProducto.precio)
        inpStock.val(editarProducto.stock)
        inpDescripcion.val(editarProducto.descripcion)          
    }
    visualizarImagen()
}

function EjecutarAcción(event) {
    if(event.target.tagName === 'BUTTON'){
        const action = event.target.dataset.action
        const id = parseInt(event.target.dataset.id)
        if(action === 'eliminar') eliminarProducto(id)
        else if(action === 'editar') prepararFormulario(id)
    }
}


/*------------ AGREGACIÓN DE PRODUCTOS ------------*/
function agregarProductos(e){
    e.preventDefault();        
    const esValido = formularioValido()
    if(esValido){
        const data = new FormData(e.target)
        let endpoint = 'agregarProductos' 
        if(editarProducto){
            endpoint = `actualizarProducto&id=${editarProducto.id_producto}` 
            data.append("public_id", editarProducto.public_id)
        }
        cargarFormulario(true)
        $.ajax({
            url: `../index.php?method=${endpoint}`,
            method: 'POST',
            data,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response)
                const dataJSON = JSON.parse(response) 
                if(dataJSON.res){                                                    
                    swal(`Producto ${editarProducto ? 'Actualizado' : 'Agregado'}!`, '', 'success')                    
                    prepararFormulario()
                    obtenerProductos()                
                }
                cargarFormulario(false)
            }
        })
    }else{
        swal('Formulario incompleto', 'Debe ingresar valores en todos los campos.', 'error')
    }
}


/*------------ FUNCIONALIDAD ADICIONAL PARA EL FORMULARIO ------------*/
function cargarFormulario(status) {
    const formElement = [...form[0]]
    for(var element of formElement){
        $(element).attr("disabled", status)
    } 
}

function formularioValido() {        
    let valid = true
    const formElement = [...form[0]]
    for(var element of formElement){
        if(element.tagName === "INPUT") {
            const required = element.dataset?.required
            if(!element.value && required !== 'false' && (element.type !== "file" || !editarProducto)) {              
                valid = false
                break
            }             
        }
    }
    return valid
}

function visualizarImagen(event = null){
    const image = event?.target?.files[0]
    if(image){
        const reader = new FileReader()
        reader.readAsDataURL(image)
        reader.onload = (img) => {
            plcImage.addClass('hidden')
            prwImage.removeClass('hidden')
            prwImage.attr('src', img.target.result)
            prwImage.attr('name', image.name)
        }
    }else{
        if(editarProducto){
            plcImage.addClass('hidden')
            prwImage.removeClass('hidden')            
            prwImage.attr('src', editarProducto.url_image)
            prwImage.attr('name', 'image_' + editarProducto.nombre)
        }else{
            plcImage.removeClass('hidden')
            prwImage.addClass('hidden')
            prwImage.attr('src', '')
            prwImage.attr('name', '')            
        }
    }
}