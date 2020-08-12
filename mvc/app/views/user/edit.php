<div class="container">
    <form method="POST" action="<?= route("users/update") ?>">
        <input type="hidden" name="id" value="<?= $user->idusuario ?>">
        <div class="form-group">
            <label for="">Nombre completo</label>
            <input type="text" name="name" class="form-control" value="<?= $user->nombrecompleto ?>" id="">
        </div>
        <div class="form-group">
            <label for="">Correo</label>
            <input type="text" name="email" class="form-control" value="<?= $user->correo ?>" id="">
        </div>
        <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" name="cellphone" class="form-control" value="<?= $user->telefono ?>" id="">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
    </form>
</div>