/**
 * @file
 * Global utilities.
 *
 */
(function($, Drupal) {

  'use strict';

  Drupal.behaviors.drupal_sessions = {
    attach: function(context, settings) {

      // Custom code here
      $('.responsive').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
      });

    }
  };

})(jQuery, Drupal);
