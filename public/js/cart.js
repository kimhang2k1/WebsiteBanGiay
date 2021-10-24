function addToCart(IDSanPham) {
    $.ajax({
        method: "GET",
        url: "/add-to-cart",
        data: {
            IDSanPham: IDSanPham,
            IDSize: document.getElementById("idsize").value,
            Number: document.getElementById("amount").value,
        },
        success: function (response) {
            $("#my-cart").prepend(response.view);
            $("#number-cart").html(response.num);
            document.getElementsByClassName("box-cart")[0].style.display =
                "block";
            document.getElementsByClassName("content")[0].style.display =
                "block";
            document.body.style.overflow = "hidden";
        },
    });
}

function increaseNumber(STT) {
    var sum = new Number(
        document.getElementById("all-money").innerHTML.replaceAll(",", "")
    );
    var num = new Number(document.getElementById(STT + "number").value);
    num++;
    document.getElementById(STT + "number").value = num;
    var price = new Number(
        document.getElementById(STT + "money").innerText.replaceAll(",", "")
    );
    var bill = num * price;
    sum += price;
    document.getElementById("all-money").innerHTML = sum
        .toString()
        .replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById(STT + "total-money").innerHTML = bill
        .toString()
        .replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    $.ajax({
        method: "GET",
        url: "/change-price",
        data: {
            STT: STT,
            num: num,
        },
        success: function (response) {},
    });
}
function decreaseNumber(STT) {
    var sum = new Number(
        document.getElementById("all-money").innerHTML.replaceAll(",", "")
    );
    var num = new Number(document.getElementById(STT + "number").value);
    num--;
    if (num < 1) num = 1;
    document.getElementById(STT + "number").value = num;
    var price = new Number(
        document.getElementById(STT + "money").innerText.replaceAll(",", "")
    );
    var bill = num * price;
    sum -= price;
    document.getElementById("all-money").innerHTML = sum
        .toString()
        .replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    document.getElementById(STT + "total-money").innerHTML = bill
        .toString()
        .replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ",");
    $.ajax({
        method: "GET",
        url: "/change-price",
        data: {
            STT: STT,
            num: num,
        },
        success: function (response) {},
    });
}

function deleteCart(STT) {
    $.ajax({
        method: "GET",
        url: "/delete-to-cart",
        data: {
            STT: STT,
        },
        success: function (response) {
            if (response == "") {
                document.getElementById(STT + "cart").remove();
            } else {
                document.getElementById("container").innerHTML = response;
            }
        },
    });
}
