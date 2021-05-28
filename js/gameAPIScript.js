async function generateGameSession(difficulty) {
    let response = await fetch(url + `schelettw/api/game/` + difficulty);
    let gameSession = await response.json();
    console.log(gameSession);
    if (gameSession.status_message === "Game over") {
        window.location.replace(url + `schelettw/game/gameover/${gameSession.data}`);
    }
    let content = "<h1 class=\"text-center red\">What fruit or vegetable is in the image?</h1><br>";
    content += '<img src="' + gameSession.data.url + '" class="game-image" alt="game-image"><br><br>';
    for (let i = 0; i < gameSession.data.fruits.length; i++) {
        content += '<button id ="' + gameSession.data.fruits[i].name + `" class="buttonPurple" onclick="checkResponse('${gameSession.data.fruits[i].name}')">` + gameSession.data.fruits[i].name + '</button>';
        if (i % 2) {
            content += '<br>';
        }
    }

    //Todo add design
    content += '<button class="buttonQuit" onclick="quitGame()">Quit</button>';
    document.getElementById("game").innerHTML = content;
    let scoring = '<div class="stats">'
    scoring += "<p>Score: <span class='purple'>" + gameSession.data.score + "</span></p>";
    scoring += "<p>Lives: ";
    for (let l = 1; l<=gameSession.data.lives; ++l){
        scoring += "&#10084;&#65039; ";
    }
    scoring += "</p>";
    scoring += "</div>";
    document.getElementById("game-stats").innerHTML = scoring;
}

async function checkResponse(name) {
    let response = await fetch(url + `schelettw/api/logic/` + name);
    let button = await response.json();
    let current = await fetch(url + `schelettw/api/game/session`);
    let gameSession = await current.json();
    console.log(button.data);
    if (!button.data) {
        await changeRed(name);
        let score = fetch(url + `schelettw/api/update/${button.data}/`, {
            method: 'PUT',
        });
        if (gameSession.data.difficulty !== "hard") {
            let score = fetch(url + `schelettw/api/next/true`, {
                method: 'PUT',
            });
            await changeGreen(gameSession.data.correct);
            setTimeout(() => {
                window.location.replace(url + "schelettw/game/play/" + gameSession.data.difficulty);
            }, 2000);
        }
    } else {
        for (const fruit of gameSession.data.fruits)
            if (fruit.name !== gameSession.data.correct)
                await changeRed(fruit.name)
        await changeGreen(name)
        let score = fetch(url + `schelettw/api/update/${button.data}`, {
            method: 'PUT',
        });
        setTimeout(() => {
            window.location.replace(url + "schelettw/game/play/" + gameSession.data.difficulty);
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
    fetch(url + 'schelettw/api/end', {
        method: 'DELETE',
    })
        .then(res => res.text()) // or res.json()
        .then(res => console.log(res))
    window.location.replace(url + "schelettw/");

}
