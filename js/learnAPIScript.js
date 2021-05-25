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
        content += "<a href='" + "/schelettw/home/learnabout/" + fruitName.data.name + "' class='" + "a-cards" + "' target='" + "_blank" + "'>" + "learn more about:" + fruitName.data.name + " </a><br>";
        content += '</div>';
        content += '</div>';
    }
    content += '</div>'

    //TODO: design for
    if (page > 0) {
        content += "<a href='" + "/schelettw/home/learn/" + `${page - 1}` + "'>Previous</a>";
    }


    content += "<a href='" + "/schelettw/home/learn/" + `${page}` + "'>" + `${page+1}` + "</a>";

    /*
    for (let pageIndex = 1; pageIndex <= number_of_pages; pageIndex++) {
        content += "<a href='" + "/schelettw/home/learn/" + `${pageIndex - 1}` + "'>" + pageIndex + " " + "</a>";
    }*/


    if (page < number_of_pages) {
        content += "<a href='" + "/schelettw/home/learn/" + `${page + 1}` + "'>Next</a>";
    }

    if(page > number_of_pages){
        window.location.replace(url + "schelettw/home/learn/" + number_of_pages);
    }

    document.getElementById("learn-content").innerHTML = content;
}