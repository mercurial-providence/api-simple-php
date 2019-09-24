<?php
class Artdata{
 
    // database connection and table name
    private $conn;
    private $table_name = "ARTDATA";
 
    // object properties
    public $artid;
    public $author;
    public $born_died;
    public $title;
    public $date;
    public $technique;
    public $location;
    public $url;
    public $form;
    public $type;
    public $school;
    public $timeframe;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
    
        // select all query
        $query =    "SELECT 
                    `artid`,
                    `author`,
                    `born_died`,
                    `title`,
                    `date`,
                    `technique`,
                    `location`,
                    `url`,
                    `form`,
                    `type`,
                    `school`,
                    `timeframe`

                    FROM " 
                    . $this->table_name . 
                    " ORDER BY artid DESC 
                    LIMIT 100 ";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // search products
    function search($keywords){
    
        // select all query
        $query = "SELECT 
                    `artid`,
                    `author`,
                    `born_died`,
                    `title`,
                    `date`,
                    `technique`,
                    `location`,
                    `url`,
                    `form`,
                    `type`,
                    `school`,
                    `timeframe`

                    FROM " 
                    . $this->table_name . 
                
                    " WHERE
                        author LIKE ? OR 
                        born_died LIKE ? OR 
                        title LIKE ? OR 
                        date LIKE ? OR 
                        technique LIKE ? OR 
                        location LIKE ? OR 
                        url LIKE ? OR 
                        form LIKE ? OR 
                        type LIKE ? OR 
                        school LIKE ? OR 
                        timeframe LIKE ? 
                    
                    ORDER BY 
                        artid DESC 
                    LIMIT 100 ";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $keywords=htmlspecialchars(strip_tags($keywords));
        $keywords = "%{$keywords}%";
    
        // bind
        $stmt->bindParam(1, $keywords);
        $stmt->bindParam(2, $keywords);
        $stmt->bindParam(3, $keywords);
        $stmt->bindParam(4, $keywords);
        $stmt->bindParam(5, $keywords);
        $stmt->bindParam(6, $keywords);
        $stmt->bindParam(7, $keywords);
        $stmt->bindParam(8, $keywords);
        $stmt->bindParam(9, $keywords);
        $stmt->bindParam(10, $keywords);
        $stmt->bindParam(11, $keywords);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

    // read products with pagination
    public function readPaging($from_record_num, $records_per_page){
    
        // select query
        $query = "SELECT 
                `artid`,
                `author`,
                `born_died`,
                `title`,
                `date`,
                `technique`,
                `location`,
                `url`,
                `form`,
                `type`,
                `school`,
                `timeframe`

                FROM " 
                . $this->table_name . 
            
                " ORDER BY 
                    artid DESC
                LIMIT ?, ?";
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
    
        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
    
        // execute query
        $stmt->execute();
    
        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count(){
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";
    
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $row['total_rows'];
    }
}