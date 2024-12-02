$(document).ready(function () {
    //  Get category by product using ajax
    $(document).on("click", ".getCategoryProducts", function () {
        let cat_id = $(this).attr("category_id");
        $.ajax({
            method: "get",
            url: `get-category-product/${cat_id}`,
            success: function (resp) {
                $(".show_category_products").html(resp);
            },
            error: function () {
                alert("Error");
            },
        });
    });

    //  Cart Add Product
    $(document).on("submit", "#addToCartProduct", function (e) {
        e.preventDefault();
        var formdata = $(this).serialize();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/add-to-cart-product",
            type: "POST",
            data: formdata,
            success: function (resp) {
                if (resp.status == "success") {
                    updateMiniCart();
                    toastr.success(resp.message);
                    $("#quickAddToCartModel").modal("hide");
                } else {
                    toastr.error(resp.message);
                    $("#quickAddToCartModel").modal("hide");
                }
            },
            error: function () {
                toastr.error("Something is wrong!");
            },
        });
    });

    //  Cart Add
    $(document).on("click", ".addToCart", function () {
        let product_id = $(this).attr("product_id");
        let quantity = $(this).attr("quantity");
        // alert(product_id);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/add-to-cart",
            type: "POST",
            data: { product_id: product_id, quantity: quantity },
            success: function (resp) {
                $("#appendAddToCartModalContent").html(resp.view);
            },
            error: function () {
                toastr.error("Something is wrong!");
            },
        });
    });

    //  Cart Update
    $(document).on("click", ".updateCartItem", function () {
        let cart_id = $(this).data("cartid");
        let qty = $(this).data("qty");
        if ($(this).hasClass("plus-btn")) {
            var new_qty = parseInt(qty) + 1;
        }
        if ($(this).hasClass("minus-btn")) {
            if (parseInt(qty) <= 1) {
                toastr.error("Item quantity must be 1 or greater!");
                return false;
            }
            var new_qty = parseInt(qty) - 1;
        }
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "cart/update",
            type: "POST",
            data: { cart_id: cart_id, new_qty: new_qty },
            success: function (resp) {
                if (resp.status == "success") {
                    $("#appendCartItems").html(resp.view);
                    // toastr.success(resp.message);
                    updateMiniCart();
                } else {
                    toastr.error(resp.message);
                }
            },
            error: function () {
                toastr.error("Something is wrong");
            },
        });
    });

    //  Cart Delete
    $(document).on("click", ".cartDelete", function () {
        let cart_id = $(this).data("id");
        // alert(cart_id);
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "cart/delete",
            type: "POST",
            data: { cart_id: cart_id },
            success: function (resp) {
                console.log(resp);
                if (resp.status == "success") {
                    $("#appendCartItems").html(resp.view);
                    updateMiniCart();
                    toastr.success(resp.message);
                } else {
                    toastr.error(resp.message);
                }
            },
            error: function () {
                alert("error");
            },
        });
    });

    //  update modal quantity
    $(document).on("click", ".updateModalQuantity", function () {
        var quantity = $("#qty").val();
        if ($(this).hasClass("increase")) {
            var new_qty = parseInt(quantity) + 1;
        }
        if ($(this).hasClass("decrease")) {
            if (parseInt(quantity) <= 1) {
                toastr.error("Item quantity must be 1 or greater!");
                return false;
            }
            var new_qty = parseInt(quantity) - 1;
        }
        $("#qty").val(new_qty);
    });

    //  update quantity
    $(document).on("click", ".updateQuantity", function () {
        var quantity = $("#qntnumber").val();
        if ($(this).hasClass("increase")) {
            var new_qty = parseInt(quantity) + 1;
        }
        if ($(this).hasClass("decrease")) {
            if (parseInt(quantity) <= 1) {
                toastr.error("Item quantity must be 1 or greater!");
                return false;
            }
            var new_qty = parseInt(quantity) - 1;
        }
        $("#qntnumber").val(new_qty);
    });
});

//  Update Mini Cart Item
function updateMiniCart() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/mini-cart/update",
        type: "POST",
        success: function (resp) {
            if (resp.status == "success") {
                console.log(resp);
                $(".miniCartItemCount").html(resp.getCountCartItems);
                $("#getCountAmount").html(resp.getCountAmount);
            } else {
                toastr.error(resp.message);
            }
        },
        error: function () {
            alert("error");
        },
    });
}
