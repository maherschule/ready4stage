<?php
echo "<pre>";
$password = "ready4stage";
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
echo "\n";
if (password_verify($password, $hash)) {
    echo "TRUE";
}else{
    echo "FALSE";
}