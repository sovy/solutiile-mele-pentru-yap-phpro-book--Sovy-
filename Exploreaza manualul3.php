<?php

/**
 *
 * Chessboard
 *
 */




/**
 *
 * Select the possible vertical positions of the horse;
 * @param int     $a    - horizontal horse positions(is key in $ch_h array);
 * @param int     $b    - vertical horse positions(is key in $ch_v array);
 * @param array   $ch_h - chess table - horizontal letters;
 * @param array   $ch_v - chess table - vertical numbers;
 * @return array  - return an array which elements are arrays with two elements
 *                  (first element identify horizontal coordinate and the second
 *                  identify the vertical coordinate of the horse position);
 *
 *  array horse_positions(int $a, int $b, array $ch_h, array $ch_v);
 *
 */
function horse_positions($a, $b, $ch_h, $ch_v) {
    $message = array();
    if(array_key_exists($a - 1, $ch_h) &&
        array_key_exists($b + 2, $ch_v)) {
            $message[] = array($a - 1, $b + 2);
        }
    if(array_key_exists($a + 1, $ch_h) !== FALSE &&
        array_key_exists($b + 2, $ch_v) !== FALSE) {
            $message[] = array($a + 1, $b + 2);
        }
    if(array_key_exists($a - 1, $ch_h) !== FALSE &&
        array_key_exists($b - 2, $ch_v) !== FALSE) {
            $message[] = array($a - 1, $b - 2);
        }
    if(array_key_exists($a + 1, $ch_h) !== FALSE &&
        array_key_exists($b - 2, $ch_v) !== FALSE) {
            $message[] = array($a + 1, $b - 2);
        }
    return $message;
}

//$a  = horse_positions(2, 4, $chess_h, $chess_v);
//echo '<pre>', var_dump($a), '</pre>';


/**
 *  Select all possible moves of a chess piece on the chess table;
 *
 *  @param string  $piece   - select the chess piece;
 *  @param string  $h_pos   - select an alphabet letter from A to Z(horizontal
 *                            horse position - is value in $chess_h array);
 *  @param int     $v_pos   - select a number from 1 to 8(vertical horse
 *                            position - is value in $chess_v array);
 *  @param array   $chess_h - chess table - horizontal letters;
 *  @param array   $chess_v - chess table - vertical numbers;
 *  @return array  - which elements are arrays with two elements
 *                   (first element identify horizontal coordinate and the second
 *                   identify the vertical coordinate of one horse position);
 *
 *  errors : ERR_POSITION;
 */

function sh_mv_piece($piece, $h_pos, $v_pos, $chess_h, $chess_v) {
    $piece = 'horse';
    $posibilities = array();
    if(array_search($h_pos, $chess_h) !== FALSE &&
        array_search($v_pos, $chess_v) !== FALSE) {

            /**
             * verify if horse is the chosen piece
             */

        if('horse' === $piece ) {

            /**
             *  select the keys for the chosen position(vertical and horizontal)
             */

            $h_pos_key = array_search($h_pos, $chess_h);
            $v_pos_key = array_search($v_pos, $chess_v);
            /**
             * put possible vertical positions of the horse in an array
             * $posibilities_keys_on_v is an array with elements arrays with
             * two elements (first element is a key in $chess_v array and the
             * second is a key in $chess_h array)
             */
            $posibilities_keys_on_v = horse_positions($h_pos_key,
                $v_pos_key, $chess_h, $chess_v);

            if(isset($posibilities_keys_on_v)  &&
                is_array($posibilities_keys_on_v) &&
                $posibilities_keys_on_v) {
                foreach($posibilities_keys_on_v as $value) {
                    if(is_array($value) && $value) {
                        $posibilities[] = array($chess_h[$value[0]],
                        $chess_v[$value[1]]);
                    }
                }
            }
            /**
             *  put possible horizontal positions of the horse in an array
             *  $posibilities_keys_on_h is an array with elements arrays with
             *  two elements (first element is a key in $chess_h array and the
             *  second is a key in $chess_v array)
             */

            $posibilities_keys_on_h = horse_positions($v_pos_key,
                $h_pos_key, $chess_v, $chess_h);
            if(isset($posibilities_keys_on_h) &&
                is_array($posibilities_keys_on_h) &&
                $posibilities_keys_on_h) {
                foreach($posibilities_keys_on_h as $value) {
                    if(is_array($value) && $value) {
                        $posibilities[] = array($chess_h[$value[1]],
                            $chess_v[$value[0]]);
                    }
                }
            }

        }
        return $posibilities;
    }
    else {
        return ERR_POSITION;
    }
}

/**
 *
 *  Display a chessboard with alternate blue or black squares.
 *  Initial position of the piece will be colored in green.
 *  All possible moves of the chess piece will be filled with
 *  red color.
 *
 *  @param array   $chess_h         - chess table - horizontal letters;
 *  @param array   $chess_v         - chess table - vertical numbers;
 *  @param string  $pos_init_h      - initial coordinate on horizontal;
 *  @param int     $pos_init_v      - initial coordinate on vertical;
 *
 *  @return string  - contains all the necessary details to display
 *                    chessboard;
 */

function chess_table($chess_h, $chess_v, $pos_init_h, $pos_init_v) {
    $piece_positions = sh_mv_piece('horse', $pos_init_h, $pos_init_v,
        $chess_h, $chess_v );
    $display = '<table border = "1"> <tr><td></td>';
    foreach($chess_h as $value) {
        $display .= '<td>' . $value . '</td>';
    }
    $display .= '</tr>';
        /**
         * $i count vertical squares;
         */
        for($i = 1; $i <= 8 ; $i++) {
             $display .= '<tr><td>' . $chess_v[$i] . '</td>';

             /**
              * $j count horizontal squares;
              */

            for($j = 1; $j <= 8; $j++) {
                if($chess_h[$j] === $pos_init_h &&
                    $chess_v[$i] === $pos_init_v) {
                    $display .= '<td style="background-color:green"></td>';
                    continue 1;
                }

                /**
                 *
                 * verify if current position is not a valid position for horse
                 * move;
                 *
                 */

                foreach($piece_positions as $value) {
                    if($chess_h[$j] === $value[0] &&
                        $chess_v[$i] === $value[1]) {

                        /**
                         *
                         * in affirmative situation color the current square in
                         * red and jump to the next square;
                         *
                         */

                        $display .= '<td style="background-color:red"></td>';
                        continue 2;
                    }
                }
                /**
                 *
                 * if the current square couldn't be a valid position for horse,
                 * color the current square with:
                 *  - blue if the square coordinates are both even or odd numbers;
                 *  - black if the square coordinates(one coordinate is an
                 * even number and the other is odd);
                 */


                if(($i % 2 !== 0 && $j % 2 !== 0 ) ||
                    ($i % 2 === 0 && $j % 2 === 0)) {
                    $display .= '<td style="background-color:blue"></td>';
                }
                elseif(($i % 2 !== 0 && $j % 2 === 0 ) ||
                    ($i % 2 === 0 && $j % 2 !== 0 )) {
                    $display .= '<td style="background-color:black"></td>';
                }
            }
            $display .= '<td>' . $chess_v[$i] . '</td></tr>';

        }

    $display .= '<tr><td></td>';
     foreach($chess_h as $value) {
        $display .= '<td>' . $value . '</td>';
    }

    $display .= '</tr></table>';
    return $display;
}

$chess_v = array( 1 => 1, 2, 3, 4, 5, 6, 7, 8 );
$chess_h = array( 1 => 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
//$h_pos = 'B';
//$v_pos = 1;
if(isset($_POST['submit'])){
    if(isset($_POST['h_pos']) && isset($_POST['v_pos']) &&
        $_POST['h_pos'] && $_POST['v_pos']) {
        $h_pos = $_POST['h_pos'];
        $v_pos = (int)$_POST['v_pos'];
        $message = chess_table($chess_h, $chess_v, $h_pos, $v_pos);
     }
}


//VL

echo $message ;
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
<select name="h_pos" id="h_pos">
<?php
foreach($chess_h as $value ) {
    echo '<option value="' . $value . '"> ' . $value . '</option>';
}
?>
</select>
<label for="h_pos">Select horizontal position</label>
<br />
<select name="v_pos" id="v_pos">
<?php
foreach($chess_v as $value ) {
    echo '<option value="' . $value . '"> ' . $value . '</option>';
}
?>
</select>
<label for="v_pos">Select vertical position</label>
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>
