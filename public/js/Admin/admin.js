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
function ImageFile() {
    document.getElementById("hinhanh").style.display = "none";
    var fileSelected = document.getElementById("fileImageClone").files;
    if (fileSelected.length > 0) {
        var fileToLoad = fileSelected[0];
        var fileReader = new FileReader();
        fileReader.onload = function (fileLoaderEvent) {
            var srcData = fileLoaderEvent.target.result;
            var newImage = document.createElement("img");
            newImage.src = srcData;
            document.getElementById("displayImage").style.display = "block";
            document.getElementById("displayImage").innerHTML =
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
        method: "POST",
        url: "/add-to-product-shop",
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $("#product").html(response);
        },
    });
}

function openFormEditProduct(IDSanPham) {
    document.getElementsByClassName("form-edit-product")[0].style.display =
        "block";
    document.getElementsByClassName("management-product")[0].style.display =
        "none";
    $.ajax({
        method: "GET",
        url: "/get-information-product",
        data: {
            IDSanPham: IDSanPham,
        },
        success: function (response) {
            document.getElementsByClassName("form-edit-product")[0].innerHTML =
                response;
            CKEDITOR.replace("ckeditor2");
            // $("#ckeditor2").val("<p>hello</p>");
        },
    });
}
function closeModalEditProduct() {
    document.getElementsByClassName("form-edit-product")[0].style.display =
        "none";
    document.getElementsByClassName("management-product")[0].style.display =
        "block";
}

function editProduct(IDSanPham) {
    $.ajax({
        method: "GET",
        url: "/edit-product",
        data: {
            IDSanPham: IDSanPham,
            IDNhomSP: document.getElementById("groupProduct").value,
            IDThuongHieu: document.getElementsByName("thuongHieu")[0].value,
            TenSP: document.getElementById("nameProduct").value,
            GiaSP: document.getElementById("price").value,
            MoTa: CKEDITOR.instances["ckeditor2"].getData(),
        },
        success: function (response) {
            document.getElementsByClassName(
                "form-edit-product"
            )[0].style.display = "none";
            document.getElementsByClassName(
                "management-product"
            )[0].style.display = "block";
            $("#product").html(response);
        },
    });
}

function openFormAdd(name) {
    document.getElementsByClassName("form-add-" + name)[0].style.display =
        "block";
    document.getElementsByClassName("management-" + name)[0].style.display =
        "none";
}
function closeModalAdd(name) {
    document.getElementsByClassName("form-add-" + name)[0].style.display =
        "none";
    document.getElementsByClassName("management-" + name)[0].style.display =
        "block";
}

function addCategoryProduct() {
    $.ajax({
        method: "GET",
        url: "/add-category-product",
        data: {
            TenNhom: document.getElementsByName("group")[0].value,
        },
        success: function (response) {
            document.getElementsByClassName(
                "form-add-category"
            )[0].style.display = "none";
            document.getElementsByClassName(
                "management-category"
            )[0].style.display = "block";
            $("#page_category").html(response);
        },
    });
}
function openFormEditCategory(IDNhomSP) {
    document.getElementsByClassName("form-edit-category")[0].style.display =
        "block";
    document.getElementsByClassName("management-category")[0].style.display =
        "none";
    $.ajax({
        method: "GET",
        url: "/get-information-category",
        data: {
            IDNhomSP: IDNhomSP,
        },
        success: function (response) {
            document.getElementsByClassName("form-edit-category")[0].innerHTML =
                response;
        },
    });
}

function editCategoryProduct(IDNhomSP) {
    $.ajax({
        method: "GET",
        url: "/edit-category-product",
        data: {
            IDNhomSP: IDNhomSP,
            TenNhom: document.getElementById("group").value,
        },
        success: function (response) {
            document.getElementsByClassName(
                "form-edit-category"
            )[0].style.display = "none";
            document.getElementsByClassName(
                "management-category"
            )[0].style.display = "block";
            $("#page_category").html(response);
        },
    });
}

function closeModalEditCategory() {
    document.getElementsByClassName("form-edit-category")[0].style.display =
        "none";
    document.getElementsByClassName("management-category")[0].style.display =
        "block";
}

function deleteProduct(IDSanPham) {
    $.ajax({
        method: "GET",
        url: "/delete-product",
        data: {
            IDSanPham: IDSanPham,
        },
        success: function (response) {
            document.getElementById(IDSanPham + "product").remove();
        },
    });
}

function deleteCategoryProduct(IDNSP) {
    $.ajax({
        method: "GET",
        url: "/delete-category-product",
        data: {
            IDNSP: IDNSP,
        },
        success: function (response) {
            document.getElementById(IDNSP + "category").remove();
        },
    });
}

function updateOrder(IDDonHang) {
    $.ajax({
        method: "GET",
        url: "/update-status-order",
        data: {
            IDDonHang: IDDonHang,
            Status: document.getElementById("status").value,
        },
        success: function (response) {
            $("#page-order").html(response);
            document.getElementById("detail-order").style.display = "none";
            document.getElementsByClassName(
                "management-order"
            )[0].style.display = "block";
        },
    });
}

function openDetailOrder(IDDonHang) {
    document.getElementById("detail-order").style.display = "block";
    document.getElementsByClassName("management-order")[0].style.display =
        "none";

    $.ajax({
        method: "GET",
        url: "/get-detail-order",
        data: {
            IDDonHang: IDDonHang,
        },
        success: function (response) {
            $("#detail-order").html(response);
        },
    });
}
