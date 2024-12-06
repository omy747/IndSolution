<?php require APPROOT.'/views/inc/header.php'; 
?><div class="mt-5 mb-3 text-center">
<?php flash('post_message'); ?>
</div> 
<h2 class="text-center mt-5 mb-3">Профиль</h2>
<div class="row">
<div class="offset-md-3 col-md-6 offset-md-3 col-12">    
<form action="<?php echo URLROOT; ?>/clients/mydata" method="post">
<div class="form-group">
<label for="lname">Фамилия:</label>
<input name="lname" type="text" class="form-control form-control-lg <?php echo (!isset($data['lname_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo isset($data['lname']) ? $data['lname'] : ' ' ; ?>">
<span class="invalid-feedback"><?php echo $data['lname_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group">
<label for="name">Имя: </label>
<input name="name" type="text" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo isset($data['name']) ? $data['name'] : ' ' ; ?>">
<span class="invalid-feedback"><?php echo $data['name_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group">
<label for="pat">Отчество: </label>
<input name="pat" type="text" class="form-control form-control-lg <?php echo (!empty($data['pat_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo isset($data['pat']) ? $data['pat'] : ' ' ; ?>">
<span class="invalid-feedback"><?php echo $data['pat_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group">
<label for="title">Название: </label>
<input name="title" type="text" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo isset($data['title']) ? $data['title'] : ' ' ; ?>">
<span class="invalid-feedback"><?php echo $data['title_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group">
<label for="address">Адрес: </label>
<input name="address" type="text" class="form-control form-control-lg <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo isset($data['address']) ? $data['address'] : ' ' ; ?>">
<span class="invalid-feedback"><?php echo $data['address_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group">
<label for="phone">Телефон: </label>
<input name="phone" type="text" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo isset($data['phone']) ? $data['phone'] : ' ' ; ?>">
<span class="invalid-feedback"><?php echo $data['phone_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mt-3">
<input type="submit" value="Сохранить" class="btn btn-primary btn-block mb-3">
</div>
</form>
</div>
    <!-- /.offset-md-3 col-md-6 offset-md-3 col-12 -->
</div>
<!-- /.row -->
<?php require APPROOT.'/views/inc/footer.php'; ?>