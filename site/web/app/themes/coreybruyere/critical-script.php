
<script>
  // Load CSS async
  function loadCSS(e,t,n){"use strict";function o(){var t;for(var i=0;i<s.length;i++){if(s[i].href&&s[i].href.indexOf(e)>-1){t=true}}if(t){r.media=n||"all"}else{setTimeout(o)}}var r=window.document.createElement("link");var i=t||window.document.getElementsByTagName("script")[0];var s=window.document.styleSheets;r.rel="stylesheet";r.href=e;r.media="only x";i.parentNode.insertBefore(r,i);o();return r}
  var stylesheet = loadCSS( '<?php bloginfo('template_url'); ?>/dist/styles/critical.css' );

  // onLoad CSS set cookie
  function onloadCSS(n,o){n.onload=function(){n.onload=null,o&&o.call(n)},"isApplicationInstalled"in navigator&&"onloadcssdefined"in n&&n.onloadcssdefined(o)}
  onloadCSS( stylesheet, function() {
    var expires = new Date(+new Date + (7 * 24 * 60 * 60 * 1000)).toUTCString();
    document.cookie = 'fullCSS=true; expires=' + expires;
  });

</script>

<noscript>
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/dist/styles/main.css">
</noscript>