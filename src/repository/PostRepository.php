<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Post.php';
//require_once __DIR__.'/../models/Category.php';

class PostRepository extends Repository
{

    public function getPost(string $id_post): ?Post
    {
        $stmt = $this->database->connect()->prepare('
            SELECT
                posts.*,
                users.username
            FROM
                posts
            LEFT JOIN
                users
            ON
                posts.id_user_owner = users.id_user             
            WHERE 
                id_post = :id_post
        ');
        $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $stmt->execute();

        $post = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($post == false) {
            return null;
        }

        return new Post(
            $post['id_post'],
            $post['id_user_owner'],
            $post['username'],
            $post['title'],
            $post['description'],


            $post['image'],


            $post['created_at'],
            $post['like'],
            $post['dislike'],
        );
    }

    public function addPost(Post $post): void
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO posts (
            id_post,
            id_user_owner,
            title,
            description,


            image,


            created_at,
            "like",
            dislike
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $post->getIdPost(),
            $post->getIdUserOwner(), 
            $post->getTitle(),
            $post->getDescription(),

            $post->getImage(),

            $post->getCreatedAt(),
            $post->getLike(),
            $post->getDislike()
        ]);
    }


    public function getPosts(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT
                posts.*,
                users.username
            FROM
                posts
            LEFT JOIN
                users
            ON
                posts.id_user_owner = CAST(users.id_user AS VARCHAR)
            ORDER BY
                posts.created_at DESC;
        ');

        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($posts as $post) {
            $result[] = new Post(
                $post['id_post'],
                $post['id_user_owner'],
                $post['username'],
                $post['title'],
                $post['description'],
                $post['image'],
                $post['created_at'],
                $post['like'],
                $post['dislike']
            );
        }
        return $result;
    }




    public function getPostsByIdUserOwner(string $id_user_owner): array
    {

        $result = [];

        $stmt = $this->database->connect()->prepare('

            SELECT
                posts.*,
                users.username
            FROM
                posts
            LEFT JOIN
                users
            ON
                posts.id_user_owner = users.id_user 
            WHERE
                id_user_owner = :id_user_owner;

        ');
        
        $stmt->bindParam(':id_user_owner', $id_user_owner, PDO::PARAM_INT);
        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($posts as $post) {
            $result[] = new Post(
                $post['id_post'],
                $post['id_user_owner'],
                $post['username'],
                $post['title'],
                $post['description'],


                $post['image'],


                $post['created_at'],
                $post['like'],
                $post['dislike'],
            );
        }
        return $result;
    }

    public function getPostsByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT
                posts.*,
                users.username
            FROM
                posts
            LEFT JOIN
                users
            ON
                posts.id_user_owner = users.id_user 
            WHERE
                LOWER(title) LIKE :search 
            OR
                LOWER(description) LIKE :search 

        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $posts;
    }


    public function like(string $id_post) 
    {
        
        $stmt = $this->database->connect()->prepare('
           UPDATE posts SET "like" = "like" + 1 WHERE id_post = :id_post
        ');

        $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
        $stmt->execute();
        var_dump($id_post);
   }

   public function dislike(string $id_post) 
   {
       $stmt = $this->database->connect()->prepare('
           UPDATE posts SET dislike = dislike + 1 WHERE id_post = :id_post
        ');

       $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
       $stmt->execute();
   }

   public function unlike(string $id_post) 
   {
       
       $stmt = $this->database->connect()->prepare('
          UPDATE posts SET "like" = "like" - 1 WHERE id_post = :id_post
       ');

       $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
       $stmt->execute();
       var_dump($id_post);
  }

  public function undislike(string $id_post) 
  {
      $stmt = $this->database->connect()->prepare('
          UPDATE posts SET dislike = dislike - 1 WHERE id_post = :id_post
       ');

      $stmt->bindParam(':id_post', $id_post, PDO::PARAM_INT);
      $stmt->execute();
  }




  public function getDislikedPosts(): array
    {

        $result = [];

        $stmt = $this->database->connect()->prepare('

            SELECT
                posts.*,
                users.username
            FROM
                posts
            LEFT JOIN
                users
            ON
                posts.id_user_owner = users.id_user
            ORDER BY
                posts.dislike DESC;

        ');

        $stmt->execute();

        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($posts as $post) {
            $result[] = new Post(
                $post['id_post'],
                $post['id_user_owner'],
                $post['username'],
                $post['title'],
                $post['description'],


                $post['image'],


                $post['created_at'],
                $post['like'],
                $post['dislike'],
            );
        }
        return $result;
    }

    public function deletePost(string $id_post): void{
        
        $stmt = $this->database->connect()->prepare('
        DELETE FROM posts
        WHERE 
            id_post = ?
    ');

    $stmt->execute([
        $id_post
    ]);
    }


}
