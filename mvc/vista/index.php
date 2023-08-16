<?php
    require_once("layouts/header.php");
?>


<h1 class="titleSmall">Administración de animes <hr></h1>

<main class="max-w-max mx-auto bg-white rounded-lg shadow-md">
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
            <a href="nuevo" class="ml-20 btn_primary">
                Nuevo
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                </svg>     
            </a>
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
                            <td class="max-w-[64px]">
                                <img src="<?= $v['imagen_url'] ?>" alt="image_<?= $v['nombre'] ?>">
                            </td>
                            <td>
                                <div class="flex items-center gap-2.5">
                                    <a class="btn_icon_primary" href="index.php?m=editar&id=<?php echo $v['id']?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 block">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                        </svg>
                                    </a>
                                    <a class="btn_icon_danger" href="index.php?m=eliminar&id=<?php echo $v['id']?>" onclick="return confirm('ESTA SEGURO'); false">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5 block">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </div>
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