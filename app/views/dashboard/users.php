<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="mt-5 mb-3">
<?php flash('post_message'); ?>
</div>
<a class="btn btn-light mb-2" href="<?php echo URLROOT; ?>/dashboard/index">Назад</a>
<h1 class="mt-2 mb-3 text-center">Пользователи</h1>
<div class="row">
<div class="offset-md-4 col-md-4 offset-md-4 col-12">
<form action="<?php echo URLROOT; ?>/dashboard/users" method="POST"  class="mt-5 mb-3">     
  <div class="d-flex">      
      <input type="text" class="form-control" name="fsearch">
      <button type="submit" name="search" class="btn btn-primary">Найти</button>
  </div>     
</form>
</div>
<!-- /.offset-md-8 col-md-4 col-12 -->
</div>
<!-- /.row -->
 <a class="btn btn-success mb-2" href="<?php echo URLROOT; ?>/dashboard/adduser">Добавить</a>
 <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th class="p-2">#</th>
      <th class="p-2">Почта</th>
      <th class="p-2">Роль</th>
      <th class="p-2">Логин</th>
      <th class="p-2">Группа</th>
      <th class="p-2">Дата регистрации</th>
      <th class="p-2">Дата смены пароля</th>
      <th class="p-2"></th>
      <th class="p-2"></th>
    </tr>
  </thead>
  <tbody>
<?php $row=0; foreach($data['users'] as $user) : ?>
<?php $row++; ?>
    <tr <?php if($row % 2 == 0) echo 'class="table-info"'; ?> >
      <td ><?php echo $row; ?></td>
      <td><?php echo $user->email; ?></td>
      <td><?php echo $user->role; ?></td>
      <td><?php echo $user->login; ?></td>
      <td><?php echo $user->u_group; ?></td>
      <td><?php echo $user->reg_date; ?></td>
      <td><?php echo $user->p_upd_date	; ?></td>      
      <td><a class="btn btn-primary" href="<?php echo URLROOT; ?>/dashboard/changerules/<?php echo $user->id; ?>">Изменить</a></td>
      <td><a class="btn btn-danger" href="<?php echo URLROOT; ?>/dashboard/delete/<?php echo $user->id; ?>">Удалить</a></td>
    </tr> 
<?php endforeach; ?> 
  </tbody>
</table>
<?php require APPROOT.'/views/inc/footer.php'; ?>