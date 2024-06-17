jQuery(document).ready(function($) {
  $('#iching-button').click(function() {
      console.log('click');
      $.post(
        my_ajax_obj.ajax_url,
        {
          action: 'get_divination',
        },
        function(data){
          console.log(data);
        }
      );
  });
});
