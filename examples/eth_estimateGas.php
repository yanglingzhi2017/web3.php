<?php

require('./exampleBase.php');

$eth = $web3->eth;

/**
 *
 *
 * 获取gasprice
 */



 $eth->eth_estimateGas(function ($err, $result) use ($eth) {
    if ($err !== null) {
        echo 'Error: ' . $err->getMessage();
        return;
    }



     echo $result;exit;

});