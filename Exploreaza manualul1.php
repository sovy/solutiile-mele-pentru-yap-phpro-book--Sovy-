<?php
/**
 *
 * The function is for users authentication:
 * - the users are searched in a database file and if a user is found 
 * and the password from the database is identicaly with 
 * encrypted password typed by the user return TRUE, otherwise 
 * return FALSE;
 *
 * boolean user_authentication(string $username, string $input_pass, 
 * string $file);
 * 
 */

function user_authentication($username, $input_pass, $file) {
    if(file_exists($file) && is_readable($file)) {
        $handle = fopen($file, 'r');
        $content = fread($handle, filesize($file));
        $pattern = '/' . $username . '=' . '(.*?);/';
        $c = preg_match($pattern, $content, $matches);
        fclose($handle);
        if(array() !== $matches) {
             $input_pass = crypt($input_pass, '$1$' . md5(substr($input_pass, -1)));
            return $input_pass === $matches[1] ? TRUE : FALSE;
        } 
        else {
            die('This user is not in our database'); 
        }
            
    }
    else {
        die('The account cannot be create because i cannot open database');
    }

}

/**
 *
 * This function creates accounts to users. Populates a database file 
 * with a nickname and a encrypted password using the MD5 algorithm 
 * for every user; 
 * 
 * boolean create_account($user, $pass, $file);
 */

function create_account($user, $pass, $file) {
    if(is_writable($file)) {
        $handle = fopen($file, 'r+');
        $content = fread($handle, filesize($file));
        $pattern = '/' . $user . '=' . '(.*?);/';
        $c = preg_match($pattern, $content, $matches);
        if(array() !== $matches) {
            die('This user exists in the database!!!'); 
        }
        else {
            $pass = crypt($pass, '$1$' . md5(substr($pass, -1)));
            return fwrite($handle, $user . '='. $pass . ';') ? TRUE : FALSE;
        } 
        fclose($handle);   
    }

    else {
        die('The account cannot be create because i cannot open 
            database');
    }
}


/**
 *
 * This function is for encrypt users passwords.
 * The passwords will be encrypted using the MD5 
 * algorithm ;
 * string user_pass(string $user, string $password); 
 *
 */

function user_pass($user, $pass) {
    $pass = crypt($pass, '$1$' . md5(substr($pass, -1)));
    return $user . '=' . $pass;
}

const SUCCESS_ACCOUNT_CREATE = 1;
const ERROR_ACCOUNT_CREATE = 2;
CONST SUCCESS_AUTHENTICATION = 3;
CONST ERROR_AUTHENTICATION = 4;
const ERROR_DATA = 5;
$message = NULL;
if(isset($_POST['submit'])) {
    if(isset($_POST['user']) &&
        isset($_POST['pass']) && 
        $_POST['user'] && 
        $_POST['pass']) {
        $file = 'test.txt';
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if(isset($_POST['create_account']) && 'create' ===
            $_POST['create_account']){
            $message = create_account($user, $pass, $file) ? 
                SUCCESS_ACCOUNT_CREATE : ERROR_ACCOUNT_CREATE;
        }
        else {
            $message = user_authentication($user, $pass, $file) ? 
                SUCCESS_AUTHENTICATION : ERROR_AUTHENTICATION;
        }
    }
    else {
        $message = ERROR_DATA;
    }   
}

//VL

switch($message) {
    case SUCCESS_ACCOUNT_CREATE :
        echo 'The account was successfully created';
        break;
    case ERROR_ACCOUNT_CREATE : 
        echo 'The account was not created';
        break;
    case SUCCESS_AUTHENTICATION :
        echo 'You are authenticate';
        break;
    case ERROR_AUTHENTICATION :
        echo 'You aren\'t authenticate. Please make an account!';
        break;
    case ERROR_DATA :
        echo 'Wrong username or password';
        break;
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
<input type="password" name="pass" id="pass" />
<label for="pass">Password</label>
<br />
<input type="text" name="user" id="user" />
<label for="user">Name</label>
<br / >
<input type="checkbox" name="create_account" value="create" id="create" />
<label for="create">Create account</label>
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>
