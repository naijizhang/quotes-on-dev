(function($) {
  //testing
  //console.log(quotes_vars);

  $('#get-new-post').on('click', function(event) {
    event.preventDefault();
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
      //console.log(response);
      let content = document.getElementById('entry-content');
      let author = document.getElementById('entry-title');
      content.innerHTML = response[0].content.rendered;
      author.innerHTML = '—'+response[0].title.rendered;
      //window.location = response[0].link;
    });
  });
})(jQuery);
