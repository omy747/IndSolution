<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="mt-5 mb-3">
<?php flash('post_message'); ?>
</div>
<h1 class="mt-2 mb-3 text-center">Клиенты</h1>
<div class="row">
<div class="offset-md-4 col-md-4 offset-md-4 col-12">
<form action="<?php echo URLROOT; ?>/managers/index" method="POST"  class="mt-5 mb-3">     
  <div class="d-flex">      
      <input type="text" class="form-control" name="fsearch">
      <button type="submit" name="search" class="btn btn-primary">Найти</button>
  </div>     
</form>
</div>
<!-- /.offset-md-8 col-md-4 col-12 -->
</div>
<!-- /.row --> 
<a class="btn btn-light mb-2" href="<?php echo URLROOT; ?>/managers/cl_prods">Добавить решение клиенту</a> 
 <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th class="p-2">#</th>
      <th class="p-2">ФИО</th>
      <th class="p-2">Название</th>
      <th class="p-2">Адрес</th>      
      <th class="p-2">Телефон</th>      
      <th class="p-2"></th>      
    </tr>
  </thead>
  <tbody>
<?php $row=0; foreach($data['clients'] as $client) : ?>
<?php $row++; ?>
    <tr <?php if($row % 2 == 0) echo 'class="table-info"'; ?> >
      <td ><?php echo $row; ?></td>
      <td><?php echo $client->last_name." ".$client->first_name." ".$client->patronymic; ?></td>
      <td><?php echo $client->c_title; ?></td>
      <td><?php echo $client->address; ?></td>
      <td><?php echo $client->phone; ?></td>          
      <td><a class="btn btn-primary" href="<?php echo URLROOT; ?>/managers/cl_products/<?php echo $client->clId; ?>">Решения</a></td>
       </tr> 
<?php endforeach; ?> 
  </tbody>
</table>
<?php require APPROOT.'/views/inc/footer.php'; ?>