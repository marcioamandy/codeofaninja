<?php
class Category{
  
    // database connection and table name
    private $conn;
    private $table_name = "categories";
  
    // object properties
    public $id;
    public $name;
  
    public function __construct($db){
        $this->conn = $db;
    }
  
    // used by select drop-down list
    function read(){
        try
        {
            //select all data
            $query = "SELECT
                        id, name
                    FROM
                        " . $this->table_name . "
                    ORDER BY
                        name";  
    
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
    
            return $stmt;
        } catch (Exception $e) {
            echo 'Error : ',  $e->getMessage(), "\n";
        }
    }
  
    // used to read category name by its ID
    function readName(){
        try
        {
            $query = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";
        
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->name = $row['name'];
        } catch (Exception $e) {
            echo 'Error : ',  $e->getMessage(), "\n";
        }
    }
}
?>