'use strict';

import SiteHeader from './js/components/SiteHeader';
import Accordion from './js/components/Accordion';

$(() => {

  if($('.site-header').length) {
    new SiteHeader();
  }

  const $accordion = $('.accordion');
  
  if($accordion.length) {
    $accordion.map((i, ele) => {
      const $block = $(ele);
      new Accordion($block);
    })
  }

})();
