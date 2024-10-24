$(function () {
  const width1 = window.innerWidth;
  const width2 = $(window).width();
  const scrollbar_num = width1 - width2;

  //ハンバーガーメニュー用JS
  // $(".l-sp__menu__border").click(function () {
  //   $(".l-sp__menu__border").toggleClass("active");
  //   $("#sp_menu").toggleClass("is_open");

  //   $("body").toggleClass("is_sp_menu_open");

  //   if ($("body").hasClass("is_sp_menu_open")) {
  //     $("body,#header").css("padding-right", scrollbar_num);
  //     $("#sp_menu").css("padding-right", scrollbar_num);
  //   } else {
  //     $("body,#header,#sp_menu").removeAttr("style");
  //   }
  // });
  $('.l-sp__menu-border').click(function() {
    $(this).toggleClass('active');
    $("#sp_menu").toggleClass("is_open");
    $("body").toggleClass("is_sp_menu_open");
    });
  $("#sp_gnavi a").click(function () {
    $("#sp_menu").removeClass("is_open");
    $("body").removeClass("is_sp_menu_open");
  });

  //　スムーススクロール
  $('a[href^="#"]').click(function () {
    let speed = 500;
    let href = $(this).attr("href");
    let target = $(href == "#" || href == "" ? "html" : href);
    let position = target.offset().top;
    $("html, body").animate(
      {
        scrollTop: position,
      },
      speed,
      "swing"
    );
    return false;
  });

  // 別ページのから遷移したときのスムーススクロール
  const urlHash = location.hash;
  if (urlHash) {
    $("body,html").stop().scrollTop(0);
    setTimeout(function () {
      let headerHeight = $("#header").height();
      if (location.pathname === "/") {
        headerHeight = 0;
      }
      const target = $(urlHash);
      const position = target.offset().top - headerHeight;
      $("body,html").stop().animate(
        {
          scrollTop: position,
        },
        500
      );
    }, 1000);
  }
});

$(window).scroll(function () {
  //#footerまでスクロールしたら、#page_topにclass="bottom"を付ける／戻ると外す
  scrollHeight = $(document).height();
  scrollPosition = $(window).height() + $(window).scrollTop();
  footHeight = $("footer").innerHeight();
  if (scrollHeight - scrollPosition <= footHeight) {
    $(".p-reserve-btn").addClass("is-bottom");
  } else {
    $(".p-reserve-btn").removeClass("is-bottom");
  }
  // スクロールして、effectクラスの付いた要素が画面内に入ったらactiveクラス付与
  $(".u-effect").each(function () {
    var hit = $(this).offset().top;
    var scroll = $(window).scrollTop();
    var wHeight = $(window).height();
    var customTop = 100;
    if (typeof $(this).data("effect") !== "undefined") {
      // data-effect="任意の値" が設定されている場合
      customTop = $(this).data("effect");
    }
    if (hit + customTop < wHeight + scroll) {
      $(this).addClass("is-active");
    }
  });
});

//ファーストビューの高さをデバイスの高さとそろえる　iPhone表示ずれ対策
// var OPENING = OPENING || {};
// OPENING.VIEW_HEIGHT = {
//   init: function () {
//     this.setParameters();
//     this.setKvHeight();
//     this.bind();
//   },
//   setParameters: function () {
//     this.$window = $(window);
//     this.$target = $("#first_view");
//   },
//   bind: function () {
//     var _self = this;
//     this.$window.on("resize", function () {
//       _self.setKvHeight();
//     });
//   },
//   setKvHeight: function () {
//     this.$target.css("height", this.$window.height());
//   },
// };
// $(function () {
//   OPENING.VIEW_HEIGHT.init();
// });

//COPYとSNSの表示/非表示
window.onscroll = updateVisibility;

//COPYとSNSの表示/非表示する関数を定義
  var footerHeight = $('#footer').innerHeight();

  function updateVisibility() {
    var scrollPoint = window.pageYOffset;
    var docHeight = $(document).height();
    var dispHeight = $(window).height();
    var threshold = docHeight - dispHeight - footerHeight;

    $('.c-copy, .c-side__sns').toggleClass('is-hidden', scrollPoint > threshold);
  }

    //375px以下、viewportを変更
window.addEventListener("DOMContentLoaded", () => {
  const e = document.querySelector('meta[name="viewport"]');

  function t() {
    const t =
      window.outerWidth > 375
        ? "width=device-width,minimum-scale=1,initial-scale=0"
        : "width=375";
    e.getAttribute("content") !== t && e.setAttribute("content", t);
  }
  addEventListener("resize", t, !1), t();
});

  //ページトップボタン
  $(document).ready(function () {
    $(".c-pagetop").hide();
    // ↑ページトップボタンを非表示にする
    $(window).on("scroll", function () {
      if ($(this).scrollTop() > 100) {
        // ↑ スクロール位置が100よりも小さい場合に以下の処理をする
        $(".c-pagetop").fadeIn();
        $(".c-pagetop").slideDown("fast");
        // ↑ (100より小さい時は)ページトップボタンをスライドダウン
      } else {
        $(".c-pagetop").fadeOut();
        $(".c-pagetop").slideUp("fast");
        // /↑ それ以外の場合の場合はスライドアップする。
      }

      // フッター固定する
      scrollHeight = $(document).height();
      // ドキュメントの高さ
      scrollPosition = $(window).height() + $(window).scrollTop();
      //　ウィンドウの高さ+スクロールした高さ→　現在のトップからの位置
      footHeight = $("footer").innerHeight();
      // フッターの高さ
      if (scrollHeight - scrollPosition <= footHeight) {
        // 現在の下から位置が、フッターの高さの位置にはいったら
        //  "#pagetop"のpositionをabsoluteに変更し、フッターの高さの位置にする
        var w = $(window).width();
        var x = 767;
        if (w > x) {
          $(".c-pagetop").css({
           position: "absolute",
            right: "40px",
            bottom: "30px"
          });
        } else {
          $(".c-pagetop").css({
            position: "absolute",
            right: "40px",
            bottom: "15px",
          });
        }
      } else {
        // それ以外の場合は元のcssスタイルを指定;
        var w = $(window).width();
        var x = 767;
        if (w >= x) {
          $(".c-pagetop").css({
            position: "fixed",
            right: "40px",
            bottom: "30px",
          });
        } else {
          $(".c-pagetop").css({
            position: "fixed",
            // top: "0px",
            right: "40px",
            bottom: "60px",
          });
        }
      }
    });
  });
  // トップへスムーススクロール
  $(".c-pagetop").click(function () {
    $("body, html").animate(
      {
        scrollTop: 0,
      },
      500
    );
    // ページのトップへ 500 のスピードでスクロールする
    return false;
  });