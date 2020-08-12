<div class="container">
    <?= renderMessage("success") ?>
    <?= renderMessage("error", "danger") ?>
    <form method="POST" action="<?= route("users/store") ?>">
        <input type="hidden" name="image" value="image/avatar.png">
        <div class="form-group">
            <label for="">Nombre completo</label>
            <input type="text" name="name" class="form-control" value="" id="" placeholder="Nombre completo">
        </div>
        <div class="form-group">
            <label for="">Correo</label>
            <input type="text" name="email" class="form-control" value="" id="" placeholder="Correo">
        </div>
        <div class="form-group">
            <label for="">Contraseña</label>
            <input type="password" name="pass" class="form-control" value="" id="" placeholder="Contraseña">
        </div>
        <div class="form-group">
            <label for="">Telefono</label>
            <input type="text" name="cellphone" class="form-control" value="" id="" placeholder="Telefono">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
    </form>
</div>