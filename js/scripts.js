jQuery(document).ready(function($) {

  

      $("#dialog").dialog({ autoOpen: false, modal: true, dialogClass: 'survey'});

      if(window.location.href.indexOf('?result=1') != -1) {
      $('#dialog').dialog('open');
      }


});
