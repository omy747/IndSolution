<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="mt-5 mb-3">
<?php flash('post_message'); ?>
</div>
<h1 class="mt-2 mb-3 text-center">Мои решения</h1>
<div class="row">
<div class="offset-md-4 col-md-4 offset-md-4 col-12">
<form action="<?php echo URLROOT; ?>/clients/my_prods" method="POST"  class="mt-5 mb-3">     
  <div class="d-flex">      
      <input type="text" class="form-control" name="fsearch">
      <button type="submit" name="search" class="btn btn-primary">Найти</button>
  </div>     
</form>
</div>
<!-- /.offset-md-8 col-md-4 col-12 -->
</div>
<!-- /.row -->
 <div class="row">
    <div class="offset-md-1 col-md-10 offset-md-1 col-12">    
 <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th class="p-2">#</th>
      <th class="p-2">Название</th>
      <th class="p-2">Дата покупки</th>
      <th class="p-2">Дата окончания лицензии</th> 
    </tr>
  </thead>
  <tbody>
<?php $row=0; foreach($data['prods'] as $prod) : ?>
<?php $row++; ?>
    <tr <?php if($row % 2 == 0) echo 'class="table-info"'; ?> >
      <td ><?php echo $row; ?></td>
      <td><?php echo $prod->title; ?></td>
      <td><?php echo $prod->s_date; ?></td>
      <td><?php echo $prod->e_date; ?></td>  
    </tr> 
<?php endforeach; ?> 
  </tbody>
</table>
    </div>
 </div> 
<?php require APPROOT.'/views/inc/footer.php'; ?>