<?php

$operadoras = new stdClass();
$lista = array();

$operadoras->nome = "Vivo";
$operadoras->codigo = "15";
$operadoras->tipo = "Celular";

$lista[] = clone($operadoras);

$operadoras->nome = "Oi";
$operadoras->codigo = "14";
$operadoras->tipo = "Celular";

$lista[] = clone($operadoras);

$operadoras->nome = "Tim";
$operadoras->codigo = "41";
$operadoras->tipo = "Celular";

$lista[] = clone($operadoras);

$operadoras->nome = "GVT";
$operadoras->codigo = "25";
$operadoras->tipo = "Fixo";

$lista[] = clone($operadoras);

$operadoras->nome = "Embratel";
$operadoras->codigo = "21";
$operadoras->tipo = "Fixo";

$lista[] = clone($operadoras);

echo json_encode($lista);

