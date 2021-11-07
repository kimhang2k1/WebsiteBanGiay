function getSearchProductInShop() {
    $.ajax({
        method: "GET",
        url: "/get-search-product-in-shop",
        data: {
            SearchProduct: document.getElementsByName("search")[0].value,
            IDNhomSP: document.getElementsByName("category")[0].value,
        },
        success: function (response) {
            $("#product").html(response);
        },
    });
}

function getSearchCategory() {
    $.ajax({
        method: "GET",
        url: "/get-search-category",
        data: {
            Search: document.getElementsByName("search_category")[0].value,
        },
        success: function (response) {
            $("#page_category").html(response);
        },
    });
}

function SearchOrder() {
    $.ajax({
        method: "GET",
        url: "/get-search-order",
        data: {
            Search: document.getElementsByName("search_order")[0].value,
        },
        success: function (response) {
            $("#page-order").html(response);
        },
    });
}

function SearchAccount() {
    $.ajax({
        method: "GET",
        url: "/get-search-account",
        data: {
            Search: document.getElementsByName("search_account")[0].value,
        },
        success: function (response) {
            $("#page_account").html(response);
        },
    });
}

function SearchCustomer() {
    $.ajax({
        method: "GET",
        url: "/get-search-customer",
        data: {
            Search: document.getElementsByName("search_customer")[0].value,
        },
        success: function (response) {
            $("#page_customer").html(response);
        },
    });
}

function ImagesFileAsURL() {
    // document.getElementById('hinhanh').style.display = "none";
    var fileSelected = document.getElementById("fileImage").files;
    if (fileSelected.length > 0) {
        var fileToLoad = fileSelected[0];
        var fileReader = new FileReader();
        fileReader.onload = function (fileLoaderEvent) {
            var srcData = fileLoaderEvent.target.result;
            var newImage = document.createElement("img");
            newImage.src = srcData;
            document.getElementById("displayImg").style.display = "block";
            document.getElementById("displayImg").innerHTML =
                newImage.outerHTML;
        };
        fileReader.readAsDataURL(fileToLoad);
    }
}

function addProduct() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    let formData = new FormData($("#myForm")[0]);
    formData.append("IDSP", $("#IDSP").val());
    $.ajax({
        method: "GET",
        url: "/add-to-product-shop",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#product").html(response);
        },
    });
}
