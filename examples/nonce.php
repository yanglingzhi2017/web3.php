<?php

require('./exampleBase.php');

$eth = $web3->eth;

/**
 *http://www.eh.com/examples/nonce.php?ad=0xE548a74FbAd014c6f2Dc331B5A654D550a535740
 *
 *   // 获取指定账户地址的交易数
 */
if(isset($_GET['ad'])){

    $ad=$_GET['ad'];
}else{

    return null;
}



 $eth->getTransactionCount($ad,function ($err, $reulst) use ($eth) {
    if ($err !== null) {
        echo 'Error: ' . $err->getMessage();
        return;
    }



     echo $reulst;exit;

});