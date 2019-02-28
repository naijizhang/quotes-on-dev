(function($) {
  //testing
  //console.log(quotes_vars);
  getPost(); //initalization

  //get a random new post
function getPost(){
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
    console.log(response[0]);
    let content = document.getElementById('entry-content');
    let author = document.getElementById('entry-title');
    let quote_hasLink = document.getElementById('quote-meta-hasLink');
    let quote_onlyText = document.getElementById('quote-meta-onlyText');
    
    //reset the quote container
    quote_hasLink.innerHTML='';
    quote_onlyText.innerHTML='';

    //fill new content
    content.innerHTML = response[0].content.rendered;
    author.innerHTML = '—'+response[0].title.rendered;

    //has source with link.  '_qod_quote_source'  '_qod_quote_source_url'
    if( response[0]._qod_quote_source_url.length!==0 && response[0]._qod_quote_source.length!==0){
      quote_hasLink.innerHTML= `<h2 class="quote-area">, <a class="quote-link" href=${response[0]._qod_quote_source_url} >${response[0]._qod_quote_source}</a></h2>`;
       
    } else if(response[0]._qod_quote_source.length!==0){ //has source
     // quote_hasLink.empty(); 
      quote_onlyText.innerHTML= `<h2 class="quote-area">,${response[0]._qod_quote_source}</h2>`;
    } else{ //no source
        //keep empty
    }


  });

}

//when click button , get a random new post
  $('#get-new-post').on('click', function(event) {
    event.preventDefault();
    getPost();
  });


  $( ".menu-item-222 a" ).after( "<span>|</span>" );
  $( ".menu-item-221 a" ).after( "<span>|</span>" );
  $( ".menu-item-219 a" ).before( "<span>Brought to you by</span>" );
  
})(jQuery);
