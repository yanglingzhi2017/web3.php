<?php
require('./exampleBase.php');
/**
 *
 *
 * http://www.eh.com/examples/getBalance.php?address=0xE548a74FbAd014c6f2Dc331B5A654D550a535740
 */


$eth = $web3->eth;




if($_GET['address']){


    // get balance
    $eth->getBalance($_GET['address'], function ($err, $balance)  {
        if ($err !== null) {
            echo 'Error: ' . $err->getMessage();
            return;
        }
        echo  wei2eth($balance) ;
    });
	
	exit;

	
}else{
	
	echo null;
}



/*
*得到一个地址的余额，
*来自parity的余额以十六进制形式出现在wei中
*使用bc数学函数转换它
*/
/*    function getBalanceOfAddress($addr)
    {
        $eth_hex = $this->eth->eth_getBalance($addr, 'latest');
        $eth = $this->wei2eth($this->bchexdec($eth_hex));
        $pending_hex = $this->eth->eth_getBalance($addr, 'pending');
        $pending = $this->wei2eth($this->bchexdec($pending_hex));
        return array('balance'=>$eth,'pending'=>$pending);
    }*/



    function bchexdec($hex)
    {
        if (strlen($hex) == 1) {
            return hexdec($hex);
        } else {
            $remain = substr($hex, 0, -1);
            $last = substr($hex, -1);
            return bcadd(bcmul(16, bchexdec($remain)), hexdec($last));
        }
    }



//以下功能用于转换和处理大数字
function wei2eth($wei)
{
    return bcdiv($wei, 1000000000000000000, 18);
}