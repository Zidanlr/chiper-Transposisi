<?php

function decrypt($cipherText, $key) {
    $length = strlen($cipherText);
    $plainText = array_fill(0, $length, '\0');
    $index = 0;

    for ($i = 0; $i < $key; $i++) {
        for ($j = $i; $j < $length; $j += $key) {
            if (ctype_alpha($cipherText[$j])) {
                while (!ctype_alpha($plainText[$index % $length])) {
                    $index++;
                }
                $plainText[$index % $length] = $cipherText[$j];
                $index++;
            } else {
                $plainText[$j] = $cipherText[$j];
            }
        }
    }

    return implode('', $plainText);
}

$encryptedPassword = $_POST["password"];
$key = 4; 

$decryptedPassword = decrypt($encryptedPassword, $key);

?>
