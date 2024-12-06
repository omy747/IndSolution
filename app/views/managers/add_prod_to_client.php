<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body bg-light mt-3">
<h2>Добавить решение клиенту</h2>
<p>Пожалуйста, заполните форму</p>
<form action="<?php echo URLROOT; ?>/managers/cl_prods" method="post">
<div class="form-group mb-2">
<label for="cl">Клиент: <sup>*</sup></label>
<select name="cl"  class="form-control">
<?php $row=0; foreach($data['clients'] as $client) : ?>
    <option value="<?php echo $client->clId; ?>"><?php echo $client->c_title; ?></option>
<?php endforeach; ?>
</select>
</div>
<!-- /.form-group -->
<div class="form-group mb-2">
<label for="prod">Решение: <sup>*</sup></label>
<select name="prod"  class="form-control">
<?php $row=0; foreach($data['prods'] as $prod) : ?>
    <option value="<?php echo $prod->prodId; ?>"><?php echo $prod->title; ?></option>
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