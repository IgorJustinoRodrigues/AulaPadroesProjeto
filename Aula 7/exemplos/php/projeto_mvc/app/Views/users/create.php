<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuário</title>
    <!-- Link para o Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="card mx-auto shadow" style="max-width: 500px;">
            <div class="card-body">

                <h1>Novo Usuário</h1>
                <form action="?controller=UserController&action=store" method="POST">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" id="name" name="data[name]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="data[email]" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Salvar</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Link para o Bootstrap JS e dependências -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>