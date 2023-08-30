'use strict';

import $ from 'jquery';

export default class Accordion {

  constructor($block) {
    const _self = this;
    this.block = $block;
    this.items = $('.accordion-item', this.block);
    this.accBtns = $('.accordion-heading button', this.items);
    this.accTabs = $('.accordion-body .tab-btn', this.items);

    this.accBtns.on('click', e => {
      const $this = $(e.currentTarget);
      _self.openItem($this); 
    });
    
  }

  openItem($btn) {
    const $parent = $btn.parents('.accordion-item');

    if($parent.hasClass('active')) {
      $parent.removeClass('active');
      $btn.find('i.icon').removeClass('icon-minus').addClass('icon-plus');
      this.items.removeClass('active').find('.accordion-body').slideUp();
    } else {
      this.items.removeClass('active').find('.accordion-body').slideUp();
      this.accBtns.find('i.icon').removeClass('icon-minus').addClass('icon-plus');
      $btn.find('i.icon').removeClass('icon-plus').addClass('icon-minus');
      $btn.parent().siblings('.accordion-body').slideDown();
      $parent.addClass('active');
    }

  }

}