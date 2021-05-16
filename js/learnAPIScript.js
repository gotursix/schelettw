
async function generatePageContent(page) {

    let content = '';
    let page_size = 7;
    let response = await fetch(`http://localhost/schelettw/api/fruits/all`);
    let allFruits = await response.json();
    let number_of_results = allFruits.data.length;
    let number_of_pages = Math.ceil(number_of_results / page_size) - 1;
    let first_result_index = page * page_size;
    let max_items = page_size + first_result_index > number_of_results ? number_of_results : page_size + first_result_index;
    let i = first_result_index;
    for(i; i<max_items; i++){
        let response = await fetch(`http://localhost/schelettw/api/photo/${allFruits.data[i].name}`);
        let fruitName = await response.json();
        content += "<img src='" + fruitName.data.url + "' alt='"+ fruitName.data.name + "' class='"+ "learn-image" + "'/>";
        content += '<p>' + allFruits.data[i].name + '</p>';
        content += '<p>' + allFruits.data[i].difficulty + '</p>';
        content += "<a href='" + "/schelettw/home/learnabout/" + fruitName.data.name + "' target='" + "_blank" + "'>" + "learn more about:" + fruitName.data.name + "</a><br>";

    }


    if(page>0){
        content += "<a href='" + "/schelettw/home/learn/" + `${page-1}` + "'>Previews page</a>";
    }

    for(let pageIndex = 1; pageIndex <= number_of_pages; pageIndex++){
        content += "<a href='" + "/schelettw/home/learn/" + `${pageIndex-1}` + "'>" + pageIndex + " " + "</a>";
    }

    if(page < number_of_pages){
        content += "<a href='" + "/schelettw/home/learn/" + `${page+1}` + "'>Next page</a>";
    }

    document.getElementById("learn-content").innerHTML = content;
}