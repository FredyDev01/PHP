//Función que busca un numero en los botones pos=-1;
function Buscar(n) {
    for(i = 0; i < document.form1.boton.length; i++){
        if(parseInt(document.form1.boton[i].value) === n){
            pos = i
            break
        }
    }
    return pos;
}

//Función para llenar los botones con números aleatorios cont=0
function llenar() {
    cont = 0;
    while (cont < 10) {
        n = parseInt(Math.random() * 10);        
        document.form1.boton[cont].value = n;        
        cont = cont + 1;
    }
}

//Se recibe el parámetro que obtendrá tu botón
function poner(caja) {
    document.form1.txtclave.value += caja.value;
}