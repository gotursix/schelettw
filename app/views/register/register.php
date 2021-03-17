<?php $this->setSiteTitle('Register'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="login-page">
    <div class="form">
        <h2 class="text-center">Register now!</h2>
        <form class="register-form">
            <input type="text" placeholder="First name"/>
            <input type="text" placeholder="Last name"/>
            <input type="text" placeholder="Email address"/>
            <input type="text" placeholder="Choose a Username"/>
            <input type="password" placeholder="Password"/>
            <input type="password" placeholder="Confirm password"/>
            <button>create</button>
            <p class="message">Already registered? <a href="<?=PROOT?>register/login">Sign In</a></p>
        </form>
    </div>
</div>
<!-- <h1 class="text-center red">Welcome to the register page!</h1>-->


<?php $this->end(); ?>
