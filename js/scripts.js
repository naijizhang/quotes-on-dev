(function($) {
  //testing
  //console.log(quotes_vars);

  //if on home page
  if( $('body.home').length ){
    getPost(); //initalization
  }
  
  //get a random new post
  function getPost() {
    $.ajax({
      method: 'GET',
      url:
        quotes_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', quotes_vars.wpapi_nonce);
      },
      dataType: 'json'
    }).done(function(response) {
      //console.log(response[0]);
      let content = document.getElementById('entry-content');
      let author = document.getElementById('entry-title');
      let source = ' ';

      //has source with link.  '_qod_quote_source'  '_qod_quote_source_url'
      if (
        response[0]._qod_quote_source_url.length !== 0 &&
        response[0]._qod_quote_source.length !== 0
      ) {
        source = `, <a class="quote-link" href=${
          response[0]._qod_quote_source_url
        } >${response[0]._qod_quote_source}</a>`;
      } else if (response[0]._qod_quote_source.length !== 0) {
        //has source

        source = `,${response[0]._qod_quote_source}`;
      } else {
        //no source
        //keep empty
        source = '';
      }
      //fill new content
      content.innerHTML = response[0].content.rendered;
      author.innerHTML = '—' + response[0].title.rendered + source;
    });
  }

  //when click button , get a random new post
  $('#get-new-post').on('click', function(event) {
    event.preventDefault();
    getPost();
  });

  $('.menu-item-222 a').after('<span>|</span>');
  $('.menu-item-221 a').after('<span>|</span>');
  $('.menu-item-219 a').before('<span>Brought to you by</span>');
})(jQuery);
