<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body bg-light mt-3">
<h2>Изменить решение</h2>
<p>Пожалуйста, заполните форму</p>
<form action="<?php echo URLROOT; ?>/dashboard/editprod/<?php echo $data['id']; ?>" method="post">
<div class="form-group mb-2">
<label for="title">Название: <sup>*</sup></label>
<input name="title" type="text" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['title']; ?>">
<span class="invalid-feedback"><?php echo $data['title_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="desc">Описание: <sup>*</sup></label>
<textarea name="desc"  class="form-control form-control-lg <?php echo (!empty($data['desc_err'])) ? 'is-invalid' : ''; ?>" > <?php echo $data['desc']; ?></textarea>
<span class="invalid-feedback"><?php echo $data['desc_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="cat">Категория: <sup>*</sup></label>
<select name="cat"  class="form-control">
<?php $row=0; foreach($data['cats'] as $cat) : ?>
    <option value="<?php echo $cat->catId; ?>"><?php echo $cat->cat_title; ?></option>
<?php endforeach; ?>
</select>
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="workers">Количество рабочих мест <sup>*</sup></label>
<input name="workers" type="number" min="1" max="1000" class="form-control form-control-lg <?php echo (!empty($data['workers_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['workers']; ?>">
<span class="invalid-feedback"><?php echo $data['workers_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="version">Версия: <sup>*</sup></label>
<select name="version"  class="form-control">
<option value="КОРП">КОРП </option>
<option value="ПРОФ">ПРОФ</option>
<option value="базовая">базовая</option>
</select>
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="platform">Платформа: <sup>*</sup></label>
<select name="platform"  class="form-control">
<option value="8.0">8.0 </option>
<option value="8.1">8.1</option>
<option value="7.9">7.9</option>
<option value="7.8">7.8</option>
</select>
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="price">Цена <sup>*</sup></label>
<input name="price" type="number" min="1" max="999999" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value = "<?php echo $data['price']; ?>">
<span class="invalid-feedback"><?php echo $data['price_err']; ?></span> <!-- /.invalid-feedback -->
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