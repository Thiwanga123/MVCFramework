<?php
class Users extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = $this->model('M_users');
    }

    public function index() {
        $data = $this->userModel->getUsers();
        $this->view('users/v_index', $data);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $data = [
                'name' => trim($_POST['name']),
                'telephone_number' => trim($_POST['telephone_number']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'name_err' => '',
                'telephone_err' => '',
                'email_err' => '',
                'password_err' => ''
               
            ];

            // Validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Make sure errors are empty
            if (empty($data['name_err']) && empty($data['telephone_err']) && empty($data['email_err']) && empty($data['password_err'])) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User


                // Redirect to the login page
                if ($this->userModel->register($data)) {
                    redirect('users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/v_register', $data);
            }
        } else {
            // Init data
            $data = [
                'name' => '',
                'telephone_number' => '',
                'email' => '',
                'password' => '',
                'name_err' => '',
                'telephone_err' => '',
                'email_err' => '',
                'password_err' => ''
            ];

            // Load view
            $this->view('users/v_register', $data);
        }
    }


    public function login(){
      if($_SERVER['REQUEST_METHOD']=='POST'){
        //validate form
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $data = [
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => ''
        ];

        //validate email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }

        else{
          //check for user/email
          if($this->userModel->findUserByEmail($data['email'])){

            //user found


          }
          else{
            //user not found
            $data['email_err'] = 'No user found';
          }
        }


        //validate password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        //

        //if no errors
        if(empty($data['password_err']) && empty($data['email_err'])){
          //log the user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);
          if($loggedInUser){
            //create session
            die('Logged in');
          }
          else{
            $data['password_err'] = 'Password incorrect';

            //load view
            $this->view('users/v_login', $data);
          }
        } else {
          //load view
          $this->view('users/v_login', $data);
        }


      }
      else{
        //init data
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => ''
        ];

        //load view
        $this->view('users/v_login', $data);
      }


    }
}



?>