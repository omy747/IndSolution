<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="mt-5 mb-3">
<?php flash('post_message'); ?>
</div>
<h1 class="mt-2 mb-3 text-center">Решения</h1>
<div class="row">
<div class="offset-md-4 col-md-4 offset-md-4 col-12">
<form action="<?php echo URLROOT; ?>/dashboard/prods" method="POST"  class="mt-5 mb-3">     
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
    <a class="btn btn-success mb-2" href="<?php echo URLROOT; ?>/dashboard/addprod">Добавить</a>
 <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th class="p-2">#</th>
      <th class="p-2">Название</th>
      <th class="p-2">Количество рабочих мест</th>
      <th class="p-2">Версия</th>  
      <th class="p-2">Цена</th>  
      <th class="p-2">Категория</th>      
      <th class="p-2"></th>
      <th class="p-2"></th>
    </tr>
  </thead>
  <tbody>
<?php $row=0; foreach($data['prods'] as $prod) : ?>
<?php $row++; ?>
    <tr <?php if($row % 2 == 0) echo 'class="table-info"'; ?> >
      <td ><?php echo $row; ?></td>
      <td><?php echo $prod->title; ?></td>
      <td><?php echo $prod->workers; ?></td>
      <td><?php echo $prod->version; ?></td>
      <td><?php echo $prod->price; ?></td>
      <td><?php echo $prod->cat_title; ?></td>               
      <td><a class="btn btn-primary" href="<?php echo URLROOT; ?>/dashboard/editprod/<?php echo $prod->prodId; ?>">Изменить</a></td>
      <td><a class="btn btn-danger" href="<?php echo URLROOT; ?>/dashboard/delprod/<?php echo $prod->prodId; ?>">Удалить</a></td>
    </tr> 
<?php endforeach; ?> 
  </tbody>
</table>
    </div>
 </div> 
<?php require APPROOT.'/views/inc/footer.php'; ?>