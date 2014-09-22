/* Mobile menu
/*! http://tinynav.viljamis.com v1.1 by @viljamis */
(function ($, window, i) {
  $.fn.tinyNav = function (options) {
    var settings = $.extend({
      'active': 'current-menu-item',
      'header': false
    }, options);
    var counter = -1;
    return this.each(function () {
      i++;
      var $nav = $(this),
        namespace = 'tinynav',
        namespace_i = namespace + i,
        l_namespace_i = '.l_' + namespace_i,
        $select = $('<select/>').addClass(namespace + ' ' + namespace_i);
      if ($nav.is('ul,ol')) {
        if (settings.header) {
          $select.append($('<option/>').text('Valikko'));
        }
        var options = '';
        $nav.addClass('l_' + namespace_i).find('a').each(function () {
          options += '<option value="' + $(this).attr('href') + '">';
          var j;
          for (j = 0; j < $(this).parents('ul, ol').length - 1; j++) {
            options += '- '
          }
          options += $(this).text() + '</option>'

        });
        $select.append(options);
        if (!settings.header) {
          $select.find(':eq(' + $(l_namespace_i + ' li').index($(l_namespace_i + ' li.' + settings.active)) + ')').attr('selected', true)
        }
        $select.change(function () {
          window.location.href = $(this).val()
        });
        $(l_namespace_i).after($select);
        if (settings.label) {
          $select.before($("<label/>").attr("for", namespace_i).addClass(namespace + '_label ' + namespace_i + '_label').append(settings.label))
        }
      }
    })
  }
})(jQuery, this, 0);

jQuery(function () {
  jQuery('#main-nav .menu-items').tinyNav({
    active: 'current-menu-item'
  });
});