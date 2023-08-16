<?php 
    switch($_POST["valorCaja3"]){
        case "sum":
            echo $_POST["valorCaja1"] + $_POST["valorCaja2"];
            break;
        case "mul":
            echo $_POST["valorCaja1"] * $_POST["valorCaja2"];
            break;
        case "div":
            echo $_POST["valorCaja1"] / $_POST["valorCaja2"];
            break;
        default:
            echo "Operacion invalida";
    }
?>