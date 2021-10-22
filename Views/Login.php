<?php $v->layout("__theme");?>


        <form method="POST"  data-action="<?=$router->route("auth.login")?>" class="form-login">
            <h3 class="mb-4">Sign In</h3>
            <div class="alert alert-danger p-2 d-none text-center" id="alert" role="alert">
            A simple danger alert—check it out!
            </div>
            <div class="d-grid gap-2 mb-3">
                <button class="btn btn-light" type="button">
                    <img class="mx-2" width="25" src="<?=assets("assets/images/iconGoogle.svg")?>" />Sign In with Google
                </button>
            </div>
            <div class="text-center">
                <p>Or</p>
            </div>
            <div class="input-group mb-4">
                <i class="fas fa-envelope"></i>
                <input type="email" class="form-control input-email" name="Email" id="InputEmail"/>
            </div>
            <div class="input-group mb-4 position-relative">
                <i class="fas fa-lock"></i>
                <input type="password" class="form-control pass input-password" name="Password" id="InputPassword" />
                <p class="show">Show</p>

            </div>

            <div class="mb-4 form-check flex">
                <input type="checkbox" class="form-check-input" name="check" value="Sim" id="exampleCheck1" />
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div class="mb-4 asides d-flex justify-content-between">
                <a href="<?=$router->route("web.register")?>" title="Forgot password" class="text-decoration-none">Don't have an account?</a>
                <a href="<?=$router->route("web.forgot")?>" title="Forgot password" class="text-decoration-none">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
