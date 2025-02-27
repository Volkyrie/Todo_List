<?php
    function chargerClasse($classe)
    {
        require $classe . '.class.php';
    }
    spl_autoload_register('chargerClasse');

    $conn = DataBase::getInstance();

    if(isset($_POST['creer'])) {
        $task = strip_tags($_POST['newTask']);
        $newTask = new TaskManager();
        $newTask->addTask($task);
    }

    if(isset($_GET['del'])) {
        $taskId = strip_tags($_GET['del']);
        error_log($taskId, 0);
        $delTask = new TaskManager();
        $delTask->delTask($taskId);
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
    <form action="" method="POST">
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
            <?php
                $tasks = new TaskManager();
                $tasks = $tasks->getAllTasks();
                foreach($tasks as $task) {
                    echo "<tr>";
                    echo "<td>" . $task['id'] . "</td>";
                    echo "<td>" . $task['name'] . "</td>";
                    if($task['action'] == 0) {
                        echo "<td><button name='".$task['id']."' onCLick='location.href=`index.php?del=". $task['id'] ."`' >Supprimer</button></td>";
                    } else {
                        echo "<td> Tâche terminée </td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>