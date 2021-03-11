<?php $this->setSiteTitle(''); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<!-- <h1 class="text-center red">Welcome to the login page!</h1> -->
 <div>
     <form action="<?PROOT?>register/login" method="post">
         <h3>Log in</h3>
         <div>
             <label for="username">Username</label>
             <input type="text" name="username" id="username">
         </div>
         <div>
             <label for="password">Password</label>
             <input type="password" name="password" id="password">
         </div>
         <div>
             <label for="remember_me">Remember Me <input type="checkbox" id="remember_me" name="remember_me" value=""on></label>
         </div>
         <div>
             <input type="submit" value="Login">
         </div>
         <div>
             <a href="<?=PROOT?>register/register">Register</a>
         </div>
     </form>
 </div>
<?php $this->end(); ?>
