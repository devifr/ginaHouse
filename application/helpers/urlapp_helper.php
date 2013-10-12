<?php

//output : images folder path
if ( ! function_exists('images_url'))
{
  function images_url($uri = '')
  {
    $CI =& get_instance();
    return base_url()."asset/images/".$uri;
  }
}

if ( ! function_exists('gallery_url'))
{
  function gallery_url($uri = '')
  {
    $CI =& get_instance();
    return base_url()."gallery/".$uri;
  }
}

//output : css folder path
if ( ! function_exists('css_url'))
{
  function css_url($uri = '')
  {
    $CI =& get_instance();
    return base_url()."asset/css/".$uri;
  }
}

//output : javascript folder path
if ( ! function_exists('js_url'))
{
  function js_url($uri = '')
  {
    $CI =& get_instance();
    return base_url()."asset/js/".$uri;
  }
}

if ( ! function_exists('catalog_url'))
{
  function catalog_url($uri = '')
  {
    $CI =& get_instance();
    return base_url()."catalog/".$uri;
  }
}

?>