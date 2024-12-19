<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container position-fixed" style="top: 0; left: 0;">
    <h1>Liste des tâches</h1>
    <a href="/create" style="border: 2px solid black">Ajouter une tache</a>
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
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td class='bg-info border border-black'><?= $task['id'] ?></td>
                    <td class='bg-info border border-black'><?= $task['title'] ?></td>
                    <td class='bg-info border border-black'><?= $task['is_completed'] ? 'Terminée' :'En cours' ?></td>
                <td>
                    <?php if (!$task['is_completed']): ?>
                    <form method="POST" action="/complete">
                        <input type ="hidden" name="id" value="<?=$task['id'] ?>">
                        <button class='btn btn-primary border border-black' type="submit">Marquer comme terminée</button>
                    </form>
                <?php endif; ?>
                        <form method="POST" action="/delete">
                            <input type ="hidden" name="id" value="<?=$task['id'] ?>">
                            <button class='btn btn-danger border-black' type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </body>
    </table>
    </div>
    
    <div class="container position-fixed" style="top: 0; right: 0;">
    <h1>Liste des projets</h1>
    <a href="/createProjet" style="border: 2px solid black">Ajouter un projet</a>
    <table>
        <head>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Action</th>
            </tr>
        </head>
        <body>
            <?php foreach ($projets as $projet): ?>
                <tr>
                    <td class='bg-info border border-black'><?= $projet['id'] ?></td>
                    <td class='bg-info border border-black'><?= $projet['title'] ?></td>
                <td>
                    <?php if (!$projet['is_completed']): ?>
                    <form method="get" action="projetview">
                        <input type ="hidden" name="id" value="<?=$projet['id'] ?>">
                        <a href="/projetView?id=projet.id"  style="border: 2px solid black">Entré dans le projet</a>
                    </form>
                <?php endif; ?>
                        <form method="POST" action="/delete">
                            <input type ="hidden" name="id" value="<?=$projet['id'] ?>">
                            <button class='btn btn-danger border-black' type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </body>
    </table>
    </div>
</body>
