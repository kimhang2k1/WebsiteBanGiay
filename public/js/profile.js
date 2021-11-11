function openModalEditAddress(IDDiaChi) {
    document.getElementById("myEdit").style.display = "block";
    document.getElementsByClassName("content")[0].style.display = "block";
    document.body.style.overflow = "hidden";
    $(window).scrollTop(0);
    $.ajax({
        method: "GET",
        url: "/get-information-customer",
        data: {
            IDDiaChi: IDDiaChi,
        },
        success: function (response) {
            $("#myEdit").html(response);
        },
    });
}
function closeAddress() {
    document.getElementById("myEdit").style.display = "none";
    document.getElementsByClassName("content")[0].style.display = "none";
    document.body.style.overflow = "scroll";
}

function editToAddress(event, IDDiaChi) {
    event.preventDefault();
    $.ajax({
        method: "GET",
        url: "/edit-address-customer",
        data: {
            HoTen: document.getElementsByName("HoTen")[0].value,
            SDT: document.getElementsByName("SDT")[0].value,
            IDThanhPho: document.getElementById("city_address").value,
            IDQuan: document.getElementById("district_address").value,
            IDXa: document.getElementById("village").value,
            SoNha: document.getElementsByName("SoNha")[0].value,
            IDDiaChi: IDDiaChi,
        },
        success: function (response) {
            if ($.isEmptyObject(response.error)) {
                document.getElementById("myEdit").style.display = "none";
                document.getElementsByClassName("content")[0].style.display =
                    "none";
                document.body.style.overflow = "scroll";

                $("#allAddress").html(response.view);
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

function deleteAddress(IDDiaChi) {
    $.ajax({
        method: "GET",
        url: "/delete-address-customer",
        data: {
            IDDiaChi: IDDiaChi,
        },
        success: function (response) {
            if (response == "") {
                document.getElementById(IDDiaChi + "Address").remove();
            } else {
                document.getElementById("allAddress").innerHTML = response;
            }
        },
    });
}
function openEditInformation() {
    document.getElementById("form-edit").style.display = "block";
    document.getElementById("no-edit").style.display = "none";
}

function closeEditInformation() {
    document.getElementById("form-edit").style.display = "none";
    document.getElementById("no-edit").style.display = "block";
}

function openChangePassword() {
    document.getElementById("no-edit").style.display = "none";
    document.getElementById("change-password").style.display = "block";
}

function openInformation(index) {
    var management = document.getElementsByClassName("information");
    for (let i = 0; i < management.length; i++) {
        const element = management[i];
        if (index === i) {
            element.classList.remove("hidden");
        } else {
            element.classList.add("hidden");
        }
    }
}

function editInformationCustomer() {
    $.ajax({
        method: "GET",
        url: "/edit-information-customer",
        data: {
            TenKH: document.getElementsByName("nameCustomer")[0].value,
            Email: document.getElementsByName("emailCustomer")[0].value,
            SDT: document.getElementsByName("phoneCustomer")[0].value,
        },
        success: function (response) {
            document.getElementById("form-edit").style.display = "none";
            document.getElementById("no-edit").style.display = "block";
            $("#no-edit").html(response);
        },
    });
}

function changePassword() {
    $.ajax({
        method: "GET",
        url: "/change-password-customer",
        data: {
            old: document.getElementsByName("mk")[0].value,
            new: document.getElementsByName("mkClone")[0].value,
        },
        success: function (response) {},
    });
}
function getDetailOrder(IDDonHang) {
    document.getElementsByClassName("detail-order-customer")[0].style.display =
        "block";
    document.getElementsByClassName("information")[2].style.display = "none";
    $.ajax({
        method: "GET",
        url: "/get-information-product-order",
        data: {
            IDDonHang: IDDonHang,
        },
        success: function (response) {
            $(".detail-order-customer").html(response);
        },
    });
}
