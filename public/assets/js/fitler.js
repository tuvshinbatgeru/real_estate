var sliderOptionsMobile = {
  item: 2,
  autoWidth: false,
  slideMove: 1, // slidemove will be 1 if loop is true
  slideMargin: 10
};

var sliderOptions = {
  item: 8,
  autoWidth: false,
  slideMove: 1, // slidemove will be 1 if loop is true
  slideMargin: 10,

  addClass: "",
  mode: "slide",
  useCSS: true,
  cssEasing: "ease", //'cubic-bezier(0.25, 0, 0.25, 1)',//
  easing: "linear", //'for jquery animation',////

  speed: 400, //ms'
  auto: false,
  loop: false,
  slideEndAnimation: true,
  pause: 2000,

  keyPress: false,
  controls: true,
  prevHtml: "",
  nextHtml: "",

  rtl: false,
  adaptiveHeight: false,

  vertical: false,
  // verticalHeight: 500,
  // vThumbWidth: 100,

  thumbItem: 10,
  pager: false,
  gallery: false,
  galleryMargin: 5,
  thumbMargin: 5,
  currentPagerPosition: "middle",

  enableTouch: true,
  enableDrag: true,
  freeMove: true,
  swipeThreshold: 40,

  responsive: [],

  onBeforeStart: function(el) {},
  onSliderLoad: function(el) {},
  onBeforeSlide: function(el) {},
  onAfterSlide: function(el) {},
  onBeforeNextSlide: function(el) {},
  onBeforePrevSlide: function(el) {}
};

function destroySlider() {
  slider.destroy();
}

function rebuildSlider() {
  if (!slider.lightSlider) {
    slider = $("#lightSlider").lightSlider(sliderOptions);
  }
}

function initSelectOptions() {
  $(".options").each(function(index, value) {
    if ($(this).data("id") === 0) {
      $(this).show();
    }
  });
}

$(function() {
  if ($(window).width() <= 1024) {
    var slider = $("#lightSlider").lightSlider(sliderOptionsMobile);
  } else {
    var slider = $("#lightSlider").lightSlider(sliderOptions);
  }

  $(".advanced-search").click(function() {
    console.log($(this).data("opens"));
    if ($(window).width() <= 1024) {
      if ($(this).data("opens") === 0) {
        slider.destroy();
        slider.css({
          display: "grid",
          gridTemplateColumns: "1fr 1fr",
          gridColumnGap: "15px"
        });
        $(this).data("opens", 1);
      } else {
        if (!slider.lightSlider) {
          slider.removeAttr("style");
          slider = $("#lightSlider").lightSlider(sliderOptionsMobile);
        }
        $(this).data("opens", 0);
      }
    } else {
      if ($(this).data("opens") === 0) {
        slider.destroy();
        slider.css({
          display: "grid",
          gridTemplateColumns: "1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr",
          gridColumnGap: "15px"
        });
        $(this).data("opens", 1);
      } else {
        if (!slider.lightSlider) {
          slider.removeAttr("style");
          slider = $("#lightSlider").lightSlider(sliderOptions);
        }
        $(this).data("opens", 0);
      }
    }
  });

  $(window).scroll(function() {
    var topPos = $(this).scrollTop();
    if (topPos > 30) {
      $("header").addClass("scrolled");
    } else {
      $("header").removeClass("scrolled");
    }
  });

  initSelectOptions();
  var $selectTitle = $(".custom-select-title");
  var $option = $(".custom-select-options .option");
  var $firstOptions = $(".custom-select-item ul li");

  $selectTitle.each(function(index, value) {
    $(this).on("click", function() {
      var $open = $(this)
        .siblings(".custom-select-options")
        .addClass("open");
      $open.fadeToggle("fast");
    });
  });

  $option.on("click", function() {
    var selectedOption = $(this).data("value");
    $(this)
      .parents(".custom-select-options")
      .siblings(".custom-select-title")
      .find(".selected-value")
      .html(selectedOption);
    $(this)
      .parents(".custom-select-options")
      .hide();
    // console.log(selectedOption);
  });

  $firstOptions.each(function(index, value) {
    $(this).on("click", function() {
      var selectedId = $(this).data("id");
      $(".options").hide();
      $(".options").each(function(index, value) {
        if ($(this).data("id") === selectedId) {
          $(this).show();
        }
      });
    });
  });
});
