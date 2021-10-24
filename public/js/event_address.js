function openDivAddress() {
    document.getElementsByClassName("delivery-address")[0].style.display =
        "block";
    document.getElementsByClassName("default-address")[0].style.display =
        "none";
}

function openDeliveryAddress() {
    document.getElementsByClassName("form-add-cart")[0].style.display = "block";
    document.getElementsByClassName("content")[0].style.display = "block";
    document.body.style.overflow = "hidden";
}

function closeDeliveryAddress() {
    document.getElementsByClassName("form-add-cart")[0].style.display = "none";
    document.getElementsByClassName("content")[0].style.display = "none";
    document.body.style.overflow = "scroll";
}
function getDistrict(IDThanhPho) {
    var tab_content, tab_address;

    tab_content = document.getElementsByClassName("tab_content");
    tab_address = document.getElementsByClassName("tab_address");
    $(`#district_address`).text("");
    $.ajax({
        method: "GET",
        url: "/get-district",
        data: {
            IDThanhPho: IDThanhPho,
        },
        success: function (response) {
            $("#district").html(response);
            document.getElementById("city_address").innerText =
                document.getElementById(IDThanhPho + "TP").innerText + " ,";
            document
                .getElementById(IDThanhPho + "TP")
                .innerHTML.replaceAll(/(\r\n|\n|\r)/gm, " ");
        },
    });

    tab_address[1].style.pointerEvents = "auto";
    for (let index = 0; index < tab_content.length; index++) {
        tab_content[index].style.display = "none";
    }
    document.getElementById("district").style.display = "block";

    tab_address[1].style.borderBottom = "2px solid black";
    tab_address[0].style.borderBottom = "none";

    tab_address[0].addEventListener("click", function () {
        document.getElementsByClassName("tab_address")[1].style.borderBottom =
            "none";
        document.getElementsByClassName("tab_address")[0].style.borderBottom =
            "2px solid black";
    });
    tab_address[1].addEventListener("click", function () {
        document.getElementsByClassName("tab_address")[0].style.borderBottom =
            "none";
        document.getElementsByClassName("tab_address")[1].style.borderBottom =
            "2px solid black ";
    });
}

function getCommune(IDQuan) {
    var tab_content, tab_address;

    tab_address = document.getElementsByClassName("tab_address");
    tab_content = document.getElementsByClassName("tab_content");
    $(`#village`).text("");
    $.ajax({
        method: "GET",
        url: "/get-commune",
        data: {
            IDQuan: IDQuan,
        },
        success: function (response) {
            document.getElementById("commune").innerHTML = response;
            document.getElementById("district_address").innerText =
                document.getElementById(IDQuan + "district").innerText + " ,";
        },
    });
    tab_address[2].style.pointerEvents = "auto";

    for (let index = 0; index < tab_content.length; index++) {
        tab_content[index].style.display = "none";
    }
    document.getElementById("commune").style.display = "block";
    tab_address[2].style.borderBottom = "2px solid black";
    tab_address[1].style.borderBottom = "none";
    tab_address[0].addEventListener("click", function () {
        document.getElementsByClassName("tab_address")[1].style.borderBottom =
            "none";
        document.getElementsByClassName("tab_address")[0].style.borderBottom =
            "2px solid black";
        document.getElementsByClassName("tab_address")[2].style.borderBottom =
            "none";
    });
    tab_address[1].addEventListener("click", function () {
        document.getElementsByClassName("tab_address")[0].style.borderBottom =
            "none";
        document.getElementsByClassName("tab_address")[1].style.borderBottom =
            "2px solid black ";
        document.getElementsByClassName("tab_address")[2].style.borderBottom =
            "none ";
    });
    tab_address[2].addEventListener("click", function () {
        document.getElementsByClassName("tab_address")[0].style.borderBottom =
            "none";
        document.getElementsByClassName("tab_address")[2].style.borderBottom =
            "2px solid black ";
        document.getElementsByClassName("tab_address")[1].style.borderBottom =
            "none ";
    });
}

function getValue(IDXa) {
    document.getElementById("village").innerText = document.getElementById(
        IDXa + "commune"
    ).innerText;
    document.getElementById("box_address").style.display = "none";
}

function addToAddress(IDThanhPho, IDQuan, IDXa) {
    $.ajax({
        method: "GET",
        url: "add-address-customer",
        data: {
            HoTen: document.getElementsByName("customer_name").value,
            SDT: document.getElementsByName("customer_phone").value,
            IDThanhPho: document.getElementById(IDThanhPho + "TP").value,
            IDQuan: document.getElementById(IDQuan + "district").value,
            IDThanhPho: document.getElementById(IDXa + "commune").value,
            SoNha: document.getElementsByName("apartment_number").value,
        },
        success: function (response) {
            document.getElementsByClassName("form-add-cart")[0].style.display =
                "none";
            $("#allMyAddress").html(response);
        },
    });
}
