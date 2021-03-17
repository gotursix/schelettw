<?php $this->setSiteTitle('Login'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<!-- <h1 class="text-center red">Welcome to the login page!</h1> -->
<div class="login-page">
    <div class="form">
        <h2 class="text-center-r">Log in</h2>
        <form class="login-form" action="<?=PROOT?>register/login" method="post">
            <input type="text" id="username" placeholder="Username"/>
            <input type="password" id="password" placeholder="Password"/>
            <div class="rem">
                <label class="message" for="remember_me">Remember me</label>
                <input type="checkbox" id="remember_me" name="remember_me" value="on">
            </div>
            <button type="submit" >Login</button>
            <p class="message">Not registered? <a href="<?=PROOT?>register/register">Create an account</a></p>
        </form>
    </div>
</div>
<?php $this->end(); ?>
