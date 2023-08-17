<?php         
    $GetDataJSON = file_get_contents("productos.json");
    $Products = json_decode($GetDataJSON); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Practica JSON</title>    
    <link rel="stylesheet" href="./css/tailwind.css">
</head>
<body class="min-h-screen bg-gray-800 flex flex-col items-center justify-center">
    <h1 class="mb-16 text-3xl font-bold text-white">Lista de productos</h1>
    <table class="text-center rounded-t-lg overflow-hidden">
        <thead class="bg-emerald-700 text-white">
            <tr>
                <th class="px-6 py-4">id</th>
                <th class="px-6 py-4">Nombre</th>
                <th class="px-6 py-4">precio</th>
                <th class="px-6 py-4">stock</th>
                <th class="px-6 py-4">envió</th>
                <th class="px-6 py-4">caducidad</th>
                <th class="px-6 py-4">vendedor</th>
                <th class="px-6 py-4">observacion</th>                
            </tr>
        </thead>
        <tbody class="text-gray-400">
            <?php foreach($Products as $Product): ?>
                <tr class="border-b border-gray-700">
                    <td class="py-4"><?= $Product->id ?></td>
                    <td class="py-4"><?= $Product->nombre ?></td>
                    <td class="py-4"><?= $Product->precio ?></td>
                    <td class="py-4"><?= $Product->stock ?></td>
                    <td class="py-4"><?= $Product->envió ?></td>
                    <td class="py-4"><?= $Product->caducidad ?></td>
                    <td class="py-4"><?= $Product->vendedor ?></td>
                    <td class="py-4"><?= $Product->observación ?></td>                    
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>