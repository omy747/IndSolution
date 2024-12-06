<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body bg-light mt-3">
<h2>Изменить запись о категории</h2>
<p>Пожалуйста, заполните форму</p>
<form action="<?php echo URLROOT; ?>/dashboard/editcat/<?php echo $data['id']; ?>" method="post">
<div class="form-group mb-2">
<label for="title">Название: <sup>*</sup></label>
<input name="title" type="text" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['title']; ?>">
<span class="invalid-feedback"><?php echo $data['title_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="desc">Описание: <sup>*</sup></label>
<input name="desc" type="text" class="form-control form-control-lg <?php echo (!empty($data['desc_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['desc']; ?>">
<span class="invalid-feedback"><?php echo $data['desc_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="amount">Количество решений <sup>*</sup></label>
<input name="amount" type="number" min="1" max="1000" class="form-control form-control-lg <?php echo (!empty($data['amount_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['amount']; ?>">
<span class="invalid-feedback"><?php echo $data['amount_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="dist">Удаленное подключение: <sup>*</sup></label>
<select name="dist"  class="form-control">
<option value="1">Да</option>
<option value="0">Нет</option>
</select>
</div>
<!-- /.form-group -->
<div class="row">
<div class="col-12">
<input type="submit" value="Изменить" class="btn btn-primary">
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