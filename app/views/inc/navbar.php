<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><img width="40" src="<?php echo URLROOT.'/public/images/logo.png'; ?>" alt="support"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
      <?php if(isset($_SESSION['user_id'])) {
        if($_SESSION['user_role'] == "admin") {
          ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/dashboard/users">Пользователи</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/dashboard/emps">Сотрудники</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/dashboard/cats">Категории</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/dashboard/prods">Решения</a>
        </li> 
          <?php
        }
        elseif($_SESSION['user_role'] == "emp") {
          ?>
                   
          <?php
        }
        elseif($_SESSION['user_role'] == "user") {
          ?>
           
          <?php
        }
      } ?>
      </ul>
      <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['user_id'])) 
      {
        echo '<li class="nav-item">
      <a class="nav-link" href="#">Добро пожаловать, '.$_SESSION['user_email'].'</a>
    </li>';
        echo '<li class="nav-item">
        <a class="nav-link" href="'.URLROOT.'/users/logout">Выход</a>
      </li>';      
      }
    else
     {
      echo '<li class="nav-item">
        <a class="nav-link" href="'.URLROOT.'/users/login">Авторизация</a>
      </li>'; 
      echo '<li class="nav-item">
      <a class="nav-link" href="'.URLROOT.'/users/login">Регистрация</a>
    </li>'; 
      }
    ?></ul>   
    </div>
  </div>
</nav>


