<?php

$nbJours = $_REQUEST['nbJours'];
$sql = "SELECT  cr.symbole, AVG(c.pct_variation_24_h) pct_variation_24_h
FROM    crypto cr
        JOIN cours c on cr.id = c.crypto_id
WHERE   c.datetime_cours>=DATE('now', '-$nbJours days')
GROUP BY c.crypto_id";
$pdo = new PDO("sqlite:cryptos.db");
$stm = $pdo->query( $sql );
$resultats = $stm->fetchAll();
echo json_encode( $resultats );