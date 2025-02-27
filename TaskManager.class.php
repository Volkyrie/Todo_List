<?php
    abstract class AbstractTaskManager {
        abstract public function addTask(string $task); // Ajout d’une tache
        abstract public function delTask(int $id); // Supprime la tâche en base
        abstract public function getAllTasks(); // Récupère ts les tâches en cours
    }

    class TaskManager extends AbstractTaskManager {
        protected $_id; // l’identifiant unique de la tâche
        protected $_name; // le nom de la tâche
        protected $_dbh; // l’instance de la connexion à la base de données

        public function getId() {
            return $this->_id;
        }

        public function getName() {
            return $this->_name;
        }

        public function setId($id) {
            $this->_id = $id;
        }

        public function setName($name) {
            $this->_name = $name;
        }

        public function __construct() {
            $this->_dbh = DataBase::getInstance();
        }

        public function getAllTasks() {
            $sql = "SELECT * FROM mytasks";
            $query = $this->_dbh->prepare($sql);
            $query->execute();
            $tasks = $query->fetchAll(PDO::FETCH_ASSOC);
            return $tasks;
        }

        public function addTask(string $task) {
            $sql = "INSERT INTO mytasks (name) VALUES (:name)";
            $query = $this->_dbh->prepare($sql);
            $query->bindParam(':name', $task, PDO::PARAM_STR);
            $query->execute();
        }

        public function delTask(int $id) {
            $sql = "UPDATE mytasks SET action=1 WHERE id=:id";
            $query = $this->_dbh->prepare($sql);
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
        }
    }

?>