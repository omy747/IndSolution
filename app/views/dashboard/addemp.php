<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body bg-light mt-3">
<h2>Добавить сотрудника</h2>
<p>Пожалуйста, заполните форму ниже</p>
<form action="<?php echo URLROOT; ?>/dashboard/addemp" method="post">
<div class="form-group mb-2">
<label for="lname">Фамилия: <sup>*</sup></label>
<input name="lname" type="text" class="form-control form-control-lg <?php echo (!empty($data['lname_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['lname']; ?>">
<span class="invalid-feedback"><?php echo $data['lname_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="fname">Имя: <sup>*</sup></label>
<input name="fname" type="text" class="form-control form-control-lg <?php echo (!empty($data['fname_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['fname']; ?>">
<span class="invalid-feedback"><?php echo $data['fname_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="patr">Отчество: <sup>*</sup></label>
<input name="patr" type="text" class="form-control form-control-lg <?php echo (!empty($data['patr_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['patr']; ?>">
<span class="invalid-feedback"><?php echo $data['patr_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="model">Должность: <sup>*</sup></label>
<select name="place"  class="form-control">
<option value="Администратор">Администратор</option>
<option value="Менеджер по работе с клиентами">Менеджер по работе с клиентами</option>
</select>
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="model">Подразделение: <sup>*</sup></label>
<select name="department"  class="form-control">
<option value="ИТ-отдел">ИТ-отдел</option>
</select>
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="h_date">Дата найма: <sup>*</sup></label>
<input name="h_date" type="date" class="form-control form-control-lg <?php echo (!empty($data['h_date_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['h_date']; ?>">
<span class="invalid-feedback"><?php echo $data['h_date_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="user">Учетная запись: <sup>*</sup></label>
<select name="user"  class="form-control">
<?php foreach($data['users'] as $user) : ?>
<option value="<?php echo $user->id; ?>"><?php echo $user->email; ?></option>
<?php endforeach; ?> 
</select>
</div>
<!-- /.form-group -->
<div class="row">
<div class="col-12">
<input type="submit" value="Добавить" class="btn btn-primary">
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