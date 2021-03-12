<?php $this->setSiteTitle(''); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<!-- <h1 class="text-center red">Welcome to the login page!</h1> -->
 <div class="login-div">
     <form action="<?PROOT?>register/login" method="post">
         <h2 class="text-center">Log in</h2>
         <div class="text-center margins-form">
             <label for="username">Username</label>
             <input type="text" name="username" id="username">
         </div>
         <div class="text-center margins-form">
             <label for="password">Password</label>
             <input type="password" name="password" id="password">
         </div>
         <div class="remember-me" >
             <label for="remember_me">Remember Me <input type="checkbox" id="remember_me" name="remember_me" value=""on></label>
         </div>
         <div>
             <input type="submit" value="Login">
         </div>
         <div class="text-center line-block-reg">
             <a href="<?=PROOT?>register/register">Register</a>
         </div>
     </form>
 </div>
<?php $this->end(); ?>
