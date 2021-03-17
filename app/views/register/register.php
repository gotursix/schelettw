<?php $this->setSiteTitle('Register'); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="login-page">
    <div class="form">
        <h2 class="text-center-r">Register now!</h2>
        <form class="register-form" action="" method="post">
            <input type="text" id="fname" name="fname" value="<?=$this->post['fname']?>" placeholder="First name"/>
            <input type="text" id="lname" name="lname" value="<?=$this->post['lname']?>" placeholder="Last name"/>
            <input type="text" id="email" name="email" value="<?=$this->post['email']?>" placeholder="Email address"/>
            <input type="text" id="username" name="username" value="<?=$this->post['username']?>" placeholder="Choose a Username"/>
            <input type="password" id="password" name="password" value="<?=$this->post['password']?>" placeholder="Password"/>
            <input type="password" id="confirm" name="confirm" value="<?=$this->post['confirm']?>" placeholder="Confirm password"/>
            <div class="bg-danger"><?= $this->displayErrors ?></div>
            <button type="submit">Register</button>
            <p class="message">Already registered? <a href="<?=PROOT?>register/login">Sign In</a></p>
        </form>
    </div>
</div>
<!-- <h1 class="text-center red">Welcome to the register page!</h1>-->


<?php $this->end(); ?>
