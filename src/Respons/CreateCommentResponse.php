<?php

namespace App\Respons;

use phpDocumentor\Reflection\Types\Void_;


class CreateCommentResponse
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
    public function setartical($artical): void
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
