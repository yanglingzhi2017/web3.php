<?php

require('./exampleBase.php');

$eth = $web3->eth;

/**
 *
 *
 * 查询节点的全部账号
 */



 $eth->accounts(function ($err, $accounts) use ($eth) {
    if ($err !== null) {
        echo 'Error: ' . $err->getMessage();
        return;
    }

  $rulst=array();

    foreach ($accounts as $key=> $account) {

        $rulst[$key]['account']=$account;

       $eth->getBalance($account, function ($err, $balance) use($rulst ,$key ){
            if ($err !== null) {
                echo 'Error: ' . $err->getMessage();
                return;
            }
          $rulst[$key]['balance']=$balance;
        });


    }
     print_r($rulst);exit;

});