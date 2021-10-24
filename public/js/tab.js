function openTab(evt, cityName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
function openTabAddress(evt, cityName) {
    var i, tab_content, tab_address;

    tab_content = document.getElementsByClassName("tab_content");
    for (i = 0; i < tab_content.length; i++) {
        tab_content[i].style.display = "none";
    }
    tab_address = document.getElementsByClassName("tab_address");
    for (i = 0; i < tab_address.length; i++) {
        tab_address[i].className = tab_address[i].className.replace(
            " active",
            ""
        );
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
function closeTab() {
    if (document.getElementById("box_address").style.display == "block") {
        document.getElementById("box_address").style.display = "none";
    }
}
function openBoxTab() {
    if ((document.getElementById("box_address").style.display = "none")) {
        document.getElementById("box_address").style.display = "block";
    }
}
function openToCart() {
    document.getElementsByClassName("box-cart")[0].style.display = "block";
    document.getElementsByClassName("content")[0].style.display = "block";
    document.body.style.overflow = "hidden";
}
function closeToCart() {
    document.getElementsByClassName("box-cart")[0].style.display = "none";
    document.getElementsByClassName("content")[0].style.display = "none";
    document.body.style.overflow = "scroll";
}
