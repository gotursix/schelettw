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
            + `<a href="${url}schelettw/admin/delete/${parsed.id}" onClick="return confirm('Are you sure you want to delete?');" class="button">Delete</a> `;
        finalTable += "</tr>"
    });
    return finalTable;
}


async function getTableForFruits() {
    let call = await fetch(url + `schelettw/api/veggies`)
    let data = await call.json();
    document.getElementById("bodyToSetForVeggies").innerHTML = generateTableHtmlForFruits(data.data);
}

function generateTableHtmlForFruits(parsed) {
    let finalTable = '';
    let rank = 1;
    parsed.forEach(parsed => {
        let keys = Object.keys(parsed);
        finalTable += "<tr>"
        finalTable += '<td data-label="ID">' + rank + '</td>';
        rank++;
        finalTable += '<td data-label="FRUIT/VEGGIE">' + parsed.name + '</td>';
        finalTable += '<td data-label="ACTIONS">' + `<a href="${url}schelettw/admin/editVeggie/${parsed.id}" class="button">Edit</a> `
            + `<a href="${url}schelettw/admin/deleteVeggie/${parsed.id}" onClick="return confirm('Are you sure you want to delete?');" class="button">Delete</a> `;
        finalTable += "</tr>"
    });
    return finalTable;
}
