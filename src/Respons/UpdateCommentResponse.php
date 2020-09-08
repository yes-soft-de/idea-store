<?php

namespace App\Respons;

class UpdateCommentResponse
{
    
    private $id;
    private $comment;
    private $artical;
    private $date;
    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
    /**
     * @return mixed
     */

    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArtical()
    {
        return $this->artical;
    }

    /**
     * @param mixed $artical
     */
    public function setArtical($artical): self
    {
        $this->artical = $artical;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

     /**
     * @param mixed $artical
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
}
