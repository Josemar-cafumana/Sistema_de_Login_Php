
    <?php $v->layout("__theme"); ?>

 

  <div class="px-3 w-50 text-center">
    <h1 class="fs-1 text-light">Cover your page.</h1>
    <p class="fs-5 ">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>
    <p class="lead">
      <?php if(!isset($_SESSION["user"])): ?>
      <a href="<?= $router->route("web.login") ?>" class="btn btn-lg btn-secondary  bg-dark">Fazer Login</a>
      <?php else: ?>
        <a href="<?= $router->route("web.login") ?>" class="btn btn-lg btn-secondary  bg-dark">Sair</a>
        <?php endif; ?>
    </p>
</div>

 



