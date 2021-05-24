<?php
use Core\FH;
?>
<?php $this->setSiteTitle('Register'); ?>
<?php $this->start('body'); ?>
<div class="container">
    <div class="login-page">
        <div class="form">
            <h2 class="text-center-r">Register now!</h2>
            <form class="register-form" action="" method="post">
                <?= FH::csrfInput()?>
                <input type="text" id="fname" name="fname" value="<?=$this->newUser->fname?>" placeholder="First name"/>
                <input type="text" id="lname" name="lname" value="<?=$this->newUser->lname?>" placeholder="Last name"/>
                <input type="text" id="email" name="email" value="<?=$this->newUser->email?>" placeholder="Email address"/>
                <input type="text" id="username" name="username" value="<?=$this->newUser->username?>" placeholder="Choose a Username"/>
                <input type="password" id="password" name="password" value="<?=$this->newUser->password?>" placeholder="Password"/>
                <input type="password" id="confirm" name="confirm" value="<?=$this->newUser->getConfirm()?>" placeholder="Confirm password"/>
                <label class="message" for="photoId">Choose a profile photo
                    <select id="correct" name="photoId">
                        <option value="1" >
                            <img src="<?=PROOT?>img/default1.png" class="profilePhotoOption" alt="Sponge Bob">
                            Sponge Bob
                        </option>
                        <option value="2">
                            <img src="<?=PROOT?>img/default2.png" class="profilePhotoOption" alt="Jhonny Bravo">
                            Jhonny Bravo
                        </option>
                        <option value="3">
                            <img src="<?=PROOT?>img/default3.png" class="profilePhotoOption" alt="Candace">
                            Candace
                        </option>
                        <option value="4">
                            <img src="<?=PROOT?>img/default4.png" class="profilePhotoOption" alt="Powerpuff girls">
                            Powerpuff girls
                        </option>
                    </select>
                </label>
                <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>
                <button type="submit">Register</button>
                <p class="message">Already registered? <a href="<?=PROOT?>register/login">Sign In</a></p>
            </form>
        </div>
    </div>
</div>


<?php $this->end(); ?>
