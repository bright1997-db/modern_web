<?php

class Event
{
    //DB Stuff
    private $conn;
    private $table = 'events';

    //Props
    public $name;
    public $user_id;
    public $id;
    public $total_seats;
    public $description;
    public $location;
    public $start_date;
    public $end_date;
    public $start_time;
    public $end_time;

    //Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //Get list of events
    public function get_all_events()
    {
        //Create query
        $query = ' SELECT
                e.name,
                e.id,
                e.user_id,
                e.total_seats,
                e.description,
                e.location,
                e.start_date,
                e.end_date,
                e.start_time,
                e.end_time FROM ' . $this->table . ' e ORDER BY e.start_date';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Execute query
        $stmt->execute();

        return $stmt;
    }

    //Create an event
    public function create()
    {
        //Create query
        $query = 'INSERT INTO ' . $this->table . '
            SET
                name = :name,
                user_id = :user_id,
                total_seats = :total_seats,
                description = :description,
                location = :location,
                start_date = :start_date,
                end_date = :end_date,
                start_time = :start_time,
                end_time = :end_time';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean and set data
        $this->name        = htmlspecialchars(strip_tags($this->name));
        $this->user_id     = htmlspecialchars(strip_tags($this->user_id));
        $this->total_seats = htmlspecialchars(strip_tags($this->total_seats));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->location    = htmlspecialchars(strip_tags($this->location));
        $this->start_time  = htmlspecialchars(strip_tags($this->start_time));
        $this->end_time    = htmlspecialchars(strip_tags($this->end_time));
        $this->start_date  = htmlspecialchars(strip_tags($this->start_date));
        $this->end_date    = htmlspecialchars(strip_tags($this->end_date));

        //Bind data
        $stmt->BindParam(':name', $this->name);
        $stmt->BindParam(':user_id', $this->user_id);
        $stmt->BindParam(':total_seats', $this->total_seats);
        $stmt->BindParam(':description', $this->description);
        $stmt->BindParam(':location', $this->location);
        $stmt->BindParam(':start_time', $this->start_time);
        $stmt->BindParam(':end_time', $this->end_time);
        $stmt->BindParam(':start_date', $this->start_date);
        $stmt->BindParam(':end_date', $this->end_date);

        //Execute query
        if ($stmt->execute()) {
            return true;
        }

        //Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);

        return false;
    }

    //Join or register for an event
    public function join()
    {
        //Create query
        $query = 'INSERT INTO joined_table
            SET
                user_id = :user_id,
                event_id = :event_id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean and set data
        $this->id      = htmlspecialchars(strip_tags($this->id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        //Bind data
        $stmt->BindParam(':event_id', $this->id);
        $stmt->BindParam(':user_id', $this->user_id);

        //Execute query
        if ($stmt->execute()) {
            return true;
        }

        //Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);

        return false;
    }

    //get all joined event list
    public function get_all_joined()
    {
        //prepare query
        // $query = '
        // SELECT u.fname, e.name FROM users u, events e
        // INNER JOIN joined_table j ON u.id = j.user_id
        // INNER JOIN joined_table ON e.id = j.event_id
        // WHERE u.id = :user_id';

        $query = '
        SELECT
             u.fname,
             e.name
        FROM users u
        JOIN joined_table
        ON   u.id = joined_table.user_id
        JOIN events e
        ON   e.id = joined_table.event_id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Clean and set data
        $this->id      = htmlspecialchars(strip_tags($this->id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        //Bind data
        // $stmt->BindParam(':user_id', $this->user_id);

        //Execute query
        if ($stmt->execute()) {
            return $stmt;
        }

        //Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);

        return false;

    }

    public function delete()
    {
        //create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean id
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind ID
        $stmt->bindParam(':id', $this->id);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        //Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);

        return false;
    }

    public function read_single()
    {
        //Craete query
        $query = ' SELECT
        name,
        id,
        user_id,
        total_seats,
        description,
        location,
        start_date,
        end_date,
        start_time,
        end_time FROM ' . $this->table . ' WHERE id = :id';

        //Prepare statement
        $stmt = $this->conn->prepare($query);

        //Bind ID
        $stmt->bindParam(':id', $this->id);

        //Execute query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Set properties
        $this->user_id     = $row['user_id'];
        $this->id          = $row['id'];
        $this->total_seats = $row['total_seats'];
        $this->name        = $row['name'];
        $this->description = $row['description'];
        $this->location    = $row['location'];
        $this->start_date  = $row['start_date'];
        $this->end_date    = $row['end_date'];
        $this->start_time  = $row['start_time'];
        $this->end_time    = $row['end_time'];
    }

    public function unjoin()
    {
        //create query
        $query = 'DELETE FROM joined_table WHERE event_id = :event_id AND user_id = :user_id';

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //clean id
        $this->id      = htmlspecialchars(strip_tags($this->id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        //bind ID
        $stmt->bindParam(':event_id', $this->id);
        $stmt->bindParam(':user_id', $this->user_id);

        //Execute
        if ($stmt->execute()) {
            return true;
        }

        //Print error if something goes wrong
        printf("Error: %s. \n", $stmt->error);

        return false;
    }

}