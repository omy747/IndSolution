<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="mt-5 mb-3">
<?php flash('post_message'); ?>
</div>
<h1 class="mt-2 mb-3 text-center">Решения клиента: <?php echo $data['client']->c_title; ?> </h1>
 <div class="row">
    <div class="col-12">    
 <table class="table table-hover">
  <thead>
    <tr class="table-dark">
      <th class="p-2">#</th>
      <th class="p-2">Название</th>
      <th class="p-2">Количество рабочих мест</th>
      <th class="p-2">Версия</th>  
      <th class="p-2">Цена</th>        
      <th class="p-2">Дата начала</th> 
      <th class="p-2">Дата окончания</th>  
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
      <td><?php echo $prod->s_date; ?></td>    
      <td><?php echo $prod->e_date; ?></td>    
      <td><a class="btn btn-danger" href="<?php echo URLROOT; ?>/managers/delprodfromclient/<?php echo $prod->cpId; ?>">Удалить</a></td>
    </tr> 
<?php endforeach; ?> 
  </tbody>
</table>
    </div>
 </div> 
<?php require APPROOT.'/views/inc/footer.php'; ?>