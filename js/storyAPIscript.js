async function generateGameSession(continent) {
    let response = await fetch(url + `schelettw/api/getStory/` + continent);
    let gameSession = await response.json();

    if (gameSession.status_message === "Game over") {
        await quitGame();
        window.location.replace(url + `schelettw/game/gameover/${gameSession.data}`);
    }

    if (gameSession.status_message === "Coming soon!") {
        await quitGame();
        window.location.replace(url + `schelettw/game/coming`);
    }

    if (gameSession.status_message !== "Coming soon!" && gameSession.status_message !== "Game over") {
        let content = `<h1 class=\"text-center red\">${gameSession.data.header}</h1><br>`;
        content += `<p>${gameSession.data.question} </p>`;
        content += '<img src="' + gameSession.data.photo + '" class="game-image" alt="game-image"><br><br>';
        content += '<button id ="' + gameSession.data.answer1 + `" class="buttonPurple" onclick="checkResponse('${gameSession.data.answer1}','${continent}')">` + gameSession.data.answer1 + '</button>';
        content += '<button id ="' + gameSession.data.answer2 + `" class="buttonPurple" onclick="checkResponse('${gameSession.data.answer2}','${continent}')">` + gameSession.data.answer2 + '</button><br>';
        content += '<button id ="' + gameSession.data.answer3 + `" class="buttonPurple" onclick="checkResponse('${gameSession.data.answer3}','${continent}')">` + gameSession.data.answer3 + '</button>';
        content += '<button id ="' + gameSession.data.answer4 + `" class="buttonPurple" onclick="checkResponse('${gameSession.data.answer4}','${continent}')">` + gameSession.data.answer4 + '</button><br>';
        content += '<button class="buttonQuit" onclick="quitGame()">Quit</button>';
        document.getElementById("game-story").innerHTML = content;
        let scoring = '<div class="stats">'
        scoring += "<p>Score: <span class='purple'>" + gameSession.data.score + "</span></p>";
        scoring += "</div>";
        document.getElementById("game-stats").innerHTML = scoring;
    }
}

async function checkResponse(name, continent) {
    let response = await fetch(url + `schelettw/api/storyLogic/` + name);
    let button = await response.json();
    console.log(button.data);
    if (!button.data) {
        await changeRed(name);
        let score = fetch(url + `schelettw/api/storyUpdate/${button.data}`, {
            method: 'PUT',
        });
    } else {
        await changeGreen(name)
        let score = fetch(url + `schelettw/api/storyUpdate/${button.data}`, {
            method: 'PUT',
        });
        setTimeout(() => {
            window.location.replace(url + "schelettw/game/story/" + continent);
        }, 1000);
    }
}

async function changeGreen(name) {
    document.getElementById(name).classList.remove("buttonPurple");
    document.getElementById(name).removeAttribute("onclick");
    document.getElementById(name).classList.add("buttonGreen");
}

async function changeRed(name) {
    document.getElementById(name).classList.remove("buttonPurple");
    document.getElementById(name).removeAttribute("onclick");
    document.getElementById(name).classList.add("buttonRed");
}

async function quitGame() {
    fetch(url + 'schelettw/api/endStory', {
        method: 'DELETE',
    })
        .then(res => res.text()) // or res.json()
        .then(res => console.log(res))
    window.location.replace(url + "schelettw/game/games");

}

