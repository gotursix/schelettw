async function generateGameSession(difficulty) {
    let response = await fetch(url + `schelettw/api/game/` + difficulty);
    let gameSession = await response.json();
    let content = "<h1 class=\"text-center red\">What fruit or vegetable is in the image?</h1><br>";
    content += '<img src="' + gameSession.data.url + '" class="game-image" alt="game-image"><br><br>';
    for (let i = 0; i < gameSession.data.fruits.length; i++) {
        content += '<button id ="' + gameSession.data.fruits[i].name + `" class="buttonPurple" onclick="checkResponse('${gameSession.data.fruits[i].name}')">` + gameSession.data.fruits[i].name + '</button>';
        if (i % 2) {
            content += '<br>';
        }
    }
    content += '<button class="buttonQuit" onclick="quitGame()">Quit</button>';
    document.getElementById("game").innerHTML = content;
}

async function checkResponse(name) {
    let response = await fetch(url + `schelettw/api/logic/` + name);
    let button = await response.json();
    console.log(button.data);
    if (!button.data) {
        document.getElementById(name).classList.remove("buttonPurple");
        document.getElementById(name).removeAttribute("onclick");
        document.getElementById(name).classList.add("buttonRed");
        let score = fetch(url + `schelettw/api/update/${button.data}`, {
            method: 'PUT',
        });
    } else {
        let current = await fetch(url + `schelettw/api/game/session`);
        let gameSession = await current.json();
        for (const fruit of gameSession.data.fruits) {
            if (fruit.name !== gameSession.data.correct) {
                document.getElementById(fruit.name).classList.remove("buttonPurple");
                document.getElementById(fruit.name).removeAttribute("onclick");
                document.getElementById(fruit.name).classList.add("buttonRed");
            }
        }
        document.getElementById(name).classList.remove("buttonPurple");
        document.getElementById(name).removeAttribute("onclick");
        document.getElementById(name).classList.add("buttonGreen");
        let score = fetch(url + `schelettw/api/update/${button.data}`, {
            method: 'PUT',
        });
        setTimeout(() => {
            window.location.replace(url + "schelettw/");
        }, 1000);
    }
}

async function quitGame() {
    fetch(url + 'schelettw/api/end', {
        method: 'DELETE',
    })
        .then(res => res.text()) // or res.json()
        .then(res => console.log(res))
    window.location.replace(url + "schelettw/");

}
