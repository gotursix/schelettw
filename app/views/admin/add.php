<?php use Core\FH;

$this->setSiteTitle('Add Question'); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1>Add question</h1>
    <form class="login-form" action="" method="POST">
        <?= FH::csrfInput() ?>
        <input type="text" id="question" name="question"
               placeholder="Question"/>
        <input type="text" id="photo" name="photo"
               placeholder="Photo"/>
        <input type="text" id="answer1" name="answer1"
               placeholder="Answer 1"/>
        <input type="text" id="answer2" name="answer2"
               placeholder="Answer 2"/>
        <br><br>
        <input type="text" id="answer3" name="answer3"
               placeholder="Answer 3"/>
        <input type="text" id="answer4" name="answer4"
               placeholder="Answer 4"/>
        <input type="text" id="header" name="header"
               placeholder="Header"/>
        <br><br>

        <!-- TODO: Refactor -->
        <div class="rem">
            <label class="message" for="correct">Correct answer
                <select id="correct" name="correct">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </label>
            <label class="message" for="continent">Continent
                <select id="continent" name="continent">
                    <option value="Europe">Europe
                    </option>
                    <option value="America">
                        America
                    </option>
                    <option value="Asia">Asia
                    </option>
                    <option value="Africa">Africa
                    </option>
                    <option value="Australia">
                        Australia
                    </option>
                </select>
            </label>
        </div>
        <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>
        <button type="submit" value="Save">Save</button>
    </form>
    <a href="<?= PROOT ?>admin" class="button">Cancel</a>
</div>
<?php $this->end(); ?>
