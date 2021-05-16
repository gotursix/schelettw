//TODO: check if status_message of "/api/photo/orange/regular" is 404 and redirect to page not found

async function generatePageContentLearnAbout(item) {
    //console.log(item);
    let content = '';
    let response = await fetch(`http://localhost/schelettw/api/photo/${item}`);
    let photo = await response.json();
    response = await fetch(`http://localhost/schelettw/api/photo/${item}/regular`);
    let status_regular = await response.json();
    response = await fetch(`http://localhost/schelettw/api/description/${item}`);
    let description = await response.json();

    //console.log(status_regular.status);
    if(status_regular.status === 404){
        return; // redirect..
    }
    //console.log(description);
    content += "<img src='" + photo.data.url + "' alt='"+ photo.data.name + "' class='"+ "learn-image" + "'/>";
    content += "<p>Difficulty:  " + photo.data.difficulty +  " </p>";
    content += "<p>" + description.data.description + "</p>"

    document.getElementById("learnAbout-content").innerHTML = content;

}