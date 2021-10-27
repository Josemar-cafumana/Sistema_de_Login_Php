
    <?php $v->layout("__theme"); ?>

 


  <div class="px-3 w-80 text-center">
    <h1 class="fs-1 text-light">Seja Bem-vindo <?= $list["name"] ?></h1>
    <p class="fs-5 ">Login com Php7.</p>
    <p class="lead">
     
      <a href="<?= $router->route("web.sair") ?>" class="btn btn-lg btn-secondary  bg-dark">Logout</a>
      
    </p>
</div>




 



