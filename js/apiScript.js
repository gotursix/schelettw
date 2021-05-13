async function getRankings(difficulty){
    let response = await  fetch(`http://localhost:8080/schelettw/api/rankings/${difficulty}`);
    let data = await response.json();
    console.log(JSON.stringify(data));
}

