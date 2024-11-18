<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card mx-auto shadow" style="max-width: 800px;">
            <div class="card-body">

                <h1>Usuários</h1>
                <a href="?controller=UserController&action=create" class="btn btn-primary">Novo Usuário</a>
                <ul class="list-group mt-4">
                    <?php foreach ($users as $user): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= htmlspecialchars($user['id']) ?> - <?= htmlspecialchars($user['name']) ?>
                            <div>
                                <a href="?controller=UserController&action=show&id=<?= $user['id'] ?>" class="btn btn-sm btn-info">Detalhes</a>
                                <a href="?controller=UserController&action=edit&id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="?controller=UserController&action=delete&id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Excluir</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>

    <!-- Link para o Bootstrap JS e dependências -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>