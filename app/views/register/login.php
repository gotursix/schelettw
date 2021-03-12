<?php $this->setSiteTitle(''); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<!-- <h1 class="text-center red">Welcome to the login page!</h1> -->
<div class="login-page">
    <div class="form">
        <h2 class="text-center" style="margin-bottom:15px">Log in</h2>
        <form class="login-form" action="<?PROOT?>register/login" method="post">
            <input type="text" placeholder="Username"/>
            <input type="password" placeholder="Password"/>
            <button>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
        </form>
    </div>
</div>
<?php $this->end(); ?>
