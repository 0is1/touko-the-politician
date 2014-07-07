(function() {
  var $_ = jQuery, default_menu;
  default_menu = $_('#main-nav .menu-items .default-menu')
  if (default_menu.length > 0) {
    default_menu.remove();
  }
  $_(window).load(function(){
    // var transition_effect = slider_values.transition_effect || 'scrollLeft', transition_delay = slider_values.transition_delay || 9999999999, transition_duration = slider_values.transition_duration || 500;
    try{
      $_('.slider-cycle').cycle({
        fx: 'scrollLeft',
        pager: '#controllers',
        activePagerClass: 'active',
        timeout: 9999999999,
        speed: 500,
        pause: 1,
        pauseOnPagerHover: 1,
        width: '100%',
        containerResize: 0,
        fit: 1,
        after: function () {
          $_(this).parent().css("height", $_(this).height())
        },
        cleartypeNoBg: true
      });
    } catch (e){}
  });
  $_(window).resize(function() {
    var newHeight = $_(".slider-cycle .displayblock").height();
    $_(".slider-cycle").css("height", newHeight);
  });
})();