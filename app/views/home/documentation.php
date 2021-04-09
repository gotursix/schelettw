<?php $this->setSiteTitle('Documentation'); ?>
<?php $this->start('body'); ?>
<div class="container center margin-btm">
    <h1 class="text-center red">Documentation</h1>
    <br>
    <br>
    <h2>1. Abstract</h2>
    <p>
        This document describes the development of the project Game of Fruits, an educational web game,
        having as its main purpose helping kids to learn the name of the fruits/legumes in an interactive
        and fun manner, having multiple levels of difficulty.
    </p>


    <h2>2. Introduction</h2>
    <p>
        It’s a known issue that nowadays people eat less and less healthy (especially fruits and vegetables) as
        during
        the lockdowns it got way more convenient to eat fast food while working from home or doing online classes. This
        issue gets even worse when we talk about young kids that do the same and end up developing eating disorders.
        Also, online school removes a lot of the fun from learning, especially for young kids that learn fewer things
        during online classes because of the lack of interaction. This is where our interactive game comes in, to help
        kids learn the name of the fruits and vegetables.<br>
        The game is focused on learning in a fun manner having multiple levels of difficulty and a rewarding system with
        points. The specifications of levels are :
    </p>

    <ul class="margin-1">
        <li> Easy level:</li>
        You have 3 lives at your disposal, you lose one when you choose a wrong answer. If you did not get the right
        answer the first time the game will show you the correct answer.
        The fruits and vegetables will be the most common ones that we see and eat each day.

        <li>Medium level:</li>
        You also have 3 lives but this time the game will not give you the correct answer until you lost all of your
        lives. Also, fruits and vegetables become less common.

        <li>Hard level:</li>
        The scoring and the lives system are the same as the ones from the medium level, the difference is in having to
        guess more exotic fruits and vegetables.
    </ul>


    <h2 class="margin-1">3. Overall description</h2>
    <h3>3.1 Product perspective</h3>
    <p>
        Our application is a game that depends on the external Unsplash API for receiving photos
        <!--//TODO: photo goes here-->
    </p>

    <h3>3.2 Product functions</h3>
    <ul class="margin-1">
        <li>register</li>
        <li>login/logout</li>
        <li>multi-language support</li>
        <li>rankings as a page and as an RSS flux</li>
        <li>instructions page (live example of the game)</li>
        <li>play the game</li>
    </ul>

    <h3 class="margin-1">3.3 User classes and characteristics</h3>
    <ul class="margin-1">
        <li>Logged in users</li>
        <ul>
            <li>
                can access every page of the web app except login and register
            </li>
        </ul>
        <li>Logged out users</li>
        <ul>
            <li>can access register, login, instructions, and rankings</li>
            <li>can’t access log out and the game</li>
        </ul>
    </ul>


    <h3>3.4 Operating environment</h3>
    <p>
        The application will be hosted on an online server and it will be accessible from any browser supporting
        javascript, html5 and css3.
    </p>


    <h3>3.5 Design and implementation constraints</h3>
    <ul class="margin-1">
        <li>The design pattern used is MVC</li>
        <li>The database solution is MariaDB</li>
        <li>The programming languages used are PHP, javascript and SQL</li>
        <li>Technologies used: HTML, CSS</li>
    </ul>

    <h3 class="margin-1">3.6 User Documentation</h3>
    <p>
        The instruction page describes how the game works and how to play it. Also, it contains a live demo of the game.
    </p>

    <h3>3.7 Assumptions and dependencies</h3>
    <p>
        The game implementation depends on the Unsplash API for receiving photos of fruits and vegetables.
    </p>

    <h2 class="margin-1">4. External interface requirements</h2>
    <h3>4.1 User interfaces</h3>
    <p>
        The main way of interacting with our website is by the navigation part which depends on the state of the user
        (logged in or not).
        To start the game you have to log in and if you are not logged in then you will get a warning. After this, the
        game starts on the home page. The instruction page and the rankings page can be accessed by the logged in and
        logged out users. Register and login page are available only to log out users and the Log Out action can be done
        only by a logged user.
    </p>

    <h3>4.2 Software interfaces</h3>
    <p>
        For the database, we are using MariaDB, version 10.4.18 where we are storing the information regarding the
        users, user sessions and scores.
        For receiving the photos we use the Unsplash API available at https://api.unsplash.com/, the API returns the
        responses in JSON format.
    </p>


    <h3>4.3 Communications interfaces</h3>
    <ul class="margin-1">
        <li>Web Browser</li>
        <li>The communication standard is HTTP</li>
        <li>The password fields are transmitted using encryption</li>
    </ul>


    <h2 class="margin-1">5. System features</h2>

    <h3>5.1 Registration/Login forms</h3>
    <p>
        In order to make the HTTP communication stateful we use cookies and sessions to make the users able to create an
        account and maintain their session stable.
    </p>


    <h3>5.2 Rankings page</h3>
    <p>
        This page lists top players by their scores and by difficulty level. If no difficulty level is selected then the
        page will contain the best scores from all levels.
    </p>


    <h3>5.2.1 Rankings RSS flux.</h3>
    <p>
        There would be an option for the users to export the rankings page as an RSS flux (XML) in order to keep them up
        to date.
    </p>


    <h3>5.3 Instruction page</h3>
    <p>
        Here you can find a description of the game with an example of how the game works (javascript) and the
        differences from one level to another.
    </p>


    <h3>5.4 Game page</h3>
    <p>
        The game logic was implemented using PHP, javascript and Unsplash API.
        First, the player has to select the difficulty of the game. If he does not then he would be warned to choose a
        difficulty. After he chose the difficulty we obtain a certain photo from the API accordingly with the difficulty
        level and 3 random wrong answers. From here you can either choose the correct answer or one of the 3 wrong ones.
        If you chose any of the wrong answers the life counter decreases and in the easy mode the game will show you the
        correct answer, for the medium and hard difficulty you won’t have the correct answer until you lose all of your
        lives.
    </p>

    <h2 class="margin-1">6. Security features</h2>
    <h3>6.1 .htaccess file</h3>
    <p>
        - this file is used to protect the access to directory indexes and for the rewrite engine
    </p>

    <h3>6.2 ACL (Account control level)</h3>
    <p>
        - JSON permission files used with the router in order to grant or deny access to specific pages from the website
    </p>

    <h3>6.3 Prepared statements and SQL injections</h3>
    <p>
        - we’ve chosen to use prepared statements for queries as the query and
        the data are sent to the database server separately. The root of the SQL injection problem is in the mixing of
        the code and the data. In fact, our SQL query is a legitimate program. And we are creating such a program
        dynamically, adding some data on the fly. Thus, the data may interfere with the program code and even alter it.
    </p>

    <h3>6.4 Data sanitizing</h3>
    <p>
        - all the data from the _POST/_GET is sanitized using the PHP function htmlspecialchars() in
        order to avoid XSS attacks. As we are using PHP version 8.0.2 this will protect us against most XSS attacks (in
        PHP version 5.0.2 or older, there have been malformed UTF-8 characters which made this function vulnerable
        - <a href="http://www.securityfocus.com/bid/37389">Link</a>)
    </p>


    <h3 class="margin-1">6.5 CSRF protection</h3>
    <h4>6.5.1 How does it work?</h4>

    <p>
        There are two main parts to executing a Cross-site Request Forgery attack. The first one is tricking the
        victim into clicking a link or loading a page. This is normally done through social engineering and malicious
        links. The second part is sending a crafted, legitimate-looking request from the victim’s browser to the
        website. The request is sent with values chosen by the attacker including any cookies that the victim has
        associated with that website. This way, the website knows that this victim can perform certain actions on the
        website. Any request sent with these HTTP credentials or cookies will be considered legitimate, even though the
        victim would be sending the request on the attacker’s command.
    </p>

    <p>
        When a request is made to a website, the victim’s browser checks if it has any cookies that are associated with
        the origin of that website and that need to be sent with the HTTP request. If so, these cookies are included in
        all requests sent to this website. The cookie value typically contains authentication data and such cookies
        represent the user’s session. This is done to provide the user with a seamless experience, so they are not
        required to authenticate again for every page that they visit. If the website approves of the session cookie and
        considers the user session still valid, an attacker may use CSRF to send requests as if the victim was sending
        them. The website is unable to distinguish between requests being sent by the attacker and those sent by the
        victim since requests are always being sent from the victim’s browser with their own cookie. A CSRF attack
        simply takes advantage of the fact that the browser sends the cookie to the website automatically with each
        request.
    </p>

    <p>
        Cross-site Request Forgery will only be effective if a victim is authenticated. This means that the victim must
        be logged in for the attack to succeed. Since CSRF attacks are used to bypass the authentication process, there
        may be some elements that are not affected by these attacks even though they are not protected against them,
        such as publicly accessible content. For example, a public contact form on a website is safe from CSRF. Such
        HTML forms do not require the victim to have any privileges for form submission. CSRF only applies to situations
        where a victim is able to perform actions that are not accessible to everyone.
    </p>


    <h4>6.5.2 How to prevent the attack</h4>
    <p>
        Security experts propose many CSRF prevention mechanisms. This includes, for example, using a referer header,
        using the HttpOnly flag, sending an X-Requested-With custom header using jQuery, and more. Unfortunately, not
        all of them are effective in all scenarios. In some cases, they are ineffective and in other cases, they are
        difficult to implement in a particular application or have side effects.
        For our website, we’ve chosen to implement it using a token and it works in the following way: we are generating
        a random 32 chars string and we are setting it in the current session. When a form is being submitted, we have a
        hidden input that has the value we’ve generated earlier. If the token is not valid, then it means that we’re
        most likely having a CSRF attack so we will redirect the user to the badToken page.
    </p>

    <h3 class="margin-1">7. References</h3>
    <!-- TODO: add references -->

</div>

<!-- TODO: check for sections and subsections typos or incomplete name -->
<!-- TODO: add what each one of us did -->
<!-- TODO: add content -->
<!-- TODO: add static page and change the hrefs on the static pages -->

<?php $this->end(); ?>
