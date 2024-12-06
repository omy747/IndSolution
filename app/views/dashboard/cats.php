<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="mt-5 mb-3">
<?php flash('post_message'); ?>
</div>
<h1 class="mt-2 mb-3 text-center">Категории</h1>
<div class="row">
<div class="offset-md-4 col-md-4 offset-md-4 col-12">
<form action="<?php echo URLROOT; ?>/dashboard/cats" method="POST"  class="mt-5 mb-3">     
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
    <a class="btn btn-success mb-2" href="<?php echo URLROOT; ?>/dashboard/addcat">Добавить</a>
 <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th class="p-2">#</th>
      <th class="p-2">Название</th>
      <th class="p-2">Количество решений</th>
      <th class="p-2">Удаленное подключение</th>      
      <th class="p-2"></th>
      <th class="p-2"></th>
    </tr>
  </thead>
  <tbody>
<?php $row=0; foreach($data['cats'] as $cat) : ?>
<?php $row++; ?>
    <tr <?php if($row % 2 == 0) echo 'class="table-info"'; ?> >
      <td ><?php echo $row; ?></td>
      <td><?php echo $cat->cat_title; ?></td>
      <td><?php echo $cat->p_amount; ?></td>
      <td><?php echo $cat->distance == 1 ? 'Да' : 'Нет'; ?></td>            
      <td><a class="btn btn-primary" href="<?php echo URLROOT; ?>/dashboard/editcat/<?php echo $cat->catId; ?>">Изменить</a></td>
      <td><a class="btn btn-danger" href="<?php echo URLROOT; ?>/dashboard/delcat/<?php echo $cat->catId; ?>">Удалить</a></td>
    </tr> 
<?php endforeach; ?> 
  </tbody>
</table>
    </div>
 </div> 
<?php require APPROOT.'/views/inc/footer.php'; ?>