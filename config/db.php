<?php


Class Db{
    private $mycon;
// some code
    function __construct()
    {
        $this->mycon = $this->connect();
    }

    
    function connect()
    {
        $con = mysqli_connect("localhost", "root", "") or die("Could not connect to the server");
        mysqli_select_db($con, "akbartravels") or die("Could not connect to the database");
		return $con;
    }
    
    function getSelectedByID($table,$id=NULL)
    {
        if($table == '' || $table == NULL)
        {
            //echo "undefined table name.";
        }
        else{
            $sql=@("SELECT * FROM " . $table . " where ".$table .".id = " . $id);
            $result = mysqli_query($this->mycon, $sql);            
            if (!$result) {
              //printf("Query failed: %s\n", $mysql->error);
              exit;
            }
			if(mysqli_num_rows($result) == 0)
            {
                $rows = "No result Found.";
                return $rows;
                exit;
            }
            while($row = mysqli_fetch_assoc( $result )) {
              $rows[]=$row;
            }            
            return $rows;
        }
        mysqli_free_result($result);
    }
    
    function getWhere($table,$check=NULL,$groupBy=null,$orderBy=null)
    {
        if($table == '' || $table == NULL)
        {
            //echo "undefined table name.";
        }
        else{
            $data2 = $this->get_where($table,$check);
            if($groupBy == null) $groupBy = "";
            if($orderBy == null) $orderBy ="";
            $sql=@("SELECT DISTINCT * FROM " . $table . " where " . $data2 . " " . $groupBy . " " . $orderBy);
            $result = mysqli_query($this->mycon, $sql);
            if (!$result) {
              //printf("Query failed: %s\n", $mysql->error);
              exit;
            }
            if(mysqli_num_rows($result) == 0)
            {
                $rows = "No result Found.";
                return $rows;
                exit;
            }
            while($row = mysqli_fetch_assoc( $result )) {
              $rows[]=$row;
            }
            return $rows;
        }
        mysqli_free_result($result);
    }
    function _getWhere($table,$check=NULL)
    {
        if($table == '' || $table == NULL)
        {
            //echo "undefined table name.";
        }
        else{
            $data2 = $this->get_where($table,$check);
            $sql=@("SELECT DISTINCT * FROM " . $table . " where " . $data2);
            $result = mysqli_query($this->mycon, $sql);
            if (!$result) {
              //printf("Query failed: %s\n", $mysql->error);
              exit;
            }
            if(mysqli_num_rows($result) == 0)
            {
                $rows = "No result Found.";
                return $rows;
                exit;
            }
            while($row = mysqli_fetch_assoc($result)) {
              $rows[]=$row;
            }
            return $rows;
        }
        mysqli_free_result($result);
    }
    
    //get all row from the table
    function get($table,$check)
    {
        if($table == '' || $table == NULL)
        {
            //echo "undefined table name.</br>";
        }
        else{
            $sql=@("SELECT * FROM " . $table . " where 1");
            $result = mysqli_query($this->mycon, $sql);
            if (!$result) {
              //printf("Query failed: %s\n", $mysql->error);
              exit;
            }
            if(mysqli_num_rows($result) == 0)
            {
                $rows = "No result Found.";
                return $rows;
                exit;
            }
            while($row = mysqli_fetch_assoc( $result )) {
              $rows[]=$row;
            }            
            return $rows;
        }
        mysqli_free_result($result);
    }
    // insert into table of database.
    function insert($table, $set = NULL)
    {
        if($table == '' || $table == NULL)
        {
            //echo "undefined table name.";
        }
        else{    
            $data1 = $this->get_format_key($set);
            $data2 = $this->get_format_value($set);
            $sql=@("insert into `" . $table . "` ( " . $data1 . " ) values (" .$data2." )");
            $result = mysqli_query($this->mycon, $sql);
            if($result != null)
            {
                //echo "Data Inserted</br>";
            }
            else{
                 //echo "</br>" . mysqli_error() . "</br>";
            }
        }
        return true;
    }
    
    
    // update into table of database.
    function update($table, $set = NULL,$check = NULL)
    {
        if($table == '' || $table == NULL)
        {
            //echo "undefined table name.</br>";
        }
        else{    
            $data1 = $this->set_update_format($set);
            $data2 = $this->get_where($table,$check);
            $sql=@("update " . $table . " set " . $data1 . " where " . $data2);
            $result = mysqli_query($this->mycon, $sql);
            if($result != null)
            {
                //echo "Data Updated</br>";
                return true;
            }
            else{
                //echo "</br>" . mysqli_error() . "</br>";
                return false;
            }
        }
    }
    
    //delete from table a single column.
    function delete($table,$id)
    {
        if($table == '' || $table == NULL)
        {
            //echo "undefined table name.";
        }
        else{
            $sql=@("delete from " . $table . " where id = " . $id);
            $result = mysqli_query($this->mycon, $sql);
            if($result != null)
            {
                //echo "Data Deleted";
            }
            else{
                //echo "</br>" . mysqli_error() . "</br>";
            }
            return true;
        }
        return false;
    }
    
    //delete from table a single column.
    function deleteAll($table)
    {
        if($table == '' || $table == NULL)
        {
            //echo "undefined table name.";
        }
        else{
            $sql=@("delete from " . $table );
            $result = mysqli_query($this->mycon, $sql);
            if($result != null)
            {
                //echo "Data Deleted";
            }
            else{
                //echo "</br>" . mysqli_error() . "</br>";
            }
        }
    }

    // format the key of array to mysql format.
    function get_format_key($set)
    {
        $data = '';
        foreach ($set as $key => $value)            
        {
            //echo $key . " => " . $value . "</br>";
            $data .= "`". $key ."`,";
        }
        
        $total = strlen($data)-1;
        $data = substr($data,0,$total);
        return $data;
    }
    // format the value of array to mysql format.
    function get_format_value($set)
    {
        $data = '';
        foreach ($set as $key => $value)            
        {
            //check if the value of the array is numeric or string
            if(is_numeric($value))
            {
                $data .= $value . ",";
            }
            else{
                $data .= "'". $value ."',";
            }
        }
        
        //find total lenght of string and delete last string from the string.
        $total = strlen($data)-1;
        $data = substr($data,0,$total);
        return $data;
    }
    
    
    // format the key of array to mysql update.
    function get_where($table,$check)
    {
        $count = count($check);
        $data = '';
        if($count > 1)
        {
            foreach ($check as $key => $value)            
            {
                if(is_numeric($value))
                {
                    $data .= "".$table.".". $key ." = " . $value . " and ";
                }
                else{
                    $data .= "".$table.".". $key ." = '" . $value ."' and ";
                }
            }
            $total = strlen($data)-5;
            $data = substr($data,0,$total);
            return $data;
        }
        else{
            foreach ($check as $key => $value)            
            {
                if(is_numeric($value))
                {
                    $data = "".$table.".". $key ." = " . $value ;
                }
                else{
                    $data = "".$table.".". $key ." = '" . $value ."'";
                }
            }
            return $data;
        }
    }
    
    // format the set value of array to mysql update format.
    function set_update_format($set)
    {
        $data = '';
        foreach ($set as $key => $value)            
        {
            if(is_numeric($value))
            {
                $data .= "`". $key ."` = " . $value ." , ";
            }
            else{
                $data .= "`". $key ."` = '" . $value ."' , ";
            }
        }
        $total = strlen($data)-3;
        $data = substr($data,0,$total);
        return $data;
    }
    
    
    function get_column($table)
    {   
        if($table == '' || $table == NULL)
        {
            //echo "undefine table name.";
        }
        else{
            $sql=@("SELECT * FROM " . $table . " where 1");
            $result = mysqli_query($this->mycon, $sql);
            //echo mysqli_num_fields($result) . " Columns.";
        }
    }
    
}
?>