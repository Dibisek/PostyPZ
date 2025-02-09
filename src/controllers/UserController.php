<?php

require_once 'AppController.php';
//require_once __DIR__.'/../models/Post.php';
//require_once __DIR__.'/../repository/PostRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/RatingRepository.php';
require_once __DIR__.'/../repository/BookmarkRepository.php';
//require_once __DIR__.'/../repository/UserDetailsRepository.php';
require_once __DIR__.'/../services/SessionInfo.php';
require_once __DIR__.'/../services/Validator.php';


class UserController extends AppController
{

    private $message = [];
    private $postRepository;
    private $userRepository;
    //private $userDetailsRepository;
    private $sessionInfo;
    private $validator;
    public $ratingRepository;
    public $bookmarkRepository;

    public function __construct()
    {
        parent::__construct();
        $this->sessionInfo = new SessionInfo();
        $this->validator = new Validator();
        $this->postRepository = new PostRepository();
        $this->userRepository = new UserRepository();
        $this->ratingRepository = new RatingRepository();
        $this->bookmarkRepository = new BookmarkRepository();
        //$this->userDetailsRepository = new UserDetailsRepository();
    }



    public function myprofile() 
    {
        $id = $this->sessionInfo->getIdUserFromSession();
        $posts = $this->postRepository->getPostsByIdUserOwner($id);
        $user = $this->userRepository->getUserFromIdUser($id);
        //$user_details = $this->userDetailsRepository->getUserDetails($id);
        $this -> render('myprofile',['posts' => $posts, 'user'=>$user] );
    }

    public function deletemypost($id_post) {
        if ($this->isGet() && isset($_GET['id'])) {
            $id_post = $_GET['id'];
            $this->postRepository->deletePost($id_post);
            $posts = $this->postRepository->getPosts();
            
            return $this-> myprofile();
        }
    }

    // public function adddetails() 
    // {

    //     if ($this->isPost()) {

    //         $unique_id_users_details = uniqid('', true);
    //         $id_user = $this->sessionInfo->getIdUserFromSession();

    //         $user_details = new UserDetails(
    //             $unique_id_users_details,
    //             $id_user,
    //             $_POST['first_name'],
    //             $_POST['last_name'],
    //             $_POST['city'],
    //             $_POST['street_name'],
    //             $_POST['street_address'],
    //             $_POST['postal_code'],
    //             $_POST['state'],
    //             $_POST['country']

    //         );
            
        
    //         $has_details = $this-> userDetailsRepository->isUserHasDetails($id_user);
    //         if(!$has_details){
    //         $this->userDetailsRepository->addUserDetails($user_details);

    //         } else {
    //             var_dump('else');
    //             $this->userDetailsRepository->updateUserDetails($user_details, $id_user);
    //         }

    //         return $this->myprofile();
    //     }


    //     return $this->render('add-details');       
    // }

    public function changeusername() 
    {

        if ($this->isPost()) {
            $id_user = $this->sessionInfo->getIdUserFromSession();
            $username = $_POST['username'];
            $valid_user = $this->validator->isEmpty($username);
            if(!$valid_user){
                $this->userRepository->updateUsername($id_user, $username);
                return $this->myprofile();
            } else {
                return $this->render('change-username', ['messages' => ['Username is empty']]);
            }
            
        }
        return $this->render('change-username', ['messages' => ['']]);       
    }

    public function changeemail() 
    {

        if ($this->isPost()) {
            $id_user = $this->sessionInfo->getIdUserFromSession();
            $email = $_POST['email'];
            $valid_email = $this->validator->validateEmail($email);
            
            if(!$valid_email){
                $this->userRepository->updateEmail($id_user, $email);
                return $this->myprofile();
            } else {
                return $this->render('change-email', ['messages' => ['Wrong Email']]);
            }   
            return $this->myprofile();
        }
        return $this->render('change-email');       
    }



}


