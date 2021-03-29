<?php $this->setSiteTitle('Instructions'); ?>
<?php $this->start('body'); ?>
<div class="container text-center center"  >
    <h1 class="red">What is Game of fruits?</h1>
        <br>
    <p>
        Game of fruits is the best way for you to learn the fruits and the vegetables that are much needed in our diets. It’s a simple and fun game with 3 levels of difficulty that will tickle your competitive nature.
    </p>
    <h1 class="red">How to play?</h1>
        <br>
    <p>Select the difficulty</p>
        <br>

    <a href="#" class="difficulty-button button-easy" >Easy</a>
    <a href="#" class="difficulty-button button-medium" >Medium</a>
    <a href="#" class="difficulty-button button-hard" >Hard</a>
        <br><br>
    <p>After you selected the difficulty the game will start</p><br>
    <img src="<?= PROOT ?>img/watermelone.jpg" alt="watermelone" class="game-image">
        <br><br>
    <button id="buttonPurple">pumpkin</button>
    <button id="buttonPurple">Kiwi</button><br>
    <button id="buttonPurple">Watermelone</button>
    <button id="buttonPurple">Cucumbern</button>
        <br><br>
    <p>What are the differences between different difficulties levels</p><br>
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
    <button id="buttonGreen">Second button</button>
    <button id="buttonRed">Third button</button>
    -->
    <br><br><br><br><br>
</div>

<?php $this->end(); ?>
