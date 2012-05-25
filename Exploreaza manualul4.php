<?php

/**
 *
 * This script will redirect a person to a website
 * from a number of websites according to certain
 * probabilities of displaying the website and will
 * record the render number of each site.
 * Create an associative array with:
 * - values = probabilities of displaying websites;
 * - keys   = website names.
 *
 */

const ERR_FILE_READ = 1;

$sites_probab_assoc = array(
    'adevarul.ro' => 40,
    'ziare.ro' => 20,
    'financiarul.ro' => 30,
    'evz.ro' => 10
);


if(100 !== array_sum(array_values($sites_probab_assoc))) {
    die('You chose wrong values for redirect probabilities');
}

// Create an indexed array whose values are $sites_list values,
// but the number of appearence of a $sites_list value are set
// by his value(value/10).

$extended_array = array();
foreach($sites_probab_assoc as $key => $value) {
    $extended_array_partial = array_fill(0, $value / 10, $key);
    $extended_array = array_merge($extended_array, $extended_array_partial);
}
shuffle($extended_array);
$display_site = $extended_array[0];

/**
 *
 * Count the render number of each website;
 * Put them in a database file as website_name = appearances;
 * When the script is accessed by a person and that person
 * is redirected to a website, read the text file and update(increment)
 * the counter for that website
 *
 * @param string $file - database file;
 * @param array  $arr  - associative array with key = website name and
 *                       value = probability to display the website;
 * @param string $display_site - a random site rendered when the script
 *                               is executed;
 * @return array - associative array with key = website name and value
 *                 = the render number of that site;
 * errors : ERR_FILE_READ;
 *
 * array read_rend_history(string $display_site, string $file, array $arr);
 *
 */

function read_rend_history($display_site, $file, $arr) {

    if(is_file($file) && is_readable($file)) {
        $handler = fopen($file, 'r');
        $content_file = fread($handler, filesize($file));
        $rendered_sites = array();
        foreach(array_keys($arr) as $site) {
            $pattern = '/' . $site . '=([0-9]*?)\;/';
            if(1 === preg_match($pattern, $content_file, $matches)) {
                //create an array with keys = $site(websites names)
                //and values = render number of each site, if
                //a website is not in the file then the values will be 1.
                $rendered_sites[$site] = $matches[1];
            }
            else {
                $rendered_sites[$site] = 0;
            }
        }
        fclose($handler);
        //verify if display_site is a key in rendered_sites array
        //and increment  its coresponding value.
        if(array_key_exists($display_site, $rendered_sites)) {
            $rendered_sites[$display_site] += 1 ;
        }
        arsort($rendered_sites);
        return $rendered_sites;
    }
    else {
        return ERR_FILE_READ;
    }
}

/**
 *
 * Update the file database with new render numbers;
 * @param string $file     - database file;
 * @param array  $arr_rend - container for website => render number
 *                           associations;
 * @return boolean - TRUE if database was updated and FALSE if not;

 * boolean update_db(string $file, array $arr_rend);
 *
 */

function update_db($file, $arr_rend) {
    if(is_file($file) && is_writable($file)) {
        $handler = fopen($file, 'w');
        //rewrite all the content of the text.txt file with new content;
        $text_write = NULL;
        foreach($arr_rend as $site => $value) {
            $text_write .= $site . '=' . $value . ';';
        }
        fwrite($handler, $text_write);
        return TRUE;
    }
    else {
        return FALSE;
    }
}
$arr_rend = read_rend_history($display_site,
    'test.txt', $sites_probab_assoc );



//VL
//header('Location:http://' . $display_site);

if(ERR_FILE_READ === $arr_rend ) {
    echo ' READ FILE ERROR';
}
else {
    if(update_db('test.txt', $arr_rend)) {
        echo $display_site;
        echo '<pre>';
        var_Dump($arr_rend);
        echo '</pre>';
    }
    else {
        echo 'WRITE FILE ERROR';
    }
}


