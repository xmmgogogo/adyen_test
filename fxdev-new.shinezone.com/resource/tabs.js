;(function () {
  'use strict';

  var activeClass = 'is-active';

  function changeTabContent(e) {
    if(!this.classList.contains(activeClass)) {
      var tabContainer = this.parentNode.parentNode,
        tabSiblings  = this.parentNode.children,
        tabTrigger   = this.getAttribute('data-trigger'),
        tabContent   = tabContainer.querySelectorAll('[data-target]'),
        activeTarget = tabContainer.querySelectorAll('[data-target=' + tabTrigger + ']')[0];

      for (var i = 0; i < tabSiblings.length; i++) {
        tabSiblings[i].classList.remove(activeClass);
        tabContent[i].classList.remove(activeClass);
      }

      this.classList.add(activeClass);
      activeTarget.classList.add(activeClass);
    }
  }

  function addListeners(elem, event, action) {
    for (var i=0; i < elem.length; i++) {
      elem[i].addEventListener(event, action, false);
    }
  }

  function init() {
    var tabs = document.querySelectorAll('.js-tab');
    addListeners(tabs, 'click', changeTabContent);
  }

  document.addEventListener('DOMContentLoaded', function(e) {
    init();
  });

})();