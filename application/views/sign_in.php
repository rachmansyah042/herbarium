
<form class="form-signin" action="<?= base_url('Auth') ;?>" method="post">
<div class="text-center mb-4">
    <!-- <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
    <!-- <h4 class="h3 mb-3 font-weight-normal">HERBARIUM</h4> -->
    <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
    <?= $this->session->flashdata('message'); ?>
    </div>

<div class="form-label-group">
    <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" autofocus>
    <label for="inputEmail">Username</label>
    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            
</div>

<div class="form-label-group">
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" >
    <label for="inputPassword">Password</label>
    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            
</div>

<div class="checkbox mb-3">
    <!-- <label>
    <input type="checkbox" value="remember-me"> Remember me
    </label> -->
</div>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<p class="mt-5 mb-3 text-muted text-center">&copy; 2019</p>
</form>

