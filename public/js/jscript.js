window.onscroll = function() {scrollFunction();};

function scrollFunction() {
    var y = document.body.scrollTop;
    var d = document.documentElement.scrollTop;
    if (y > 48 || d > 48) {
        document.getElementById("tofixed").className = "tofixed";
        document.getElementById("statut").style.display = "block";
    }else {
        document.getElementById("tofixed").className = "";
        document.getElementById("statut").style.display = "none";
    }
}
