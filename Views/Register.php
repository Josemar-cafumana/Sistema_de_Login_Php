<?php $v->layout("__theme"); ?>


    <form class="form-login text-center">
      <h3 class="my-4">Create Account</h3>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Your name">
        <label for="floatingInput"> Name</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="password" id="floatingInput" placeholder="password">
        <label for="floatingInput">Password</label>
      </div>

      <div class="form-floating mb-3">
        <input type="password" class="form-control" name="confPassword" id="floatingInput" placeholder="Confirm password">
        <label for="floatingInput">Confirm password</label>
      </div>




      <button type="submit" class="btn btn-primary ">Sign Up</button>

    </form>



 