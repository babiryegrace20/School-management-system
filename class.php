class Database{
    /* 
     * Create variables for credentials to MySQL database
     * The variables have been declared as private. This
     * means that they will only be available with the 
     * Database class
     */
    private $db_host = "localhost";  // Change as required
    private $db_user = "root";  // Change as required
    private $db_pass = "";  // Change as required
    private $db_name = "";  // Change as required

    /*
     * Extra variables that are required by other function such as boolean con variable
     */
    private $con = false; // Check to see if the connection is active
    private $result = array(); // Any results from a query will be stored here


    // Function to make connection to database
    public function connect(){
        if(!$this->con){
            $myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);  // mysql_connect() with variables defined at the start of Database class
            if($myconn){
                $seldb = @mysql_select_db($this->db_name,$myconn); // Credentials have been pass through mysql_connect() now select the database
                if($seldb){
                    $this->con = true;
                    return true;  // Connection has been made return TRUE
                }else{
                 array_push($this->result,mysql_error()); 
                    return false;  // Problem selecting database return FALSE
                }  
            }else{
                array_push($this->result,mysql_error());
                return false; // Problem connecting return FALSE
            }  
        }else{  
            return true; // Connection has already been made return TRUE 
        }   
    }

    // Function to disconnect from the database
    public function disconnect(){
        // If there is a connection to the database
        if($this->con){
            // We have found a connection, try to close it
            if(@mysql_close()){
                // We have successfully closed the connection, set the connection variable to false
                $this->con = false;
                // Return true tjat we have closed the connection
                return true;
            }else{
                // We could not close the connection, return false
                return false;
            }
        }
    }

 public function select($sql){
        $query = @mysql_query($sql);
       // $this->myQuery = $sql; // Pass back the SQL
        if($query){
            // If the query returns >= 1 assign the number of rows to numResults
            $this->numResults = mysql_num_rows($query);
            // Loop through the query results by the number of rows returned
            for($i = 0; $i < $this->numResults; $i++){
                $r = mysql_fetch_array($query);
                $key = array_keys($r);
                for($x = 0; $x < count($key); $x++){
                    // Sanitizes keys so only alphavalues are allowed
                    if(!is_int($key[$x])){
                        if(mysql_num_rows($query) >= 1){
                            $this->result[$i][$key[$x]] = $r[$key[$x]];
                        }else{
                            $this->result = null;
                        }
                    }
                }
            }
            return true; // Query was successful
        }else{
            array_push($this->result,mysql_error());
            return false; // No rows where returned
        }
    }

    // Function to insert into the database
    public function insert($sql)
    {
        // Make the query to insert to the database
        if($ins = @mysql_query($sql))
        {
            array_push($this->result,mysql_insert_id());
            return true; // The data has been inserted
        }
        else
        {
            array_push($this->result,mysql_error());
            return false; // The data has not been inserted
        }
    }


    // Function to update and delete into the database
    public function query($sql)
    {
            if($query = @mysql_query($sql)){
                array_push($this->result,mysql_affected_rows());
                return true; 
            }else{
                array_push($this->result,mysql_error());
                return false; 
            }
             }

    // Public function to return the data to the user
    public function getResult(){
        $val = $this->result;
        $this->result = array();
        return $val;
    }

} 
?>
