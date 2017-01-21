;(function($) {

  'use strict';

  var activeClass = 'is-active';

  function openDialog() {
    var data         = $(this).data('trigger'),
      activeDialog = $('.js-dialog[data-dialog="' + data + '"]'),
      ipAddress    = $(this).closest('tr').find('.antifraud__address').text();

      var action = {
        delete: function() {
              activeDialog.find('.js-address').html(ipAddress);
            },
        edit: function() {
            activeDialog.find('.js-address').val(ipAddress);
          },
        add: function() {
            console.log('actions with add dialog window');
          }
      };

    action[data]();

    activeDialog.addClass(activeClass);
    $('body').addClass('overflow-hidden');
  }

  function closeDialog() {
    $(this).closest('.js-dialog').removeClass(activeClass);
    $('body').removeClass('overflow-hidden');
  }

  function addInput() {
    var input = $('.js-ip-input').clone().removeClass('js-ip-input').val('');

    $('.js-input-list').append(input);
  }

  function addFile(e) {
    var fileName = $(e.target).val().replace(/C:\\fakepath\\/i, '');

    $('.js-drop').addClass('is-hidden');
    $('.js-file-name').html(fileName);
    $('.js-file-list').removeClass('is-hidden');
  }

  function deleteFile() {
    $('.js-input-file').val('');
    $('.js-drop').removeClass('is-hidden');
    $('.js-file-name').html('');
    $('.js-file-list').addClass('is-hidden');
  }

  function init() {
    $(document).on('click', '.js-dialog-trigger', openDialog);
    $(document).on('click', '.js-close', closeDialog);
    $(document).on('click', '.js-add-input', addInput);
    $(document).on('click', '.js-delete-file', deleteFile);
    $(document).on('change', '.js-input-file', addFile);
  }

  $(document).on('DOMContentLoaded', init);
  
})(jQuery);