<?php $v->layout("__theme"); ?>


        <form method="POST"  data-action="<?= $router->route("auth.forgot") ?>" class="text-center form-forgot">
            <h3 class="my-4">Forgot Password?</h3>
            <p>Please enter your email adress and we will send you a link to reset your password.</p>

            <div class="input-group mb-4">

               <i class="fas fa-envelope"></i>
                <input type="email" class="form-control " id="exampleInputEmail1 input-email" name="Email" aria-describedby="emailHelp"
                    placeholder="Email adress">

            </div>


            <button type="submit" class="btn btn-primary ">Reset Password</button>

        </form>



 