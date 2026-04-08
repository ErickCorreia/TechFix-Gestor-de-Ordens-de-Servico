<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Database;

$db = Database::getConnection();

// Processar formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['cliente'])) {
    $stmt = $db->prepare("INSERT INTO ordens_servico (cliente, equipamento, defeito) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['cliente'], $_POST['equipamento'], $_POST['defeito']]);
    header("Location: index.php");
    exit;
}

$ordens = $db->query("SELECT * FROM ordens_servico ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>TechFix - Assistência Técnica</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f7f6; color: #333; max-width: 900px; margin: 40px auto; padding: 20px; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 20px; }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #3498db; color: white; border: none; cursor: pointer; font-weight: bold; }
        button:hover { background: #2980b9; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; }
        th, td { padding: 12px; border: 1px solid #eee; text-align: left; }
        th { background: #3498db; color: white; }
        .status { font-weight: bold; color: #e67e22; }
    </style>
</head>
<body>
    <h1>TechFix — Gerenciador de Hardware</h1>
    
    <div class="card">
        <h3>Nova Entrada de Equipamento</h3>
        <form method="POST">
            <input type="text" name="cliente" placeholder="Nome do Cliente" required>
            <input type="text" name="equipamento" placeholder="Aparelho (Ex: Notebook Dell)" required>
            <input type="text" name="defeito" placeholder="Problema Relatado" required>
            <button type="submit">Cadastrar Ordem de Serviço</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Equipamento</th>
                <th>Status</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordens as $os): ?>
            <tr>
                <td>#<?= $os['id'] ?></td>
                <td><?= htmlspecialchars($os['cliente']) ?></td>
                <td><?= htmlspecialchars($os['equipamento']) ?></td>
                <td class="status"><?= $os['status'] ?></td>
                <td><?= date('d/m/Y H:i', strtotime($os['data_entrada'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>