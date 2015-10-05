<?php

/**
 * mimics the original mysql_real_escape_string but which doesn't need an active mysql connection.
 * @is_arry
 * @is_string
 */
function escmim($inp) { 
    if(is_array($inp)) 
        return array_map(__METHOD__, $inp); 

    if(!empty($inp) && is_string($inp)) { 
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
    } 

    return $inp; 
} 

// simple but effective for string outputting to html page
function esc($s){
    echo htmlentities(trim($s), ENT_QUOTES, 'UTF-8');
}

// standardize date inputs
$date_entered = date('m-d-Y H:i:s');

function alpha_only( $string )
    {
        return preg_replace('/[^a-zA-Z0-9\s]/', '', $string);
    }
// safe redirect
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}


// display sessions (for debug)
function display_sessions() {
$html=
$html .= '<pre>';
$html = print_r($_SESSION);
$html .= '<pre>';
return $html;
}
?>