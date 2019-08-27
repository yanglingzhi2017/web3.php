<?php

require('./exampleBase.php');

$eth = $web3->eth;

/**
 *
 *
 * 获取gasprice
 */



 $eth->gasPrice(function ($err, $accounts) use ($eth) {
    if ($err !== null) {
        echo 'Error: ' . $err->getMessage();
        return;
    }



     echo $accounts->value;exit;

});