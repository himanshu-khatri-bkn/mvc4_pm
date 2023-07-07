<div class="col-lg-12 p-2 border">
    <nav class="navbar nav navbar-light ">
        <h3>Login - Login</h3>
    </nav>
</div>
<div class="container">
    <?php if ($msg = Session::get('emsg')) { ?>
        <div class="alert alert-danger h5">
            <?= $msg; ?>
        </div>
    <?php
        Session::delete('emsg');
    } ?>
    <form action="<?= ROOT; ?>login/index" method="post">
        <div class="mb-4">
            <label for="name">User Name : </label>
            <input type="text" class="form-control" required name="username" id="name" placeholder="Enter User Name">
        </div>
        <div class="mb-4">
            <label for="password">Password : </label>
            <input type="password" required class="form-control" name="password" id="password" placeholder="Enter Password">
        </div>
        <div class="mb-4">
            <button class="btn btn-success">Login</button>
        </div>
    </form>
</div>