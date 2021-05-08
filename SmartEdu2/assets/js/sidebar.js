function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("header").style.marginLeft = "250px";
    document.getElementById("dashboard-content").style.marginLeft = "250px";
    document.getElementById("footer").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("header").style.marginLeft= "0";
    document.getElementById("dashboard-content").style.marginLeft = "0";
    document.getElementById("footer").style.marginLeft = "0";
}