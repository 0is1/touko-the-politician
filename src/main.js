(function() {
  var $_ = jQuery;
  $_(window).load(function(){
    var transition_effect = slider_values.transition_effect, transition_delay = slider_values.transition_delay, transition_duration = slider_values.transition_duration;
    $_('.slider-cycle').cycle({
      fx: transition_effect,
      pager: '#controllers',
      activePagerClass: 'active',
      timeout: transition_delay,
      speed: transition_duration,
      pause: 1,
      pauseOnPagerHover: 1,
      width: '100%',
      containerResize: 0,
      fit: 1,
      after: function () {
        jQuery(this).parent().css("height", jQuery(this).height())
      },
      cleartypeNoBg: true
    })
  });
  $_(window).resize(function() {
    var newHeight = $_(".slider-cycle .displayblock").height();
    $_(".slider-cycle").css("height", newHeight);
  });
})();