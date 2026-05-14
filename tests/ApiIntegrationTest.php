<?php
use PHPUnit\Framework\TestCase;
use App\ViaCepService;

class ApiIntegrationTest extends TestCase {
    public function testConexaoComViaCep() {
        $service = new ViaCepService();
        $resultado = $service->buscarEndereco('01001000'); // CEP da Praça da Sé

        // Verifica se a API respondeu corretamente [1]
        $this->assertArrayHasKey('logradouro', $resultado);
        $this->assertEquals('Praça da Sé', $resultado['logradouro']);
    }
}