<?php


/**
 *  Get the array values length  and return
 *  an array with them; 
 *  If the values aren't strings then convert 
 *  them in strings; 
 *  
 *  @arr - must be array, if it isn't 
 *         return an error message;
 *  
 *  array arr_values_length(array $arr);
 */


function arr_values_length($arr) {
    $new_arr = array();
    if(is_array($arr)) {
        foreach($arr as $value ) {
            if(is_string($value)) {
                $new_arr[] = strlen($value);
            }
            else {
                $new_arr[] = strlen((string)$value);
            }
        }
        return $new_arr;
    }
    else {
        return ARRAY_ERROR;
    }
}


/**
 *  remove duplicate values from an array;
 *  return an array without duplicate values;
 *  this function is an alias at array_unique;
 *
 *  array array_uniq(array $arr);
 *
 */

function array_uniq($arr) {
    $arr_uniq = array();
    if(is_array($arr)){
        foreach($arr as $key => $value) {
            if(false === array_search($value, $arr_uniq)) {
                $arr_uniq[$key] = $value;
            } 
        }
        return $arr_uniq ;
    }
}

/**
 * 
 * This function makes the sum of two given 
 * parameters;
 *
 * boolean callback(int &$a, int $b);
 *
 *
 */

function callback(&$a, $b) {
    $a += $b;
    return is_int($a) ? TRUE : FALSE;
}

/**
 *  This is an alias at array_walk function;
 *
 *  boolean array_walk(array &$a, callback $b)
 */


function array_walk_alias(&$a, $b) { 
    if(is_array($a) && is_string($b)) {
        foreach($a as $key => &$value) {
            $var = $b($value, $key);
            if(FALSE === $var) {
                return FALSE;
                exit;
            }
        }
        return TRUE;
    }
}

/** 
 *
 * Select the students with notes bigger or smaller, than a reference note,
 * at a chosen discipline;
 *
 * @param string $disc - select the discipline;
 * @param int    $note - select the reference note;
 * @param int    $opt  - for the case when we want to see 
 *                       the students with bigger or smaller notes
 *                       (default = bigger);
 * @return array - return an array with the students whoo meet the 
 *                 selected conditions; 
 *
 *  OPT_BIG  - is int and select the notes that are bigger than $note;
 *  OPT_SMALL - is int and select the notes that are smaller than $note; 
 *  errors : ERR_DATA;
 *
 *  array student_sort(array $students ,string $disc, int $note[, int $opt = OPT_BIG] )
 *
 */

function student_sort($students, $disc, $note, $opt = OPT_BIG) {
    if(is_array($students) && $students &&
        is_string($disc) && $disc &&
        is_int($note) && $note &&
        is_int($opt) && $opt) {

        //$cont_students is an array with the students who meet all the conditions;
        $cont_students = array();
            
        foreach($students as $name => $disc_notes) {
            if(is_array($disc_notes) && $disc_notes) {
                $disc = strtolower($disc);

                //array_change_key_case($disc_notes) OR ...
                foreach($disc_notes as $key => $value) {
                    $disc_notes[strtolower($key)] = $value;
                }
                if(array_key_exists($disc, $disc_notes)) {
                    if(OPT_BIG === $opt) {
                        if($disc_notes[$disc] >= $note) {
                            $cont_students[] = $name;
                        }
                    }
                    elseif(OPT_SMALL === $opt) {
                        if($disc_notes[$disc] < $note) {
                            $cont_students[] = $name;
                        }
                    }
                }
            }

        } 
        
        return $cont_students;   
    }
    else {
        return ERR_DATA;
    }

}


/**
 *  
 *  @a is a bidimensionall array in wich some students name are
 *  associated with the notes at some scholar disciplines.
 *  The array with the notes maps the scholar disciplines with 
 *  values(notes). 
 *
 */


$a = array(
    'George' => array( 
        'Matematica' => 9,
        'Fizica' => 10,
        'Sport' => 10,
    ),
    'Mihai' => array(
        'Matematica' => 7,
        'Fizica' => 8,
        'Sport' => 7,   
    ),
    'Cristian' => array(
        'Matematica' => 5,
        'Fizica' => 5,
        'Sport' => 5,
    ),
);

const OPT_SMALL = 1;
const OPT_BIG = 2;
const ERR_DATA = 404;
$aff = student_sort($a, 'matematica', 7, OPT_SMALL);
echo '<pre>';
var_dump($aff);
echo '</pre>';





