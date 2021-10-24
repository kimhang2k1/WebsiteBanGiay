function getBrand(id) {
    $.ajax({
        method: "GET",
        url: "/productbyBrand",
        data: {
            ID: getValueRadio().value,
            IDNSP: id,
        },
        success: function (response) {
            var allProduct = document.getElementsByClassName("all-product")[0];
            allProduct.innerHTML = response;
            window.scrollTo(0, 468);
        },
    });
}
function getValueRadio() {
    var parent = document.getElementsByClassName("content-brand")[0].childNodes;
    for (let index = 0; index < parent.length; index++) {
        if (index % 2 != 0) {
            if (parent[index].childNodes[0].checked) {
                return parent[index].childNodes[0];
            }
        }
    }
}

function getRadioCheck() {
    var parent =
        document.getElementsByClassName("content-product")[0].childNodes;
    for (let index = 0; index < parent.length; index++) {
        if (index % 2 != 0) {
            if (parent[index].childNodes[0].checked) {
                return parent[index].childNodes[0];
            }
        }
    }
}
function getCategoryProduct(IDNSP) {
    $.ajax({
        method: "GET",
        url: "/productbyCategory",
        data: {
            id: getRadioCheck().value,
            IDNSP: IDNSP,
        },
        success: function (response) {
            document.getElementsByClassName("all-product")[0].innerHTML =
                response;
            window.scrollTo(0, 468);
        },
    });
}

function onChangePrice(event, IDNSP) {
    $.ajax({
        method: "GET",
        url: "/productByPrice",
        data: {
            price: event.target.value,
            IDNSP: IDNSP,
        },
        success: function (response) {
            document.getElementsByClassName("all-product")[0].innerHTML =
                response;
            window.scrollTo(0, 468);
        },
    });
}

function sortByProduct(IDNSP) {
    $.ajax({
        method: "GET",
        url: "/sort",
        data: {
            Loai: document.getElementById("sort").value,
            IDNSP: IDNSP,
        },
        success: function (response) {
            document.getElementsByClassName("all-product")[0].innerHTML =
                response;
            window.scrollTo(0, 468);
        },
    });
}

function displayImage(element) {
    const imageDetails = document.getElementsByClassName(
        "image__detail__product"
    );
    for (let index = 0; index < imageDetails.length; index++)
        document
            .getElementsByClassName("image__detail__product")
            [index].classList.remove("active__image__detail");
    element.classList.add("active__image__detail");
    document.getElementById("images").src = element.src;
}
var i = 1;
function increase() {
    i++;
    document.getElementById("amount").value = i;
}
function decrease() {
    if (i <= 1) {
        document.getElementById("amount").value = 1;
    } else {
        i--;
        document.getElementById("amount").value = i;
    }
}

function getSize(element, IDSize) {
    const SZ = document.getElementsByClassName("size__product");
    document.getElementById("idsize").value = IDSize;
    for (let index = 0; index < SZ.length; index++)
        document
            .getElementsByClassName("size__product")
            [index].classList.remove("active__size");
    element.classList.add("active__size");
}
