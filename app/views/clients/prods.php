<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="mt-5 mb-3">
<?php flash('post_message'); ?>
</div>
<h1 class="mt-2 mb-3 text-center">Каталгог решений</h1>
<div class="row">
<div class="offset-md-4 col-md-4 offset-md-4 col-12">
<form action="<?php echo URLROOT; ?>/clients/prods" method="POST"  class="mt-5 mb-3">     
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
    <div class="offset-md-1 col-md-10 offset-md-1 col-12 d-flex flex-wrap justify-content-between">     
    <?php foreach($data['prods'] as $prod) : ?>
    <div class="card mb-3" style="width: 30%;">
  <div class="card-header fs-4"> <?php echo $prod->title; ?>  </div>  
  <div class="card-body">    
    <p class="card-text"> <span class="fw-bold">Категория: </span>  <?php echo $prod->cat_title; ?></p>
  </div>
  <div class="card-body">    
    <p class="card-text"><span class="fw-bold">Цена: </span> <span class="fs-5 badge rounded-pill bg-info"><?php echo $prod->price; ?></span> p.</p>
  </div>
  <div class="card-body">    
    <p class="card-text"><span class="fw-bold">Количество рабочих мест: </span> <?php echo $prod->workers; ?></p>
  </div>  
  <div class="card-body">    
    <p class="card-text"><span class="fw-bold">Описание: </span> <?php echo $prod->descr; ?></p>
  </div>  
</div>
    <?php endforeach; ?>   
    </div>
 </div> 
<?php require APPROOT.'/views/inc/footer.php'; ?>