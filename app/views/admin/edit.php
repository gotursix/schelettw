<?php use Core\FH;

$this->setSiteTitle('Edit Question'); ?>
<?php $this->start('head'); ?>
<link rel="stylesheet" href="<?= PROOT ?>css/admin.css">
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content center text-center">
    <h1 class="purple">Edit question</h1>
    <form class="question-form" action="" method="POST">
        <?= FH::csrfInput() ?>
        <div class="form__group">
        <textarea type="text" id="question" name="question"
                  placeholder="Question"
                  class="form__input resize resize-question"><?= $this->question->question ?></textarea>
            <input type="text" id="photo" name="photo" value="<?= $this->question->answer1 ?>"
                   placeholder="Photo" class="form__input"/>
            <input type="text" id="answer1" name="answer1" value="<?= $this->question->answer1 ?>"
                   placeholder="Answer 1" class="form__input"/>
            <input type="text" id="answer2" name="answer2" value="<?= $this->question->answer2 ?>"
                   placeholder="Answer 2" class="form__input"/>
            <input type="text" id="answer3" name="answer3" value="<?= $this->question->answer3 ?>"
                   placeholder="Answer 3" class="form__input"/>
            <input type="text" id="answer4" name="answer4" value="<?= $this->question->answer4 ?>"
                   placeholder="Answer 4" class="form__input"/>
            <textarea type="text" id="header" name="header"
                      placeholder="Header" class="form__input resize"><?= $this->question->header ?></textarea>

            <div class="rem">
                <label class="message" for="correct">Correct answer
                    <select id="correct" name="correct">
                        <option value="1" <?php if ($this->question->correct == 1) echo "selected" ?>>1</option>
                        <option value="2" <?php if ($this->question->correct == 2) echo "selected" ?>>2</option>
                        <option value="3" <?php if ($this->question->correct == 3) echo "selected" ?>>3</option>
                        <option value="4" <?php if ($this->question->correct == 4) echo "selected" ?>>4</option>
                    </select>
                </label>
                <label class="message" for="continent">Continent
                    <select id="continent" name="continent">
                        <option value="Europe" <?php if ($this->question->continent == "Europe") echo "selected" ?>>
                            Europe
                        </option>
                        <option value="America" <?php if ($this->question->continent == "America") echo "selected" ?>>
                            America
                        </option>
                        <option value="Asia" <?php if ($this->question->continent == "Asia") echo "selected" ?>>Asia
                        </option>
                        <option value="Africa" <?php if ($this->question->continent == "Africa") echo "selected" ?>>
                            Africa
                        </option>
                        <option
                            value="Australia" <?php if ($this->question->continent == "Australia") echo "selected" ?>>
                            Australia
                        </option>
                    </select>
                </label>
            </div>
            <div class="bg-danger"><?= FH::displayErrors($this->displayErrors) ?></div>

            <button type="submit" value="Save" class="crud-button primary save">Save</button>

        </div>
        <a href="<?= PROOT ?>admin" class="crud-button primary cancel">Cancel</a>
    </form>
</div>
<?php $this->end(); ?>
