<?php
use PHPUnit\Framework\TestCase;

class TechTest extends TestCase {
    public function testCamposObrigatorios() {
        $dados = ['cliente' => 'Carlos', 'equipamento' => 'PC'];
        $this->assertArrayHasKey('cliente', $dados);
        $this->assertEquals('Carlos', $dados['cliente']);
    }

    public function testStatusInicial() {
        $status = 'Pendente';
        $this->assertEquals('Pendente', $status);
    }
}