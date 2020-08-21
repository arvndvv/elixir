<?php 
$options = [
  'cost' => 12
];

$hash = password_hash('11', PASSWORD_ARGON2ID);
echo $hash;
//echo password_verify('11', $hash);
if (password_verify('11', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}


?> 