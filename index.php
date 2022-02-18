<?php 
require_once 'curl_graph.php';
require_once 'config.php';


//take campaigns:

$getitems = [
  'fields' => 'name,id',
  'access_token' => $fb['access_token']
];

$endpoint = 'act_'.$fb['account_id'].'/campaigns';

$campaigns = go_facebook($endpoint, $getitems, 'GET', $fb);

var_dump($campaigns);

// -------------

// Take campaign's ads list:

$items = [
  'fields' => 'name,configured_status,effective_status,creative'
];
$endpoint = 'act_'.$fb['account_id'].'/ads';
$ads = go_facebook($endpoint, $items, 'GET', $fb);
var_dump($ads);

// -------------

// edit an advert:

$ad_id = '6273048600979'; // the id of an advert
$items = [
  'name' => 'another_name', // new name
  'access_token' => $fb['access_token'],
];
$ads = go_facebook($ad_id, $items, 'POST', $fb);
var_dump($ads);

// -------------

//Upload an image:

$Imagick = new \Imagick('/home/butteff/fb_test/butteff.jpg');
$Imagick->setImageFormat('jpg');
$blob = $Imagick->getImagesBlob(); 
$blob = base64_encode($blob);
$endpoint = 'act_'.$fb['account_id'].'/adimages';

$items = [
  'access_token' => $fb['access_token'],
  'bytes' => $blob,
];

$upload = go_facebook($endpoint, $items, 'POST', $fb);
var_dump($upload);

// -------------

//Take existed images array:

$endpoint = 'act_'.$fb['account_id'].'/adimages';
$items = [
  'fields' => 'id,account_id,hash,url,created_time,updated_time,height,width',
];
$images = go_facebook($endpoint, $items, 'GET', $fb);
var_dump($images);

// -------------

// create new ad creative post with an image:

$hash = '138ded9e937f4c4b98ebcda3e98022e2'; // hash of the image
$endpoint = 'act_'.$fb['account_id'].'/adcreatives';

$items = [
  'name' => 'the_video_name', // new name
  'object_story_spec' => [ 
    "link_data" => [ 
      "image_hash" => $hash, 
      "link" => 'https://butteff.ru', 
      "message" => "try it out" 
    ], 
    "page_id" => "575749025806626" // facebook's page id (can be taken from "about" tab)
  ],
  'access_token' => $fb['access_token'],
];

$ads = go_facebook($endpoint, $items, 'POST', $fb);
var_dump($ads);

// -------------