$(function () {

    $(document).on("click", "a[href*='#']", function () {

        var linka = ($(this).prop("href").split('#')[1]);


        if (location.pathname == "/download-center") {
            if (linka == "presentations" || linka == "lists" || linka == "catalog") {
                $(".download-info-tabs span[data-hash='#" + linka + "']").click();
            }
        }

    });

});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('body').on('click', '#feedbackBtn', function () {

    Swal.showLoading();
    $.ajax({
        type: 'POST',
        url: '/feedback',
        data: $(this).closest('form').serialize(),
        dataType: 'json',
        success: function (response) {
            Swal.close();
            if (response.status == 1) {
                $(".contacts-us__form form")[0].reset();
                Swal.fire(response.title, response.content, 'success');
            } else {
                Swal.fire({
                    icon: 'error',
                    text: response.error
                });
            }
        },
        error: function () {
            Swal.close();
            Swal.fire({
                icon: 'error',
                text: 'Что-то пошло не так!'
            });
        }
    });
});


$('body').on('change', '#manufacturer_id', function () {

    var category = document.getElementById("industry-1");
    var manufacturer = document.getElementById("manufacturer_id");
    var industry = document.getElementById("industry_id");
    var search_dd = document.getElementById("search_dd");
    var subcategory_id = document.getElementById("subcategory_id");

    var category_id = category.options[category.selectedIndex].value;
    var manufacturer_id = manufacturer.options[manufacturer.selectedIndex].value;
    var industry_id = industry.options[industry.selectedIndex].value;
    var search_dd = search_dd.value;
    var subcategory_id = subcategory_id.value;
    Swal.showLoading();
    $.ajax({
        type: 'POST',
        url: '/catalogs/filter',
        data: {
            category_id: category_id,
            manufacturer_id: manufacturer_id,
            industry_id: industry_id,
            subcategory_id: subcategory_id,
            "query": search_dd
        },
        dataType: 'json',
        success: function (response) {
            Swal.close();
            $('.main-title h3').html(response.title)
            $('.breadcrumb-active a').html(response.title)
            if (category_id == "null") {
                $('.breadcrumb-active a').html("Все")
            }
            $('.catalog-inner-box').html(response.html)
        },
        error: function () {
            Swal.close();
            Swal.fire({
                icon: 'error',
                text: 'Что-то пошло не так!'
            });
        }
    });


});


$('body').on('change', '#industry_id', function () {
    var category = document.getElementById("industry-1");
    var manufacturer = document.getElementById("manufacturer_id");
    var industry = document.getElementById("industry_id");
    var search_dd = document.getElementById("search_dd");
    var subcategory_id = document.getElementById("subcategory_id");

    var category_id = category.options[category.selectedIndex].value;
    var manufacturer_id = manufacturer.options[manufacturer.selectedIndex].value;
    var industry_id = industry.options[industry.selectedIndex].value;
    var search_dd = search_dd.value;
    var subcategory_id = subcategory_id.value;
    console.log(1);

    Swal.showLoading();


    $.ajax({
        type: 'POST',
        url: '/catalogs/filter',
        data: {
            category_id: category_id,
            manufacturer_id: manufacturer_id,
            industry_id: industry_id,
            subcategory_id: subcategory_id,
            "query": search_dd
        },
        dataType: 'json',
        success: function (response) {
            Swal.close();
            $('.main-title h3').html(response.title)
            $('.breadcrumb-active a').html(response.title)
            if (category_id == "null") {
                $('.breadcrumb-active a').html("Все")
            }
            $('.catalog-inner-box').html(response.html)
        },
        error: function () {
            Swal.close();
            Swal.fire({
                icon: 'error',
                text: 'Что-то пошло не так!'
            });
        }
    });
});

window.loadmm = true;
$('body').on('change', '#subcategory_id', function () {

    var category = document.getElementById("industry-1");
    var manufacturer = document.getElementById("manufacturer_id");
    var industry = document.getElementById("industry_id");
    var search_dd = document.getElementById("search_dd");
    var subcategory_id = document.getElementById("subcategory_id");

    var category_id = category.options[category.selectedIndex].value;
    var manufacturer_id = manufacturer.options[manufacturer.selectedIndex].value;
    var industry_id = industry.options[industry.selectedIndex].value;
    var search_dd = search_dd.value;
    var subcategory_id = subcategory_id.value;

    if (window.loadmm) {
        Swal.showLoading();
    }
    $.ajax({
        type: 'POST',
        url: '/catalogs/filter',
        data: {
            category_id: category_id,
            manufacturer_id: manufacturer_id,
            industry_id: industry_id,
            subcategory_id: subcategory_id,
            "query": search_dd
        },
        dataType: 'json',
        success: function (response) {
            Swal.close();
            $('.main-title h3').html(response.title)
            $('.breadcrumb-active a').html(response.title)
            if (category_id == "null") {
                $('.breadcrumb-active a').html("Все")
            }
            $('.catalog-inner-box').html(response.html)
        },
        error: function () {
            Swal.close();
            Swal.fire({
                icon: 'error',
                text: 'Что-то пошло не так!'
            });
        }
    });


});

if ($("div").is(".onajax")) {
    window.loadmm = false;
    $("#subcategory_id").change();
    setTimeout(function () {
        window.loadmm = true;
    }, 500);
}

$('body').on('change', '#industry-1', function () {

    var category = document.getElementById("industry-1");
    var manufacturer = document.getElementById("manufacturer_id");
    var industry = document.getElementById("industry_id");
    var search_dd = document.getElementById("search_dd");
    var subcategory_id = document.getElementById("subcategory_id");

    var category_id = category.options[category.selectedIndex].value;
    var manufacturer_id = manufacturer.options[manufacturer.selectedIndex].value;
    var industry_id = industry.options[industry.selectedIndex].value;
    var search_dd = search_dd.value;
    var subcategory_id = subcategory_id.value;

    subcategory_id = "null";
    industry_id = 'null';
    manufacturer_id = 'null';
    $.ajax({
        type: 'POST',
        url: '/get-subcatalog',
        data: {
            category_id: category_id,
        },
        success: function (response) {
            console.log(response);
            let subcategory = $("#subcategory_id");
            let industry = $("#industry_id");
            let manufacturer = $("#manufacturer_id");
            industry.html(response[1]);
            industry.selectpicker('refresh');
            subcategory.html(response[0]);
            subcategory.selectpicker('refresh');
            manufacturer.html(response[2]);
            manufacturer.selectpicker('refresh');
            console.log(response[2]);
        },
        error: function () {

        }
    });

    Swal.showLoading();
    console.log(1);
    $.ajax({
        type: 'POST',
        url: '/catalogs/filter',
        data: {
            category_id: category_id,
            manufacturer_id: manufacturer_id,
            industry_id: industry_id,
            subcategory_id: subcategory_id,
            "query": search_dd
        },
        dataType: 'json',
        success: function (response) {
            Swal.close();
            console.log(1);
            $('.main-title h3').html(response.title)
            $('.breadcrumb-active a').html(response.title)
            $('#industry_id option').html(response.title)
            $('#manufacturer_id option').html(response.title)
            if (category_id == "null") {
                $('.breadcrumb-active a').html("Все")
            }
            $('.catalog-inner-box').html(response.html)
        },
        error: function () {
            Swal.close();
            Swal.fire({
                icon: 'error',
                text: 'Что-то пошло не так!'
            });
        }
    });
});


$('body').on('click', '.share', function () {
    if ($(this).attr('data-url') == '') {
        // alert('выберите социальный сеть');
    } else {
        window.open($(this).attr('data-url'), '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
    }
});


