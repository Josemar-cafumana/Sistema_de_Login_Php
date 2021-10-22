<?php $v->layout("__theme"); ?>


        <form method="POST"  data-action="<?=$router->route("auth.reset")?>" class="form-reset text-center">
            <h3 class="my-4">Reset password</h3>

            <div class="input-group mb-4">

                <i class="fas fa-lock"></i>
                <input type="password" class="form-control input-password" id="InputPassword" name="Password" aria-describedby="emailHelp"
                    placeholder="New password">
                    <div id="InputPassword" class="invalid-feedback text-start">
       A palavra passe deve contar pelo menos 8 caracteres.
      </div>

            </div>
            <div class="input-group mb-4">

                <i class="fas fa-lock"></i>
                <input type="password" class="form-control input-confpass" id="inputConfPassword" name="ConfPassword" aria-describedby="emailHelp"
                    placeholder="Confirm new password">
                    <div id="InputConfPassword" class="invalid-feedback text-start">
       Confirme a palavra passe.
      </div>
            </div>


            <button type="submit" class="btn btn-primary ">Save</button>

        </form>



 