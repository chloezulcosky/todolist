<?php
require_once('TaskDbRepo.php');

class TaskService
{
    public $dbObj;

    public function createDbObj() {
        $this->dbObj = new taskDbRepo();
    }

   public function displayTable() {
        return $this->dbObj->selectTable();
    }

    public function deleteTask($id) {
        $this->dbObj->deleteTaskQuery($id);
   }

   public function updateTask($id) {
       $currentStatus = $this->dbObj->getCurrentStatus($id);
       if($currentStatus == 'Incomplete') {
           $this->dbObj->updateTask($id, 'Complete');
       }
       else if($currentStatus == 'Complete') {
           $this->dbObj->updateTask($id, 'Incomplete');
       }
   }

   public function addTask($name, $description) {
       $this->dbObj->addTask($name, $description);
   }
}

?>