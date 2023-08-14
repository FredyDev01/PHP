<?php
    require_once("layouts/header.php");
?>

<h1 class="titleSmall">Administración de animes</h1>

<main class="max-w-max rounded-lg shadow-md m-auto bg-white">
    <form class="px-6 py-5 grid grid-cols-[max-content_max-content_1fr] items-center">        
        <div class="formItem">
            <input type="text" placeholder="Buscar anime">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </div>
        <div class="formItem ml-5 grid-rows-">
            <select>
                <option value="">Ordenar por id</option>
                <option value="">Ordenar por lanzamiento</option>
                <option value="">Ordenar por temporadas</option>
            </select>            
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
            </svg>
        </div>
        <div class="min-w-max flex justify-end">
            <button type="button" class="ml-20 btn_primary">
                Nuevo
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                </svg>     
            </button>
        </div>
        <div class="w-full mt-5 flex gap-2 text-sm col-span-full">
            <button type="submit" class="btn_filtered">Isekai</button>
            <button type="submit" class="btn_filtered">Shonen</button>
            <button type="submit" class="btn_filtered">Shoujo</button>
            <button type="submit" class="btn_filtered">Terror</button>
        </div>
    </form>
    <table class="table_admin_anim">
        <thead> 
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Sinopsis</th>
                <th>Temporadas</th>
                <th>Lanzamiento</th>            
                <th>Portada</th>
                <th>Acción</th>            
            </tr>
        </thead>
        <tbody>
            <?php
                if(!empty($dato)):
                    foreach($dato as $key => $value)
                        foreach($value as $v):?>
                        <tr>
                            <td><?= $v['id'] ?> </td>
                            <td class="max-w-[150px]">
                                <p class="truncate"><?= $v['nombre'] ?></p> 
                            </td>
                            <td class="max-w-[200px]">
                                <p class="truncate"><?= $v['sinopsis'] ?></p>
                            </td>
                            <td><p><?= $v['temporadas'] ?></p></td>
                            <td><p><?= $v['lanzamiento'] ?></p></td>
                            <td>
                                <img 
                                    class="w-16"
                                    src="<?= $v['imagen_url'] ?>" 
                                    alt="image_<?= $v['nombre'] ?>"
                                >
                            </td>
                            <td>
                                <a class="btn" href="index.php?m=editar&id=<?php echo $v['id']?>">EDITAR</a>
                                <a class="btn" href="index.php?m=eliminar&id=<?php echo $v['id']?>" onclick="return confirm('ESTA SEGURO'); false">ELIMINAR</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">NO TIENE NINGÚN ANIME RECOMENDADO</td>
                    </tr>
                <?php endif ?>
        </tbody>
    </table>
</main>

<?php
    require_once("layouts/footer.php");
?>