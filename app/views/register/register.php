<?php $this->setSiteTitle('Register'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="login-page">
    <div class="form">
        <h2 class="text-center-r">Register now!</h2>
        <form class="register-form" action="" method="post">
            <input type="text" id="fname" placeholder="First name"/>
            <input type="text" id="lname" placeholder="Last name"/>
            <input type="text" id="email" placeholder="Email address"/>
            <input type="text" id="username" placeholder="Choose a Username"/>
            <input type="password" id="password" placeholder="Password"/>
            <input type="password" id="confirm" placeholder="Confirm password"/>
            <button type="submit">Register</button>
            <p class="message">Already registered? <a href="<?=PROOT?>register/login">Sign In</a></p>
        </form>
    </div>
</div>
<!-- <h1 class="text-center red">Welcome to the register page!</h1>-->


<?php $this->end(); ?>
