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
        finalTable += '<td data-label="Id.">' + rank + '</td>';
        rank++;
        finalTable += '<td data-label="' + keys[2] + '" class="ellipsis">' + parsed.question + '</td>';
        finalTable += '<td data-label="Actions">' + `<a href="${url}schelettw/admin/edit/${parsed.id}" class="crud-button primary edit">Edit</a> `
            + `<a href="${url}schelettw/admin/delete/${parsed.id}" onClick="return confirm('Are you sure you want to delete?');" class="crud-button primary delete">Delete</a> `;
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
        finalTable += '<td data-label="ACTIONS">' + `<a href="${url}schelettw/admin/editVeggie/${parsed.id}" class="crud-button primary edit">Edit</a> `
            + `<a href="${url}schelettw/admin/deleteVeggie/${parsed.id}" onClick="return confirm('Are you sure you want to delete?');" class="crud-button primary delete">Delete</a> `;
        finalTable += "</tr>"
    });
    return finalTable;
}

function showExport() {
    let x = document.getElementById("export");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function showImport() {
    let x = document.getElementById("import");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function formToggle(ID) {
    let element = document.getElementById(ID);
    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}

function chooseFile(proot, location) {
    let content = '';
    content += '<div id="importFrm" style="display: none;">' +
        '<form action="' + proot + 'admin/' + location + '" method="post" encType="multipart/form-data">' +
        '<input type="file" class="crud-button primary btn-width black margin-1" name="file"/> ' +
        '<input type="submit" class="crud-button primary btn-width black" name="importSubmit" value="IMPORT NOW">' +
        '</form></div>';
    document.getElementById("choosedFile").innerHTML = content;
}