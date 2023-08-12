<?php
    require_once("layouts/header.php");
?>
<a href="index.php?m=nuevo" class="btn">NUEVO</a><br><br>
<main class="contain_admin_anim">
    <table class="admin_anim_table">
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
                            <td><?php echo $v['id'] ?> </td>
                            <td><?php echo $v['nombre'] ?> </td>
                            <td>
                                <a class="btn" href="index.php?m=editar&id=<?php echo $v['id']?>">EDITAR</a>
                                <a class="btn" href="index.php?m=eliminar&id=<?php echo $v['id']?>" onclick="return confirm('ESTA SEGURO'); false">ELIMINAR</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">NO HAY REGISTROS</td>
                    </tr>
                <?php endif ?>
        </tbody>
    </table>
</main>
<?php
    require_once("layouts/footer.php");
?>