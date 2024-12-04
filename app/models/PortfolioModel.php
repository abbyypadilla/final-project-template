<?php

namespace app\models;

use app\models\Model;  

class PortfolioModel extends Model {

    private $db;
    protected $table = 'projects'; 

    public function getAllProjects() {
        try {
            $query = "SELECT * FROM $this->table";
            $projects = $this->query($query); 
            if ($projects === false) {
                throw new \Exception("Error executing query.");
            }
            return $projects;
        } catch (\Exception $e) {
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return []; 
        }
    }

    public function getProjectById($id) {
        $id = (int)$id; 
        
        $query = "SELECT * FROM $this->table WHERE id = :id";
        $result = $this->query($query, [':id' => $id]);
        
        var_dump(value: $result);

        return $result ? $result : false; 
        }   
    
    public function addProject($title, $description, $image_url) {
        try {
            $stmt = $this->db->prepare("INSERT INTO projects (title, description, image_url) VALUES (?, ?, ?)");
            $stmt->execute([$title, $description, $image_url]);

            return $stmt->rowCount() > 0;
        } catch (\Exception $e) {
            error_log('Error adding project: ' . $e->getMessage());
            return false;
        }
    }

    public function deleteProject($id) {
        try {
            if (!is_numeric($id)) {
                throw new \Exception("Invalid ID format.");
            }

            $project = $this->getProjectById($id);
            if (empty($project)) {
                throw new \Exception("Project with ID $id does not exist.");
            }

            $query = "DELETE FROM $this->table WHERE id = :id";
            $result = $this->query($query, [':id' => $id]);

            if ($result) {
                return true; 
            } else {
                throw new \Exception("Failed to delete the project.");
            }
        } catch (\Exception $e) {
            file_put_contents('error.log', $e->getMessage(), FILE_APPEND);
            return false; 
        }
    }

}
