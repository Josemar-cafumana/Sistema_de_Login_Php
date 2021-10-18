<?php $v->layout("__theme"); ?>


    <form autocomplete="off" method="POST" data-action="<?= $router->route("auth.register") ?>" class="form-register text-center">
      <h3 class="my-4">Create Account</h3>

      <div class="form-floating mb-3">
        <input type="text" class="form-control input-name" name="Name" id="floatingInput" placeholder="Your name">
        <label for="floatingInput"> Name</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control input-email" name="Email" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control input-password" name="Password" id="floatingInput" placeholder="password">
        <label for="floatingInput">Password</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control input-confpass" name="ConfPassword" id="floatingInput" placeholder="Confirm password">
        <label for="floatingInput">Confirm password</label>
      </div>




      <button type="submit" class="btn btn-primary ">Sign Up</button>

    </form>



 