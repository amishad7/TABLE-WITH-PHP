<?php
class Config
{
    private $HOST = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB_NAME = "mydatabase";

    public $con;


    public function connect()
    {
        $this->con = mysqli_connect($this->HOST, $this->USERNAME, $this->PASSWORD, $this->DB_NAME);
        return $this->con;
    }

    public function insert($name, $author, $type)
    {
        $this->connect();
        $query = "INSERT INTO mybooks(name,author,type) values('$name', '$author', '$type');";

        $res = mysqli_query($this->con, $query);
        echo " result: $res";  

        return $res;
    }

    public function fetch_table_data()
    {
        $this->connect();

        $query = "SELECT * FROM mybooks;";

        $res = mysqli_query($this->con, $query);

        return $res;
    }

    public function delete($id)
    {
        $this->connect();

        $query = "DELETE FROM mybooks WHERE id=$id";

        $res = mysqli_query($this->con, $query); 

        return $res;
    }

    public function fetch_single_data($id)
    {
        $this->connect();

        $query = "SELECT * FROM mybooks WHERE id=$id;";

        $res = mysqli_query($this->con, $query); 

        return $res;
    }

    public function update($name, $age, $course, $id)
    {
        $this->connect();

        $fetch = $this->fetch_single_data($id);
        $result = mysqli_fetch_assoc($fetch);

        if ($result) {
            $query = "UPDATE $this->STUDENT_TABLE SET name='$name',age='$author',type = '$type' WHERE id=$id;";

            $res = mysqli_query($this->conn, $query);

            return $res;
        } else {
            return false;
        }
    }

    public function signUpUser($name,$username,$password){

        $this->connect();
 
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user(name,username,password) values('$name', '$username', '$hash_pass');";
        
        return mysqli_query($this->con,$query);

    } 

    public funtion signInUser($name,$password){
        $this->connect();

        $query = "SELECT * FROM user WHERE name=$name;";

    }

}
?>