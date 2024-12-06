<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="row">
<div class="col-md-6 mx-auto">
<div class="card card-body bg-light mt-3">
<h2>Отправить сообщение</h2>
<p>Пожалуйста, заполните форму</p>
<form action="<?php echo URLROOT; ?>/clients/feedback" method="post">
<div class="form-group mb-2">
<label for="mtext">Текст: <sup>*</sup></label>
<textarea name="mtext"  class="form-control form-control-lg <?php echo (!empty($data['text_err'])) ? 'is-invalid' : ''; ?>" > <?php echo $data['text']; ?></textarea>
<span class="invalid-feedback"><?php echo $data['text_err']; ?></span> <!-- /.invalid-feedback -->
</div>
<!-- /.form-group -->
<div class="row">
<div class="col-12">
<input type="submit" value="Отправить" class="btn btn-primary">
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