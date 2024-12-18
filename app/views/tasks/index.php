<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Liste des tâches</h1>
    <a href="/create">Ajouter une tache</a>
    <table>
        <head>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </head>
        <body>
            <form method="POST" action="/delete">
                <button type="button" class="btn btn-danger">Tout supprimer</button>
            </form>
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td class='bg-primary border border-black'><?= $task['id'] ?></td>
                    <td class='bg-primary border border-black'><?= $task['title'] ?></td>
                    <td class='bg-primary border border-black'><?= $task['is_completed'] ? 'Terminée' :'En cours' ?></td>
                <td>
                    <?php if (!$task['is_completed']): ?>
                    <form method="POST" action="/complete">
                        <input type ="hidden" name="id" value="<?=$task['id'] ?>">
                        <button class='btn btn-primary border border-black' type="submit">Marquer comme terminée</button>
                    </form>
                <?php endif; ?>
                        <form method="POST" action="/delete">
                            <input type ="hidden" name="id" value="<?=$task['id'] ?>">
                            <button class='btn btn-primary border-black' type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </body>
    </table>
</body>
