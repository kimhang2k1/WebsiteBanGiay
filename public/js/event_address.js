function openDivAddress() {
    document.getElementsByClassName("delivery-address")[0].style.display =
        "block";
    document.getElementsByClassName("default-address")[0].style.display =
        "none";
}

function openDeliveryAddress() {
    document.getElementById("myModal").style.display = "block";
    document.body.style.overflow = "hidden";
}

function closeDeliveryAddress() {
    document.getElementById("myModal").style.display = "none";
    document.body.style.overflow = "scroll";
}

function getDistrict(IDThanhPho) {
    var tab_content, tab_address;
    var inp = document.querySelectorAll(".check");
    var btn = document.getElementsByClassName("btn_add")[0];
    tab_content = document.getElementsByClassName("tab_content");
    tab_address = document.getElementsByClassName("tab_address");
    $(`#district_address`).text("");
    $(`#village`).text("");
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
            document.getElementById("city_address").value =
                document.getElementById(IDThanhPho + "TP").value;
            if (
                inp[0].value == "" ||
                inp[1].value == "" ||
                inp[2].value == ""
            ) {
                btn.disabled = true;
            } else {
                btn.style.cursor = "pointer";
                btn.disabled = false;
            }
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
    var inp = document.querySelectorAll(".check");
    var btn = document.getElementsByClassName("btn_add")[0];
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
            document.getElementById("district_address").value =
                document.getElementById(IDQuan + "district").value;
            if (
                inp[0].value == "" ||
                inp[1].value == "" ||
                inp[2].value == ""
            ) {
                btn.disabled = true;
            } else {
                btn.style.cursor = "pointer";
                btn.disabled = false;
            }
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
    document.getElementById("village").value = document.getElementById(
        IDXa + "commune"
    ).value;
    document.getElementById("box_address").style.display = "none";
}

function addToAddress(event) {
    event.preventDefault();
    $.ajax({
        method: "GET",
        url: "/add-address-customer",
        data: {
            HoTen: document.getElementsByName("HoTen")[0].value,
            SDT: document.getElementsByName("SDT")[0].value,
            IDThanhPho: document.getElementById("city_address").value,
            IDQuan: document.getElementById("district_address").value,
            IDXa: document.getElementById("village").value,
            SoNha: document.getElementsByName("SoNha")[0].value,
        },
        success: function (response) {
            if ($.isEmptyObject(response.error)) {
                document.getElementById("myModal").style.display = "none";
                document.body.style.overflow = "scroll";

                $("#allMyAddress").html(response.view);
            } else {
                printErrorMsg(response.error);
            }
        },
    });
}

function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html("");
    $(".print-error-msg").css("display", "block");
    $.each(msg, function (key, value) {
        $(".print-error-msg")
            .find("ul")
            .append("<li>" + value + "</li>");
    });
}

function stateHandle() {
    var inp = document.querySelectorAll(".check");
    var city = document.getElementById("city_address");
    var district = document.getElementById("district_address");
    var commune = document.getElementById("village");
    var btn = document.getElementsByClassName("btn_add")[0];
    if (
        inp[0].value == "" ||
        inp[1].value == "" ||
        inp[2].value == "" ||
        city.innerText == "" ||
        district.innerText == "" ||
        commune.innerText == ""
    ) {
        btn.disabled = true;
    } else {
        btn.style.cursor = "pointer";
        btn.disabled = false;
    }
}

function getAddressDefault() {
    var radioAddress = document.getElementsByName("myAddress");
    for (let index = 0; index < radioAddress.length; index++) {
        if (radioAddress[index].checked) {
            var IDDiaChi = radioAddress[index].value;
        }
    }
    $.ajax({
        method: "GET",
        url: "/get-address-default",
        data: {
            IDDiaChi: IDDiaChi,
        },
        success: function (response) {
            document.getElementById("allMyAddress").style.display = "none";
            document.getElementById("addressDefault").style.display = "block";
            $("#addressDefault").html(response);
        },
    });
}
