# PHP Facebook graph API (ads campaigns / marketing API)
**A simple function to request Facebook API with POST and GET queries via CURL.** 

## How to use:

* Edit config.php file and add your credentials and tokens there.
* Review index.php file for some examples.

You can do other requests, based on the [official documentation](https://developers.facebook.com/docs/marketing-apis) _(just review the cURL tabs from the doc's examples, repeat the parameters and make sure, that the URL is valid)_

## Files Overview:

- curl_graph.php is the file with the main function about Facebook API requests.
- config.php is the file with the app's config and other parameters, like an access_token, etc.
- index.php is the file with examples