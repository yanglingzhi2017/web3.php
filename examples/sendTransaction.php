<?php

require('./exampleBase.php');

$eth = $web3->eth;
$personal = $web3->personal;

echo 'Eth Send Transaction' . PHP_EOL;
$eth->accounts(function ($err, $accounts) use ($eth ,$personal) {
    if ($err !== null) {
        echo 'Error: ' . $err->getMessage();
        return;
    }
    $fromAccount = $accounts[0];
    $toAccount = $accounts[1];

    // get balance
    $eth->getBalance($fromAccount, function ($err, $balance) use($fromAccount) {
        if ($err !== null) {
            echo 'Error: ' . $err->getMessage();
            return;
        }
        echo $fromAccount . ' Balance: ' . $balance . PHP_EOL;
    });
	

	
    $eth->getBalance($toAccount, function ($err, $balance) use($toAccount) {
        if ($err !== null) {
            echo 'Error: ' . $err->getMessage();
            return;
        }
        echo $toAccount . ' Balance: ' . $balance . PHP_EOL;
    });

    // remember to lock account after transaction
    $personal->unlockAccount($fromAccount,'123456789', function ($err, $locked) {
        if ($err !== null) {
            echo 'Error: ' . $err->getMessage();
            return;
        }
        if ($locked) {
            echo 'New account is locked!' . PHP_EOL;
        } else {
            echo 'New account isn\'t locked' . PHP_EOL;
        }
    });


    // send transaction
    $eth->sendTransaction([
        'from' => $fromAccount,
        'to' => $toAccount,
        'value' => '0x1043561a8829300000'
    ], function ($err, $transaction) use ($eth, $fromAccount, $toAccount) {
        if ($err !== null) {
            echo 'Error: ' . $err->getMessage();
            return;
        }
        echo 'Tx hash: ' . $transaction . PHP_EOL;

        // get balance
        $eth->getBalance($fromAccount, function ($err, $balance) use($fromAccount) {
            if ($err !== null) {
                echo 'Error: ' . $err->getMessage();
                return;
            }
            echo $fromAccount . ' Balance: ' . $balance . PHP_EOL;
        });
        $eth->getBalance($toAccount, function ($err, $balance) use($toAccount) {
            if ($err !== null) {
                echo 'Error: ' . $err->getMessage();
                return;
            }
            echo $toAccount . ' Balance: ' . $balance . PHP_EOL;
        });
    });
});