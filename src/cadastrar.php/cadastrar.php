<?php
// src/cadastrar.php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = $_POST['cliente'] ?? '';
    $equipamento = $_POST['equipamento'] ?? '';
    $defeito = $_POST['defeito'] ?? '';

    // Validação básica (ajuda a garantir que os testes passem)
    if (!empty($cliente) && !empty($equipamento)) {
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare("INSERT INTO ordens_servico (cliente, equipamento, defeito) VALUES (?, ?, ?)");
            $stmt->execute([$cliente, $equipamento, $defeito]);
            
            // Redireciona de volta para a lista com sucesso
            header("Location: index.php?msg=sucesso");
            exit;
        } catch (\Exception $e) {
            die("Erro ao salvar: " . $e->getMessage());
        }
    } else {
        header("Location: index.php?msg=erro");
        exit;
    }
}
<script>
function buscarEndereco() {
    let cep = document.getElementById('cep').value;
    
    if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
        fetch('buscar_cep_ajax.php?cep=' + cep)
            .then(response => response.json())
            .then(dados => {
                if (!dados.erro) {
                    document.getElementById('rua').value = dados.logradouro;
                    document.getElementById('bairro').value = dados.bairro;
                    document.getElementById('cidade').value = dados.localidade;
                } else {
                    alert("CEP não encontrado!");
                }
            })
            .catch(error => console.error('Erro ao buscar CEP:', error));
    }
}
</script>
