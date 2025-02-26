<?php
    function chargerClasse($classe)
    {
        require $classe . '.class.php';
    }
    spl_autoload_register('chargerClasse');

    $conn = DataBase::getInstance();

    if(isset($_POST['creer'])) {
        $task = strip_tags($_POST['newTask']);
        $test = new TaskManager($task);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>My Todo List</h1>
    <form action="">
        <input type="text" name="newTask" id="newTask">
        <button id="creer" name="creer">Créer</button>
    </form>
    <table>
        <thead>
            <th>N</th>
            <th>Nom</th>
            <th>Action</th>
        </thead>
        <tbody>
        </tbody>
    </table>
</body>
</html>