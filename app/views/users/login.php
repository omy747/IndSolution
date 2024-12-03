<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="row">
<div class="offset-md-4 col-md-4 offset-md-4 col-12">
<?php flash('register_success'); ?>


<div class="card bg-light mt-5 mb-3 p-5" >
<h2 class="text-center text-primary">Авторизация</h2>
<p class="text-center mt-3 mb-2 text-primary">Укажите логин и пароль:</p>
<form action="<?php echo URLROOT; ?>/users/login" method="post">
<div class="form-group mb-2">
<label class="text-primary" for="email">Почта: <sup>*</sup></label>
<input name="email" type="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?> text-primary" value = "<?php echo $data['email']; ?>">
<span class="invalid-feedback"><?php echo $data['email_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->

<div class="form-group mb-2">
<label class="text-primary" for="password">Пароль: <sup>*</sup></label>
<input  name="password" type="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?> text-primary" value = "<?php echo $data['password']; ?>">
<span class="invalid-feedback"><?php echo $data['password_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
 
<div class="row">
<div class="col-12 text-center">
<input type="submit" value="Вход" class="btn btn-primary">
</div>
<!-- /.col -->
</div>
</form>
</div>
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<?php require APPROOT.'/views/inc/footer.php'; ?>