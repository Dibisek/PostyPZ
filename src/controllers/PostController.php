<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../repository/PostRepository.php';
require_once __DIR__.'/../services/SessionInfo.php';

class PostController extends AppController
{
    private $message = [];
    private $postRepository;
    private $sessionInfo;

    public function __construct()
    {
        parent::__construct();
        $this->postRepository = new PostRepository();
        $this->sessionInfo = new SessionInfo();
    }

    public function addPost()
    {
        $message = [];

        if ($this->isPost()) {
            $content = trim($_POST['content'] ?? '');

            $errors = $this->validatePostData($content);

            if (!empty($errors)) {
                return $this->render('add-post', ['messages' => $errors]);
            }

            $id_user_owner = $this->sessionInfo->getIdUserFromSession();
            $user_owner = $this->sessionInfo->getUsernameFromSession();

            date_default_timezone_set('Europe/Warsaw');
            $created_at = date('Y-m-d H:i:s');

            $new_post = new Post(
                uniqid('', true),
                $id_user_owner,
                $user_owner,
                $content,
                $created_at
            );

            $this->postRepository->addPost($new_post);

            return $this->render('mainpage', ['messages' => ['Post added successfully.']]);
        }

        return $this->render('add-post', ['messages' => $this->message]);
    }

    private function validatePostData(string $content): array
    {
        $errors = [];

        if (empty($content)) {
            $errors[] = 'Content cannot be empty.';
        }

        if (strlen($content) > 280) {
            $errors[] = 'Content cannot exceed 280 characters.';
        }

        return $errors;
    }

    public function mainpage()
    {
        $posts = $this->postRepository->getPosts();
            $posts = array_filter($posts, function ($post) {
            return is_numeric($post->getIdPost());
        });
    
        $this->render('mainpage', ['posts' => $posts]);
    }

    public function postpage()
    {
        if ($this->isGet() && isset($_GET['id'])) {
            $id_post = $_GET['id'];
            $post = $this->postRepository->getPost($id_post);

            if (!$post) {
                return $this->render('error', ['messages' => ['Post not found.']]);
            }

            return $this->render('post-page', ['post' => $post]);
        }
    }
}
