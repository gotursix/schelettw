<?php $this->setSiteTitle('Login'); ?>
<?php $this->start('body'); ?>
<div class="login-page">
    <div class="form">
        <h2 class="text-center-r">Log in</h2>
        <form class="login-form" action="" method="POST">
            <?= FH::csrfInput()?>
            <input type="text" id="username" name="username" value="<?=$this->login->username?>" placeholder="Username"/>
            <input type="password" id="password" name="password" value="<?=$this->login->password?>" placeholder="Password"/>
            <div class="rem">
                <label class="message" for="remember_me">Remember me
                    <input type="checkbox" id="remember_me" name="remember_me" value="on">
                </label>
            </div>
            <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>
            <button type="submit" value="Login">Login</button>
            <p class="message">Not registered? <a href="<?= PROOT ?>register/register">Create an account</a></p>
        </form>
    </div>
</div>
<?php $this->end(); ?>
