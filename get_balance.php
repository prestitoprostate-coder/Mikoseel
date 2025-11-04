<?php
header('Content-Type: application/json');

$balancesFile = 'balances.json';
$balance = 0;

if(file_exists($balancesFile)){
    $data = json_decode(file_get_contents($balancesFile), true);
    if(isset($data['total'])){
        $balance = floatval($data['total']);
    }
}

echo json_encode(['balance'=>$balance]);
?>
