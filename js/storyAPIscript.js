async function quitGame() {
    fetch(url + 'schelettw/api/endStory', {
        method: 'DELETE',
    })
        .then(res => res.text()) // or res.json()
        .then(res => console.log(res))
    window.location.replace(url + "schelettw/game/games");

}
