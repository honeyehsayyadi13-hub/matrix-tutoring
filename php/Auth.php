<?php
//class called Auth created for registration, log in, and authentification
class Auth

{   /*constructor uses PHP and can access a connection*/
    public function __construct(
        protected PDO $company_db,
    ){}
    /* this registers a new user and returns the id if it is successful or it will be false if not
    and will trim whitespace from input for extra security measures */
    public function add_user(string $username, string $password, string $email ): int | false{
        $username=trim($username);
        $password=trim($password);
        $email=trim($email);

        // checking if username already exists so there are no duplicates
        try {
            $check=$this->company_db->prepare("SELECT id FROM users WHERE username = :username");
            $check->execute([":username" => $username]);
            //if fetch send back a row, then the username is taken
            if($check->fetch()){
                return false;
            }

        } catch(\PDOException $e){
            //log the error for debugging
            error_log($e->getMessage());
            return false;
        }
        //not storing raw passwords and enables PHP to pick strongest algorithm
        $hash=password_hash($password, PASSWORD_DEFAULT);
        //false returned if hashing fails
        if($hash===false){
            return false;
        }//can return null if given an invalid argument
        if($hash===null){
            throw new \Exception("Invalid");
        }
        //inserting new user with the hashed password and marking active 
        try{
        $stmt=$this->company_db->prepare("INSERT INTO users (username, password, email, active)
        VALUES (:username, :password, :email, 1)");
        $stmt->execute([
            ":username"=>$username,
            ":password"=>$hash,
            ":email"=>$email,
        ]);
        }catch(\PDOException $e){//catching errors such as connection issues
            error_log($e->getMessage());
            return false;
        }
        //grabbing the id that was assigned to the user
        $id=$this->company_db->lastInsertId();
        //returns false if something went wrong
        if($id===false){
            return false;
        }
        //otherwise return the id as an integer
        return intval($id);
    }
    //verifies the username and password, finding their id, hashed password, and activity status
    public function authenticate( string $username, string $password): int|false{
        $username=trim($username);
        $password=trim($password);

        try{
        $stmt=$this->company_db->prepare("SELECT id, password, active FROM users WHERE username=:username");
        $stmt->execute([":username"=>$username,]);
        } catch(\PDOException $e){
            error_log($e->getMessage());
            return false;
        }//fetching the matching row
        $user=$stmt->fetch(PDO::FETCH_ASSOC);
        //if no user was found with that username
        if($user===false){
            return false;
        }//blocking the login if the account has been deactivated
        if($user["active"]==0){
            return false;
        }
        //comparing the submitted password against the stored hash and will check password without exposing the hash
        $verify=password_verify($password, $user["password"]);
        if($verify===true){
            return intval($user["id"]);
        }

        return false;//returns false if the password did not match
    }
    //logs a user in by storing their id in the session and only starts a session if one is not currently active
    public function log_user_in(int $user_id): void{
        if(session_status()===PHP_SESSION_NONE){
            session_start();
        }
        $_SESSION["logged_in_user"]=$user_id;
    }
    //logs user out by clearing the session value
     public function log_user_out(): void{
        if(session_status()===PHP_SESSION_NONE){
            session_start();
        }
        $_SESSION["logged_in_user"]=null;
    }
    //returning the currently logged in user's id or else it will return false if not logged in
    public function logged_in_user(): int|false{
        if(session_status()===PHP_SESSION_NONE){
            session_start();
    }
    //no login session value has been set
    if(!isset($_SESSION["logged_in_user"])){
        return false;
    }
    //session value exists but something is wrong
    if(!$_SESSION["logged_in_user"]){
        return false;
    }

    return intval($_SESSION["logged_in_user"]);
    }
}