'use strict';

import $ from 'jquery';

// class based approach
export default class SiteHeader {

  constructor() {
    this.header = $('.site-header');
    // const _self = this;

    // _self.hideHeader();
  }

  hideHeader() {
    this.header.slideUp();
  }
}