<?php require APPROOT.'/views/inc/header.php'; ?>
<h1 class="mt-5 mb-3 text-center"><?php echo $data['title']; ?></h1>
<p class="lead text-center">
<?php echo $data['description']; ?>
</p>

<div class="row">
    <div class="col-12 text-center">
        <img class="w-50" src="<?php echo URLROOT.'/public/images/bg.png'; ?>" alt="">
    </div>
    <!-- /.col-12 text-center -->
</div>
<!-- /.row -->


<?php require APPROOT.'/views/inc/footer.php'; ?>