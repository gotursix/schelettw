<?php use Core\FH;

$this->setSiteTitle('Add Question'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/admin.css">
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1 class="purple">Add question</h1>
    <form class="question-form" action="" method="POST" >
        <?= FH::csrfInput() ?>
        <div class="form__group">
        <textarea type="text" id="question" name="question"
                  placeholder="Question" class="form__input resize resize-question"></textarea>
        <input type="text" id="photo" name="photo"
               placeholder="Photo" class="form__input"/>
        <input type="text" id="answer1" name="answer1"
               placeholder="Answer 1" class="form__input"/>
        <input type="text" id="answer2" name="answer2"
               placeholder="Answer 2" class="form__input"/>
        <input type="text" id="answer3" name="answer3"
               placeholder="Answer 3" class="form__input"/>
        <input type="text" id="answer4" name="answer4"
               placeholder="Answer 4" class="form__input"/>
        <textarea type="text" id="header" name="header"
                  placeholder="Story" class="form__input resize" ></textarea>


        <div class="rem">
            <label class="message form__label" for="correct">Correct answer
                <select id="correct" name="correct">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </label>
            <label class="message form__label" for="continent">Continent
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
        <button type="submit" value="Save" class="crud-button primary save margin-1">Save</button>
        </div>
        <a href="<?= PROOT ?>admin" class="crud-button primary cancel">Cancel</a>
    </form>

</div>
<?php $this->end(); ?>
