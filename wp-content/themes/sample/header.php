<!DOCTYPE html><!--[if lt IE 9]>
<html class='lt-ie9 no-js' lang='en'>
<![endif]-->
<!--[if gte IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="robots" content="follow">
  <meta name="author" content="">
  <meta name="copyright" content="">
  <!-- <meta name="description"> -->
  <meta name="keywords" content="keywords here">
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="/">
  <meta property="og:image" content="">
  <meta property="og:description">
  <meta property="og:site_name" content="">
  <meta property="article:published_time" content="">
  <meta property="article:author" content="">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:creator" content="">
  <meta name="twitter:url" content="/">
  <meta name="twitter:title" content="">
  <meta name="twitter:description">
  <meta name="twitter:image" content="">
  <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="/favicon.ico" rel="icon" type="image/x-icon">
  
    <?php wp_head(); ?>

  <script async src="https://www.googletagmanager.com/gtag/js?id=GTM_CODE_HERE"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'GTM_CODE_HERE');
  </script>

</head>

<body>

    <?php
      $header_data = ThemeComponents\Shared\Header::get_data();
      sample_theme_render( 'templates/content', 'header', $header_data );
    