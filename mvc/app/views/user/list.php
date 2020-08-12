<div class="container mt-4">
    <?= renderMessage("success") ?>
    <?= renderMessage("error", "danger") ?>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?foreach($users as $user):?>
            <tr>
                <th><?= $user->nombrecompleto ?></th>
                <td><?= $user->telefono ?></td>
                <td><?= $user->correo ?></td>
                <td>
                    <a href="<?= route("users/edit/" . $user->idusuario) ?>" class="btn btn-outline-info">Editar</a>
                    <input type="submit" onclick="return confirm('¿Estas seguro?')" form="delele-user-<?= $user->idusuario ?>" type="text" class="btn btn-outline-danger" value="Eliminar">
                    <form id="delele-user-<?= $user->idusuario ?>" action="<?= route("users/delete") ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $user->idusuario ?>">
                    </form>
                </td>
            </tr>
            <? endforeach;?>
        </tbody>
    </table>
</div>