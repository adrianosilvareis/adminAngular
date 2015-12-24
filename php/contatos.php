<?php


$operadora = new stdClass();
$contato = new stdClass();

$operadora->nome = "Vivo";
$operadora->codigo = 15;

$contato->nome = "Thiago";
$contato->telefone = "99987-3321";
$contato->data = date("d/m/Y H:i:s");
$contato->operadora = $operadora;

$lista[] = clone($contato);

$operadora->nome = "Vivo";
$operadora->codigo = 15;

$contato->nome = "Adriano";
$contato->telefone = "99846-0117";
$contato->data = date("d/m/Y H:i:s");
$contato->operadora = $operadora;

$lista[] = clone($contato);

$operadora->nome = "Vivo";
$operadora->codigo = 15;

$contato->nome = "Polania";
$contato->telefone = "99934-2970";
$contato->data = date("d/m/Y H:i:s");
$contato->operadora = $operadora;

$lista[] = clone($contato);

$operadora->nome = "Vivo";
$operadora->codigo = 15;

$contato->nome = "Pai";
$contato->telefone = "99994-9000";
$contato->data = date("d/m/Y H:i:s");
$contato->operadora = $operadora;

$lista[] = clone($contato);

echo json_encode($lista);