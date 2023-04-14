$(document).ready(function () {
  $("body").removeAttr("class");
  setTimeout(() => {
    $(".loading").addClass("hide");
    setTimeout(() => {
      $("#loading").remove();
    }, 420);
  }, 200);

  $(".dropdown-toggle").dropdown();

  if (!$("section").attr("breadcrumb")) {
    $(window).scroll(function () {
      $(".navbar.navbar-expand-lg").css({
        transition: ".4s",
      });
      $(".navbar.navbar-expand-lg").toggleClass(
        "active",
        $(window).scrollTop() > 15
      );
    });
  }

  $(".owl-carousel").owlCarousel({
    autoplay: true,
    rewind: true /* use rewind if you don't want loop */,
    /*
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    */
    responsiveClass: true,
    autoHeight: true,
    autoplayTimeout: Math.floor(Math.random() * (4000 - 2000 + 1)) + 1500,
    smartSpeed: 800,
    nav: false,
    responsive: {
      0: {
        items: 1,
      },

      600: {
        items: 2,
      },

      1024: {
        items: 4,
      },

      1366: {
        items: 4,
      },
    },
  });

  var $item = $(".carousel-item");
  var $wHeight = $(window).height();
  $item.eq(0).addClass("active");
  $item.height($wHeight);
  $item.addClass("full-screen");

  $(".carousel img").each(function () {
    var $src = $(this).attr("src");
    var $color = $(this).attr("data-color");
    $(this)
      .parent()
      .css({
        "background-image": "url(" + $src + ")",
        "background-color": $color,
      });
    $(this).remove();
  });

  $("#data").DataTable({
    pageLength: 5,
    lengthMenu: [5, 10, 25, 50, 75, 100],
  });

  const lightbox = GLightbox({
    touchNavigation: true,
    loop: true,
  });

  $(".menu .img .img-fluid").each(function () {
    $(this)
      .parent()
      .css({
        "background-image": `url('${$(this).attr("src")}')`,
      });
  });
  $(".menu-list .card .img-fluid").each(function () {
    $(this)
      .parent()
      .css({
        "background-image": `url('${$(this).attr("src")}')`,
      });
  });
  $(".news .news-head .img-fluid").each(function () {
    $(this)
      .parent()
      .css({
        "background-image": `url('${$(this).attr("src")}')`,
      });
  });

  const newsImage = $(".news-detail .news-header .glightbox .img-fluid");
  if(newsImage.height() > 700) {
    newsImage.attr('width', newsImage.width() - (newsImage.width() * 65 / 100));
  } else if(newsImage.height() > 500) {
    newsImage.attr('width', newsImage.width() - (newsImage.width() * 50 / 100));
  } else if(newsImage.height() > 450) {
    newsImage.attr('width', newsImage.width() - (newsImage.width() * 25 / 100));
  }

  /* Side menu */
  $("#toggle").change(function () {
    let navLink = $(".offcanvas .nav-item .nav-link span");
    let navBrand = $(".offcanvas .navbar-brand .nav-brand-link span");

    if ($("#toggle")[0].checked) {
      $(".offcanvas").toggleClass("show");
      $(".toggle-button .bi").toggleClass("bi-list");
      $(".toggle-button .bi").toggleClass("bi-x");
      $("span.nav-label").each(function (index, elem) {
        $(elem).html($(elem).data("text"));
      });

      navBrand.toggleClass("show");
      navLink.toggleClass("show");
      $(".offcanvas .nav-item .nav-link i.arrow").toggleClass("show");
    } else {
      $(".offcanvas").toggleClass("show");
      $(".toggle-button .bi").toggleClass("bi-list");
      $(".toggle-button .bi").toggleClass("bi-x");
      $("span.nav-label").html('<div class="dot"></div>');

      navBrand.toggleClass("show");
      navLink.toggleClass("show");
      $(".offcanvas .nav-item .nav-link i.arrow").toggleClass("show");
    }
  });

  let toggleHover = $("#on-hover a[data-bs-toggle]");
  let dropdownList = $("#on-hover .dropdown-menu");

  toggleHover.click(function () {
    dropdownList.removeAttr("style");
  });

  $("#on-hover").mouseenter(function () {
    if (toggleHover != null) {
      toggleHover.addClass("show");
      toggleHover.attr("aria-expanded", "false");

      dropdownList.addClass("show");
      dropdownList.attr("data-bs-proper", "static");
    }
  });
  $("#on-hover").mouseleave(function () {
    if (toggleHover != null) {
      toggleHover.removeClass("show");
      toggleHover.removeAttr("aria-expanded");

      dropdownList.removeClass("show");
      dropdownList.removeAttr("data-bs-proper");
    }
  });

  const changeIcon = () => {
    if (window.innerWidth <= 992) {
      let arrow = $("i.arrow");
      arrow.removeClass("bi-caret-right-fill");
      arrow.addClass("bi-caret-down-fill");
    } else {
      let arrow = $("i.arrow");
      arrow.removeClass("bi-caret-down-fill");
      arrow.addClass("bi-caret-right-fill");
    }
  };
  changeIcon();
  $(window).resize(changeIcon);
  /* End side menu */

  $("#profile-img").on("change", function () {
    if ($("#profile-img").get(0).files[0]) {
      const reader = new FileReader();
      reader.onload = function () {
        $(".profile-img .img-fluid").attr("src", reader.result);
      };
      reader.readAsDataURL($("#profile-img").get(0).files[0]);
    }
  });

  $(".login .login-wrapper .form-label").each(function() {
    $(this).click(function() {
      $(this).find('span').addClass('active');
    });
  });

  $("#add").click(function () {
    const text = `Add ${$(this).data("text")}`;
    const table = $(this).data("table");

    $("#formMenu")[0].reset();
    $("#table").val(table);
    $("#thumb").html(null);

    $("#formModalLabel").html(text);
    $('label[for="price"]').text("* Price");
    $('.modal-footer button[type="submit"]').html(text);
  });

  $(".edit").click(function () {
    let text = `${$(this).data("text")}`;
    $("#formModalLabel").html(`Edit ${text}`);
    $('.modal-footer button[type="submit"]').html(`Edit ${text}`);

    text = text == "Image" ? "gallery" : text;
    $(".modal-body form").attr(
      "action",
      `${baseurl}admin/action/edit/${text.toLowerCase()}`
    );

    const id = $(this).data("id");
    const table = $(this).data("table");

    $.ajax({
      url: `${baseurl}admin/getEdit`,
      method: "POST",
      data: {
        id: id,
        table: table,
      },
      dataType: "json",
      success: function (data) {
        $("#table").val(data.table);
        $('label[for="price"]').text("* Price (Original)");

        const url =
          table == "gallery"
            ? "gallery"
            : table == "slider"
            ? "slider"
            : "uploads";
        data = table == "gallery" || table == "news" ? data : data.record;

        const img = `<img src="${baseurl}assets/${url}/${data.image}" class="img-fluid" width="65">`;
        $("#thumb").html(img);

        $("#id").val(data.id);
        if (data.drinkname) {
          $("#name").val(data.drinkname);
        } else {
          $("#name").val(data.foodname);
        }
        $("#price").val(data.price);
        $("#discount").val(data.discount);
        $("#description").val(data.description);

        $("#title").val(data.title);
        $("#news").val(data.news);
      },
    });
  });
});
