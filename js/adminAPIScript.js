async function getTable() {
    let call = await fetch(url + `schelettw/api/questions`)
    let data = await call.json();
    document.getElementById("bodyToSet").innerHTML = generateTableHtml(data.data);
}

function generateTableHtml(parsed) {
    let finalTable = '';
    let rank = 1;
    parsed.forEach(parsed => {
        let keys = Object.keys(parsed);
        finalTable += "<tr>"
        finalTable += '<td data-label="Nr.">' + rank + '</td>';
        rank++;
        finalTable += '<td data-label="' + keys[8] + '">' + parsed.question + '</td>';
        finalTable += '<td data-label="' + keys[3] + '">' + `<a href="${url}schelettw/admin/edit/${parsed.id}" class="button">Edit</a> `
            + `<a href="${url}schelettw/admin/delete/${parsed.id}" class="button">Delete</a> `;
        finalTable += "</tr>"
    });
    return finalTable;
}
