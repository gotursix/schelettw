async function generatePageContentLearnAbout(item) {
    let content = '';
    let response = await fetch(url + `schelettw/api/photo/${item}`);
    let photo = await response.json();
    response = await fetch(url +`schelettw/api/description/${item}`);
    let description = await response.json();
    if(photo.status === 404){
        console.log("Need to redirect!");
        return; // redirect..
    }
    content += `<h1 class="red">Learn about ${item}</h1>`;
    content += `<h3 class="purple"> Difficulty: ${photo.data.difficulty}</h3>`;
    content += "<img src='" + photo.data.url + "' alt='"+ photo.data.name + "' class='"+ "learn-image" + "'/>";
    content += "<p>" + description.data.description + "</p>";


    document.getElementById("learnAbout-content").innerHTML = content;

}