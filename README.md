# PHP Facebook graph API (Ads campaigns / marketing API)
**A simple function to request Facebook API with POST and GET queries via CURL.** 

## How to use:

You just need to use go_facebook() function and send parameters to it.

```
$answer = go_facebook($endpoint, $items, 'POST', $config);
```

$endpoint is the end of the API url, $items is an array of parameters with values, you can set 'POST' or 'GET' string as a third function parameter, forward the $config array from the config.php file too.

**An example:**

```
require_once 'curl_graph.php';
require_once 'config.php';

// Take campaign's ads list:
$items = [
  'fields' => 'name,configured_status,effective_status,creative'
];
$endpoint = 'act_'.$fb['account_id'].'/ads';
$ads = go_facebook($endpoint, $items, 'GET', $fb);
var_dump($ads);
```

* Edit config.php file and add your credentials and tokens there.
* Review index.php file for more examples.
* Install php-curl extension on your system. If you need to upload images, install php-imagic too.

You can do other requests, based on the [official documentation](https://developers.facebook.com/docs/marketing-apis) _(just review the cURL tabs from the doc's examples, repeat the parameters and make sure, that the URL is valid)_

## Files Overview:

- curl_graph.php is the file with the main function about Facebook API requests.
- config.php is the file with the app's config and other parameters, like an access_token, etc.
- index.php is the file with examples
