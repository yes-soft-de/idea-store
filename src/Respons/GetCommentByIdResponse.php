<?php


namespace App\Respons;

class GetCommentByIdResponse
{
 
    private $comment;
    private $artical;
    private $date;
   
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
