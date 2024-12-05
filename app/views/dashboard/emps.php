<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="mt-5 mb-3">
<?php flash('post_message'); ?>
</div>
<h1 class="mt-2 mb-3 text-center">Сотрудники</h1>
<div class="row">
<div class="offset-md-4 col-md-4 offset-md-4 col-12">
<form action="<?php echo URLROOT; ?>/dashboard/emps" method="POST"  class="mt-5 mb-3">     
  <div class="d-flex">      
      <input type="text" class="form-control" name="fsearch">
      <button type="submit" name="search" class="btn btn-primary">Найти</button>
  </div>     
</form>
</div>
<!-- /.offset-md-8 col-md-4 col-12 -->
</div>
<!-- /.row --> 
<a class="btn btn-light mb-2" href="<?php echo URLROOT; ?>/dashboard/addemp">Добавить</a> 
 <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th class="p-2">#</th>
      <th class="p-2">ФИО</th>
      <th class="p-2">Должность</th>
      <th class="p-2">Подразделение</th>
      <th class="p-2">Дата найма</th> 
      <th class="p-2"></th>
      <th class="p-2"></th>
    </tr>
  </thead>
  <tbody>
<?php $row=0; foreach($data['emps'] as $emp) : ?>
<?php $row++; ?>
    <tr <?php if($row % 2 == 0) echo 'class="table-info"'; ?> >
      <td ><?php echo $row; ?></td>
      <td><?php echo $emp->lname." ".$emp->fname." ".$emp->patr; ?></td>
      <td><?php echo $emp->place; ?></td>
      <td><?php echo $emp->department; ?></td>
      <td><?php echo $emp->h_date; ?></td>    
      <td><a class="btn btn-primary" href="<?php echo URLROOT; ?>/dashboard/editemp/<?php echo $emp->empId; ?>">Изменить</a></td>
      <td><a class="btn btn-danger" href="<?php echo URLROOT; ?>/dashboard/delEmp/<?php echo $emp->empId; ?>">Удалить</a></td>
       </tr> 
<?php endforeach; ?> 
  </tbody>
</table>
<?php require APPROOT.'/views/inc/footer.php'; ?>