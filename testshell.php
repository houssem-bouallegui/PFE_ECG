<?php
include('Net/SSH2.php');

$ssh = new Net_SSH2('127.0.0.1');
if (!$ssh->login('pi', '123456789')) {
    exit('Login Failed');
}

$out = $ssh->exec('cd /var/www/html && ./traitment.sh');
$out2 = substr($out,4);
echo $out2;
?>
