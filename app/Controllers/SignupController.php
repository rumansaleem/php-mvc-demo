<?php

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('signup');
    }

    public function signup() 
    {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);
    
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        $query = "INSERT INTO users( name, email, password ) VALUES (?, ?, ?)";
        
        $statement = $this->db->prepare($query);
    
        if($statement === false) {
            printf("SQL Error: %s", $this->db->error);
        }
    
        $statement->bind_param('sss', $name, $email, $hashed_password);
        
        if ($statement->execute() === false) {
            printf("SQL Error: %s", $statement->error);
        }
    
        $user_id = $statement->insert_id;
    
        $_SESSION['auth'] = $user_id;
    
        return redirect('/');
    }
}