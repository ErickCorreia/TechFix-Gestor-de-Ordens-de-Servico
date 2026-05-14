<?php
namespace App;

class ViaCepService {
    public function buscarEndereco($cep) {
        $cep = preg_replace('/[^0-9]/', '', $cep); // Limpa o CEP
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        
        // Faz a requisição para a API pública [1]
        $conteudo = file_get_contents($url);
        return json_decode($conteudo, true);
    }
}