<?php use Core\FH;

$this->setSiteTitle('Edit Question'); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1>Edit question</h1>
    <form class="login-form" action="" method="POST">
        <?= FH::csrfInput() ?>
        <input type="text" id="question" name="question" value="<?= $this->question->question ?>"
               placeholder="Question"/>
        <input type="text" id="photo" name="photo" value="<?= $this->question->answer1 ?>"
               placeholder="Photo"/>
        <input type="text" id="answer1" name="answer1" value="<?= $this->question->answer1 ?>"
               placeholder="Answer 1"/>
        <input type="text" id="answer2" name="answer2" value="<?= $this->question->answer2 ?>"
               placeholder="Answer 2"/>
        <br><br>
        <input type="text" id="answer3" name="answer3" value="<?= $this->question->answer3 ?>"
               placeholder="Answer 3"/>
        <input type="text" id="answer4" name="answer4" value="<?= $this->question->answer4 ?>"
               placeholder="Answer 4"/>
        <input type="text" id="header" name="header" value="<?= $this->question->header ?>"
               placeholder="Header"/>
        <br><br>
        <div class="rem">
            <label class="message" for="correct">Correct answer
                <select id="correct" name="correct">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </label>
        </div>
        <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>
        <button type="submit" value="Save">Save</button>
        <p class="message">Not registered? <a href="<?= PROOT ?>register/register">Create an account</a></p>
    </form>

</div>
<?php $this->end(); ?>