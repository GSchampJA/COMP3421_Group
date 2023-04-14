var memoryofchanged;

/*index.php*/
var index = document.getElementById("mainpage");

var popular = document.getElementById("most_popular");
var life = document.getElementById("polyu_life");
var faculty = document.getElementById("faculty_news");

var username = null;

var usericon = document.getElementById("usericon");//.document.getElementsByTagName("i");

// index.addEventListener("load", function() {
//     console.log("page is fully loaded");
// });

function reloadelements_index(name) {
    console.log(usericon.getElementsByTagName("i"));
    let welcome = "Welcome,";
    var username = document.createElement("div");
    username.innerHTML = welcome.concat(" ", name, "!");
    //overlay.classList.add("box");
    usericon.appendChild(username);
}

function setattr() {
    
}