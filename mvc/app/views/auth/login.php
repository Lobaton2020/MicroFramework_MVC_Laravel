<div class="container mt-5">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <?= renderMessage("info") ?>
            <?= renderMessage("error", "danger") ?>
            <h3 class="text-center">Iniciar Sesion</h3>
            <form action="<?= route("auth/login") ?>" method="POST">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Correo" required>
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesion</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>