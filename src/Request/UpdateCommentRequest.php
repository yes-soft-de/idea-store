<?php

namespace App\Request;

class UpdateCommentRequest
{
    
    public $id;
    public $comment;
    public $artical;
    public $date;
   /**
     * @return mixed
     */
    public function getId()
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
    public function getArtical(): ?Artical
    {
        return $this->artical;
    }

    /**
     * @param mixed $artical
     */
    public function setArtical($artical):void
    {
        $this->artical = $artical;

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
