<?php
require_once 'ViaCepService.php';
use App\ViaCepService;

$cep = $_GET['cep'] ?? '';

if ($cep) {
    $service = new ViaCepService();
    $dados = $service->buscarEndereco($cep);
    echo json_encode($dados); // Transforma o endereço em texto que o HTML entende
}