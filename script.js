function get() {
    if("content" in localStorage) {
        document.getElementById("res").innerHTML = decodeURI(localStorage.getItem("content"));
        localStorage.setItem("content", document.getElementById("add").innerHTML);
    }
}

function add() {
    localStorage.setItem("content", document.getElementById("add").innerHTML);
}