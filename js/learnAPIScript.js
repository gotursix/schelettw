async function generatePageContent(page) {
    let content = '';
    let page_size = 6;
    let response = await fetch(url + `schelettw/api/fruits/all`);
    let allFruits = await response.json();
    let number_of_results = allFruits.data.length;
    let number_of_pages = Math.ceil(number_of_results / page_size) - 1;
    let first_result_index = page * page_size;
    let max_items = page_size + first_result_index > number_of_results ? number_of_results : page_size + first_result_index;
    let i = first_result_index;
    content += '<div class="flex-container">'
    for (i; i < max_items; i++) {
        let response = await fetch(url + `schelettw/api/photo/${allFruits.data[i].name}/small`);
        let fruitName = await response.json();
        content += '<div class="card">';
        content += "<img src='" + fruitName.data.url + "' alt='" + fruitName.data.name + "' class='" + "learn-image img-card" + "' style='width: 100%" + "'/>";
        content += '<div class="container-card">';
        content += '<h2>' + allFruits.data[i].name + '</h2>';
        content += '<h4>' + allFruits.data[i].difficulty + '</h4>';
        content += "<a href='" + "/schelettw/home/learnabout/" + fruitName.data.name + "' class='" + "a-cards" + "' target='" + "_blank" + "'>" + "learn more about: " + fruitName.data.name + " </a><br>";
        content += '</div>';
        content += '</div>';
    }
    content += '</div>'

    content += '<div class="pagination">';

    if (page > 0) {
        content += "<a href='" + "/schelettw/home/learn/" + `${page - 1}` + "'>Previous</a>";
    }

    if (page > 3) {
        content += "<a href='" + "/schelettw/home/learn/0" + "'>" + ` 0 ` + "</a>";
        content += "<a href='#'>" + ` ... ` + "</a>";
    }


    if (page > 1 && page < number_of_pages - 1) {
        content += "<a href='" + "/schelettw/home/learn/" + `${page - 2}` + "'>" + ` ${page - 2} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page - 1}` + "'>" + ` ${page - 1} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page}` + "' + class='active'>" + ` ${page} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page + 1}` + "'>" + ` ${page + 1} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page + 2}` + "'>" + ` ${page + 2} ` + "</a>";
    } else if (page > 1 && page > number_of_pages - 1) {
        content += "<a href='" + "/schelettw/home/learn/" + `${page - 2}` + "'>" + ` ${page - 2} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page - 1}` + "'>" + ` ${page - 1} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page}` + "' + class='active'>" + ` ${page} ` + "</a>";
    } else if (page < 1 && page < number_of_pages - 1) {
        content += "<a href='" + "/schelettw/home/learn/" + `${page}` + "' + class='active'>" + ` ${page} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page + 1}` + "'>" + ` ${page + 1} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page + 2}` + "'>" + ` ${page + 2} ` + "</a>";
    } else if (page === 1) {
        content += "<a href='" + "/schelettw/home/learn/" + `${page - 1}` + "'>" + ` ${page - 1} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page}` + "' + class='active'>" + ` ${page} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page + 1}` + "'>" + ` ${page + 1} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page + 2}` + "'>" + ` ${page + 2} ` + "</a>";
    } else if (page === number_of_pages - 1) {
        content += "<a href='" + "/schelettw/home/learn/" + `${page - 2}` + "'>" + ` ${page - 2} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page - 1}` + "'>" + ` ${page - 1} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page}` + "' + class='active'>" + ` ${page} ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${page + 1}` + "'>" + ` ${page + 1} ` + "</a>";
    }

    if (page < number_of_pages - 3) {
        content += "<a href='#'>" + ` ... ` + "</a>";
        content += "<a href='" + "/schelettw/home/learn/" + `${number_of_pages}` + "'>" + ` ${number_of_pages} ` + "</a>";
    }

    if (page < number_of_pages) {
        content += "<a href='" + "/schelettw/home/learn/" + `${page + 1}` + "'>Next</a>";
    }

    content += '</div>';

    if (page > number_of_pages) {
        window.location.replace(url + "schelettw/home/learn/" + number_of_pages);
    }

    document.getElementById("learn-content").innerHTML = content;
}