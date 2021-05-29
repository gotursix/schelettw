function generateTableHtml(parsed, user) {
    let finalTable = '';
    let rank = 0;
    parsed.forEach(element => {
        let keys = Object.keys(element);
        rank++;
        if (element.username === user ){
            finalTable += "<tr>"
            finalTable += '<td data-label="Rank">#' + rank + '</td>';
            finalTable += '<td data-label="' + keys[2] + '">' + element.username + '</td>';
            finalTable += '<td data-label="' + keys[3] + '">' + element.points + '</td>';
            finalTable += '<td data-label="' + keys[4] + '">' + element.difficulty + '</td>';
            finalTable += "</tr>"
        }

    });
    return finalTable;
}

async function getRankingsForUser(username) {
    let easy = await fetch(url + `schelettw/api/rankings/easy`)
    let medium = await fetch(url + `schelettw/api/rankings/medium`)
    let hard = await fetch(url + `schelettw/api/rankings/hard`)
    let easyData = await easy.json();
    let mediumData = await medium.json();
    let hardData = await hard.json();
    document.getElementById("bodyToSet").innerHTML = generateTableHtml(easyData.data,username) + generateTableHtml(mediumData.data,username) + generateTableHtml(hardData.data,username);
}


