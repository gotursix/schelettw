<?php $this->setSiteTitle(''); ?>
<?php $this->start('head'); ?>

<?php $this->end(); ?>
<?php $this->start('body'); ?>
<!-- <h1 class="text-center red">Welcome to the register page!</h1>-->
    <div>
        <h3>Register Here!</h3><br>
        <form action="" method="post">
            <div><?= $this->displayErrors ?></div>
            <div>
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" value="<?=$this->post['fname']?>">
            </div>
            <div>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" value="<?=$this->post['lname']?>">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?=$this->post['email']?>">
            </div>
            <div>
                <label for="username">Choose a username</label>
                <input type="text" id="username" name="username" value="<?=$this->post['username']?>">
            </div>
            <div>
                <label for="password">Choose a password</label>
                <input type="password" id="password" name="password" value="<?=$this->post['password']?>">
            </div>
            <div>
                <label for="confirm">Confirm password</label>
                <input type="password" id="confirm" name="confirm" value="<?=$this->post['confirm']?>">
            </div>
            <div>
                <input type="submit" value="Register">
            </div>
        </form>
    </div>

<?php $this->end(); ?>
