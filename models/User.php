<?php

class User
{
    //DB Stuff
    private $conn;
    private $table = 'users';

    //User props
    public $email;
    public $email_err;
    public $password;
    public $confim_password;
    public $password_err;
    public $id;
    public $hashed_password;
    public $fname;
    public $lname;

    //Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function logout()
    {
        session_start();

        //Unset all of the session variables
        unset($_SESSION["loggedin"]);

        //Destroy the session;
        session_destroy();

        return true;
    }

    //Log user In
    public function signup()
    {
        //-------> Username verify <-----------
        //Create query
        $query = 'SELECT id FROM ' . $this->table . ' WHERE email = :email';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //clean the username
        $this->email = htmlspecialchars(strip_tags($this->email));

        //Bind the username param
        $stmt->bindParam(':email', $this->email);

        //Execute query
        if ($stmt->execute()) {
            //Results
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row == 1) {
                $this->email_err = "This email has already registered";
            }
        } else {
            //If sql statement fails to execute
            echo "Something went wrong try again later";
        }

        //-------> Offically insert data into database validation <--------
        $sql = 'INSERT INTO ' . $this->table . '
            SET
                fname = :fname,
                lname = :lname,
                email = :email,
                password = :password';

        //Prepare statement
        $stmt1 = $this->conn->prepare($sql);

        //clean the password and set it
        $this->fname    = htmlspecialchars(strip_tags($this->fname));
        $this->lname    = htmlspecialchars(strip_tags($this->lname));
        $this->password = htmlspecialchars(strip_tags($this->password));

        //Bind data
        $stmt1->BindParam(':fname', $this->fname);
        $stmt1->BindParam(':lname', $this->lname);
        $stmt1->BindParam(':email', $this->email);
        $stmt1->BindParam(':password', $this->password);

        //Hash password
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);

        //Execute the query
        if ($stmt1->execute()) {
            return true;
        }
    }

    public function login()
    {
        $query = 'SELECT id, email, password FROM ' . $this->table . ' WHERE email = :email';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean the data
        $this->email = htmlspecialchars(strip_tags($this->email));

        //bind the data
        $stmt->BindParam(':email', $this->email);

        if ($stmt->execute()) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //Set properties
            $this->email           = $row['email'];
            $this->id              = $row['id'];
            $this->hashed_password = $row['password'];

            //validate password
            if (password_verify($this->password, $this->hashed_password)) {
                return true;
            } else {
                return false;
            }
        } else {
            //username is incorrect
            return false;
        }

    }

}