(function($) {
  $(function() {
  //testing
  let lastPage = '';
  //make back/forward nav work with history api
  $(window).on('popstate', function() {
    window.location.replace(lastPage);
  });

  //if on home page
  if ($('body.home').length) {
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
      let content = document.getElementById('entry-content');
      let author = document.getElementById('entry-title');
      let source = ' ';
      let quote=response[0];

      //has source with link.  '_qod_quote_source'  '_qod_quote_source_url'
      if (
        quote._qod_quote_source_url.length !== 0 &&
        quote._qod_quote_source.length !== 0
      ) {
        source = `, <a class="quote-link" href=${
          quote._qod_quote_source_url
        } >${quote._qod_quote_source}</a>`;
      } else if (quote._qod_quote_source.length !== 0) {
        //has source

        source = `,&nbsp;${quote._qod_quote_source}`;
      } else {
        //no source
        //keep empty
        source = '';
      }
      //fill new content
      content.innerHTML = quote.content.rendered;
      author.innerHTML = '—' + quote.title.rendered + '<span class="source-part">' +source+'</span>';

      //change url
      const url = quotes_vars.home_url + '/' + quote.slug;
      history.pushState(null, null, url);
    });
  }

  //when click button , get a random new post
  $('#get-new-post').on('click', function(event) {
    event.preventDefault();
    lastPage = document.URL;

    getPost();
  });

  $('.menu li:nth-child(1) a').after('<span>|</span>');
  $('.menu li:nth-child(2) a').after('<span>|</span>');
  $('.menu li:nth-child(4) a').before(
    '<span class="more-divide-mark">|</span><span>Brought to you by</span>'
  );

  function uploadPost() {
    
    let newPost={
      title:  $('#new-author').val(),
      content:   $('#new-content').val(),
      _qod_quote_source:  $('#new-quote-source').val(),
      _qod_quote_source_url:  $('#new-quote-source-url').val(),
      excerpt:{
        protected: false,
        rendered: "<p>"+$('#new-content').val()+"</p>"
      },
      post_status: "publish"
    }
    $.ajax({
      method: 'post',
      data: newPost,
      url: quotes_vars.rest_url + 'wp/v2/posts',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', quotes_vars.wpapi_nonce);
      }
    }).done(function() {
      //empty the input area
      $('#new-author').val('');
      $('#new-content').val('');
      $('#new-quote-source').val('');
      $('#new-quote-source-url').val('')
      alert('Success! Got the new quote.');
    });
  }
  $('#submit-new').on('click', () => {
    if($('#new-author').val()!== ''&&$('#new-content').val() !==''){
      uploadPost();
    } else{
      alert('The "Author of quote" and "Quote" are required.');
    }

  });
});
})(jQuery);
