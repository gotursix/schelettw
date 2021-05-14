<?php $this->setSiteTitle('Instructions'); ?>
<?php $this->start('head'); ?>
<script src="<?= PROOT ?>js/instructionScript.js" defer></script>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="container content text-center center margin-btm"  >
    <h1 class="red">What is Game of fruits?</h1>
        <br>
    <p>
        Game of fruits is the best way for you to learn the fruits and the vegetables that are much needed in our diets. It’s a simple and fun game with 3 levels of difficulty that will tickle your competitive nature.
    </p>
    <h1 data-remove="remove" class="red">How to play?</h1>
        <br>
    <p data-remove="remove">Select the difficulty</p>
        <br>
    <div class="container-buttons" id="diff-buttons">
        <a id="easy" href="#" class="difficulty-button-instruction difficulty-button button-easy" >Easy</a>
        <a id="medium" href="#" class="difficulty-button-instruction difficulty-button button-medium" >Medium</a>
        <a id="hard" href="#" class="difficulty-button-instruction difficulty-button button-hard" >Hard</a>
    </div>
        <br><br>
    <p data-remove="remove">After you selected the difficulty the game will start</p><br>
    <img src="<?= PROOT ?>img/watermelone.jpg" alt="watermelone" class="game-image">
        <br><br>
    <button data-modal-target="#modal" id="wrong-answer1" class="buttonPurple" >Pumpkin</button>
    <button data-modal-target="#modal" id="wrong-answer2" class="buttonPurple" >Kiwi</button><br>
    <button data-modal-target="#modal" id="correct-answer" class="buttonPurple">Watermelone</button>
    <button data-modal-target="#modal" id="wrong-answer3" class="buttonPurple">Cucumbern</button>

    <div data-remove="remove" class="modal" id="modal">
        <div class="modal-header">
            <div class="title">Please select a difficulty!</div>
            <button data-close-button class="close-button">&times;</button>
        </div>
    </div>
    <div id="overlay"></div>

        <br><br>
    <p>What are the differences between the difficulties?</p><br>
    <ul class="no-bullets">
        <li>
            <p><b>Easy level</b></p><br>
            <ul class="no-bullets">
                <li>You have 3 lives</li>
                <li>The fruits and vegetables are the most common ones</li>
                <li>When you choose a wrong variant you will see the correct one with a green background and you will lose one live</li>
            </ul>
        </li>

        <li>
            <br><p><b>Medium level</b></p><br>
            <ul class="no-bullets">
                <li>You have 3 lives</li>
                <li>You will have to guess less common fruits and vegetables</li>
                <li>When you will choose a wrong answer you won't get the right answer anymore and you will lose one live</li>
            </ul>
        </li>
        <li>
            <br><p><b>Hard level</b></p><br>
            <ul class="no-bullets"><li>You will have to guess from exotic fruits and vegetables</li></ul>
        </li>
    </ul>
    <!--
    <button class="buttonGreen">Second button</button>
    <button class="buttonRed">Third button</button>
    -->
    <br>
</div>

<?php $this->end(); ?>
