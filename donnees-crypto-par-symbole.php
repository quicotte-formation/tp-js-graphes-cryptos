<?php

$symbole = $_REQUEST['symbole'];
$sql = "SELECT  DATE(c.datetime_cours) date_cours,
                AVG(c.volume_24_h) volume_24_h,
                AVG(c.market_cap) market_cap,
                AVG(c.valeur) valeur,
                AVG(c.pct_variation_24_h) pct_variation_24_h
        FROM    crypto cr
                JOIN cours c on cr.id = c.crypto_id
        WHERE   cr.symbole='$symbole'
        GROUP BY date_cours
        ORDER BY datetime_cours";
$pdo = new PDO("sqlite:cryptos.db");
$stm = $pdo->query( $sql );
$resultats = $stm->fetchAll();
echo json_encode( $resultats );