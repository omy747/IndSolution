<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="mt-5 mb-3">
<?php flash('post_message'); ?>
</div>
<h1 class="mt-2 mb-3 text-center">Сообщения</h1>
<div class="row">
<div class="offset-md-4 col-md-4 offset-md-4 col-12">
<form action="<?php echo URLROOT; ?>/managers/my_messages" method="POST"  class="mt-5 mb-3">     
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
      <th class="p-2">Текст</th>
      <th class="p-2">Клиент</th>
      <th class="p-2">Дата отправки</th>      
    </tr>
  </thead>
  <tbody>
<?php $row=0; foreach($data['messages'] as $message) : ?>
<?php $row++; ?>
    <tr <?php if($row % 2 == 0) echo 'class="table-info"'; ?> >
      <td ><?php echo $row; ?></td>
      <td><?php echo $message->m_text; ?></td>
      <td><?php echo $message->c_title; ?></td>
      <td><?php echo $message->send_date; ?></td>        
    </tr> 
<?php endforeach; ?> 
  </tbody>
</table>
    </div>
 </div> 
<?php require APPROOT.'/views/inc/footer.php'; ?>