/*Logo*/

$('#admin aside .brand-text').remove();
$('#admin aside .brand-link').html(
    '<img src="/img/logo/logo.jpg" class="img-fluid logo-aside">'
);
$('#admin .nav-sidebar > li:last-child').prepend(
  '<svg id="efecto-salir" class="g-pos-abs g-bottom-0 g-left-0 g-right-0" version="1.1" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="70px" viewBox="0 0 300 70">\n' +
    '                        <path d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428 c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#ffffff"></path>\n' +
    '                      </svg>'
);