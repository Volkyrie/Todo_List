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

        public function __construct($name) {
            $this->_dbh = new Database();
            $this->setName($name);
            echo $this->_name;
        }

        public function getAllTasks() {

        }

        public function addTask(string $task) {
            return $task;
        }

        public function delTask(int $id) {

        }
    }

?>