<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Usuário</title>
    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card mx-auto shadow" style="max-width: 500px;">
            <div class="card-body">

                <h1>Detalhes do Usuário</h1>
                <p><strong>Nome:</strong> <?= htmlspecialchars($user['name']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                <a href="?controller=UserController&action=index" class="btn btn-secondary">Voltar</a>

            </div>
        </div>
    </div>

    <!-- Link para o Bootstrap JS e dependências -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>