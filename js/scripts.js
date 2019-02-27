(function( $ ) {
    //testing
    console.log(quotes_vars);

    
    $('#get-new-post').on('click', function(event) {
        event.preventDefault();
        $.ajax({
           method: 'POST',
           url: quotes_vars.rest_url + 'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
           beforeSend: function(xhr) {
              xhr.setRequestHeader( 'X-WP-Nonce', quotes_vars.wpapi_nonce );
           },
            data: {
           },
        }).done( function(response) {
           console.log(123);
           
        });
     });

   
 })( jQuery );