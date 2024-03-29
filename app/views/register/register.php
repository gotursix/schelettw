<?php

use Core\FH;

?>
<?php $this->setSiteTitle('Register'); ?>
<?php $this->start('body'); ?>
<div class="container">
    <div class="login-page">
        <div class="form">
            <h2 class="text-center-r">Register now!</h2>
            <form class="register-form" action="#" method="POST">
                <script>document.querySelector("form").setAttribute("action", "")</script>
                <?= FH::csrfInput() ?>
                <input type="text" id="fname" name="fname" value="<?= $this->newUser->fname ?>"
                       placeholder="First name"/>
                <input type="text" id="lname" name="lname" value="<?= $this->newUser->lname ?>"
                       placeholder="Last name"/>
                <input type="text" id="email" name="email" value="<?= $this->newUser->email ?>"
                       placeholder="Email address"/>
                <input type="text" id="username" name="username" value="<?= $this->newUser->username ?>"
                       placeholder="Choose a Username"/>
                <input type="password" id="password" name="password" value="<?= $this->newUser->password ?>"
                       placeholder="Password"/>
                <input type="password" id="confirm" name="confirm" value="<?= $this->newUser->getConfirm() ?>"
                       placeholder="Confirm password"/>

                <label for="correct">Choose a character</label><select id="correct" name="photoId">
                    <option value="1">
                        Sponge Bob
                    </option>
                    <option value="2">
                        Jhonny Bravo
                    </option>
                    <option value="3">
                        Candace
                    </option>
                    <option value="4">
                        Powerful girls
                    </option>
                </select>
                <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>
                <button class="mrg-top" type="submit">Register</button>
                <p class="message">Already registered? <a href="<?= PROOT ?>register/login">Sign In</a></p>
            </form>
        </div>
    </div>
</div>


<?php $this->end(); ?>
