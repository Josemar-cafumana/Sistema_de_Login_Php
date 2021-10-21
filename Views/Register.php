<?php $v->layout("__theme"); ?>


    <form autocomplete="off" method="POST" data-action="<?= $router->route("auth.register") ?>" class="form-register text-center">
      <h3 class="my-4">Create Account</h3>

      <div class="form-floating mb-3">
        <input type="text" class="form-control input-name" name="Name" id="floatingInputName" aria-describedby="floatingInputName" placeholder="Your name" required>
        <label for="floatingInputName"> Name</label>
        <div id="floatingInputName" class="invalid-feedback text-start">
        Informe um nome.
      </div>
        
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control input-email" name="Email" id="floatingInputEmail"  aria-describedby="floatingInputEmail" placeholder="name@example.com" required>
        <label for="floatingInputEmail">Email address</label>
        <div id="floatingInputEmail" class="invalid-feedback text-email text-start">
        Informe um endereço de email válido.
      </div>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control input-password" name="Password" id="floatingInputPassword"  aria-describedby="floatingInputPassword" placeholder="password" required>
        <label for="floatingInputPassword">Password</label>
        <div id="floatingInputPassword" class="invalid-feedback text-start">
       A palavra passe deve contar pelo menos 8 caracteres.
      </div>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control input-confpass" name="ConfPassword" aria-describedby="floatingInputPassword" id="floatingInputConf" placeholder="Confirm password" required>
        <label for="floatingInputConf">Confirm password</label>
        <div id="floatingInputConf" class="invalid-feedback text-start">
       Confirme a palavra passe.
      </div>
      </div>




      <button type="submit" class="btn btn-primary ">Sign Up</button>

    </form>



 