/*index.php*/
var index = document.getElementById("mainpage");

var popular = document.getElementById("most_popular");
var life = document.getElementById("polyu_life");
var faculty = document.getElementById("faculty_news");

var username = null;

index.addEventListener("load", function() {
    console.log("page is fully loaded");
});

function reloadelements_index(name) {
    var usericon = document.getElementById("usericon").document.getElementsByTagName("i");
    console.log(usericon);
    usericon.innerText = name;
}