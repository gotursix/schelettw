<?php $this->setSiteTitle(''); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="login-page">
    <div class="form">
        <h2 class="text-center" style="margin-bottom:15px">Register now!</h2>
        <form class="register-form">
            <input type="text" placeholder="First name"/>
            <input type="text" placeholder="Last name"/>
            <input type="text" placeholder="Email address"/>
            <input type="text" placeholder="Choose a Username"/>
            <input type="password" placeholder="Password"/>
            <input type="password" placeholder="confirm password"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
    </div>
</div>
<!-- <h1 class="text-center red">Welcome to the register page!</h1>-->


<?php $this->end(); ?>
