<?php

/**
 *
 *  This function will return in an array ,
 *  all unique URLs from a given website.
 *  
 *  @param string - select the url;
 *  @return array - return an array which elements 
 *                  are unique urls from a Web page;
 *  errors : CONTENT_ERROR;
 *
 *  array url_finder(string $url);
 *
 */

function url_finder($url) {
    if(file_get_contents($url)) {
        $file_content = file_get_contents($url);
        $pattern = '/http:\/\/(.*?)("|\/)/';
        preg_match_all($pattern, $file_content, $matches);
        return array_unique($matches[1]);
    }
    else {
        return CONTENT_ERROR;
    }
}

const CONTENT_ERROR = 404;
if(isset($_POST['submit'])) {
    if(isset($_POST['url']) && $_POST['url']) {
        $url = $_POST['url'];
        $pattern = 'http://';
        $display = strpos($pattern, $url) ? url_finder($url) :
            url_finder('http://' . $url);
    } 

}

//VL 

if($display !== 404) {
    echo '<pre>', var_dump($display), '</pre>';
}
else {
    echo 'Unavailable web page';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html version="-//W3C//DTD XHTML 1.1//EN"
     xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.w3.org/1999/xhtml
                          http://www.w3.org/MarkUp/SCHEMA/xhtml11.xsd">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<input type="text" name="url" id="url" />
<label for="url">Introduceti URL-ul</label>
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>
