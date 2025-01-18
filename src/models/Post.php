<?php
class Post
{

    private $id_post;
    private $id_user_owner;
    private $user_owner;
    private $title;
    private $description;
    private $image;
    private $created_at;
    private $like;
    private $dislike;
    

    public function __construct(
        string $id_post,
        string $id_user_owner,
        string $user_owner,
        string $title,
        string $description,
        string $image,
        string $created_at,
        int $like,
        int $dislike
        ) {
        $this->id_post = $id_post;
        $this->id_user_owner = $id_user_owner;
        $this->user_owner = $user_owner;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->created_at = $created_at;
        $this->like = $like;
        $this->dislike = $dislike;
    }

    public function getIdPost(): string {
        return $this->id_post;
    }

    public function setIdPost(string $id_post): void {
        $this->id_post = $id_post;
    }

    public function getIdUserOwner(): string {
        return $this->id_user_owner;
    }

    public function setIdUserOwner(string $id_user_owner): void {
        $this->id_user_owner = $id_user_owner;
    }

    public function getUserOwner(): string {
        return $this->user_owner;
    }

    public function setUserOwner(string $user_owner): void {
        $this->user_owner = $user_owner;
    }


    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): void {
        $this->title = $title;
    }

 
    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }


    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }


    public function getCreatedAt(): string {
        return $this->created_at;
    }

    public function setCreatedAt(string $created_at): void {
        $this->created_at = $created_at;
    }

    public function getLike(): int {
        return $this->like;
    }

    public function setLike(int $like): void {
        $this->like = $like;
    }

    public function getDislike(): int {
        return $this->dislike;
    }

    public function setDislike(int $dislike): void {
        $this->dislike = $dislike;
    }
}

?>
