async function getRankings(difficulty){
    let response = await  fetch(`http://localhost/schelettw/api/rankings/${difficulty}`);
    let data = await response.json();
    await generateTable(data);
}

async function getRankingsForAll(){
    let easy = await fetch(`http://localhost/schelettw/api/rankings/easy`)
    let medium = await fetch(`http://localhost/schelettw/api/rankings/medium`)
    let hard = await fetch(`http://localhost/schelettw/api/rankings/hard`)

    let easyData = await easy.json();
    let mediumData = await medium.json();
    let hardData = await hard.json();


    let parsedEasy = JSON.parse(easyData.data);
    let parsedMedium = JSON.parse(mediumData.data);
    let parsedHard = JSON.parse(hardData.data);

    let finalTable = genetateTableHtml(parsedEasy) + genetateTableHtml(parsedMedium) + genetateTableHtml(parsedHard)

    document.getElementById("bodyToSet").innerHTML = finalTable
}

function genetateTableHtml(parsed){
    let finalTable = '';
    let rank = 1;
    parsed.forEach(element =>{
        let keys = Object.keys(element);
        finalTable += "<tr>"
        finalTable += '<td data-label="Rank">#' + rank + '</td>';
        rank++;
        finalTable += '<td data-label="' + keys[2] + '">' +  element.username + '</td>';
        finalTable += '<td data-label="' + keys[3] + '">' +  element.points + '</td>';
        finalTable += '<td data-label="' + keys[4] + '">' +  element.difficulty + '</td>';
        finalTable += "</tr>"
    });
    return finalTable;
}

async function generateTable(data){
    let tableBody = document.getElementById("bodyToSet");
    let parsed = JSON.parse(data.data);
    let finalTable = genetateTableHtml(parsed);

    tableBody.innerHTML = finalTable;
}

