<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body bg-light mt-3">
<h2>Создать аккаунт</h2>
<p>Пожалуйста, заполните форму регистрации</p>
<form action="<?php echo URLROOT; ?>/dashboard/adduser" method="post">
<div class="form-group mb-2">
<label for="email">Логин: <sup>*</sup></label>
<input name="email" type="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['email']; ?>">
<span class="invalid-feedback"><?php echo $data['email_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="password">Пароль: <sup>*</sup></label>
<input name="password" type="text" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['password']; ?>">
<span class="invalid-feedback"><?php echo $data['password_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="confirm_password">Права доступа: <sup>*</sup></label>
<select name="role"  class="form-control">
<option value="admin">Администратор</option>
<option value="user">Клиент</option>
<option value="manager">Оператор</option>
</select>
</div>
<!-- /.form-group -->
<div class="row">
<div class="col-12">
<input type="submit" value="Создать" class="btn btn-primary">
</div>
<!-- /.col -->
</div>
</form>
</div>
<!-- /.card card-body bg-light mt-5 -->
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->
<?php require APPROOT.'/views/inc/footer.php'; ?>