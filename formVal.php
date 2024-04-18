<?php
function validateLength($text, $min, $max) {
    $length = strlen($text);
    return ($length >= $min && $length <= $max);
}

function validateNumber($number, $min, $max) {
    return is_numeric($number) && $number >= $min && $number <= $max;
}

function validateOption($input, $validOptions) {
    return in_array($input, $validOptions);
}
?>
