<?php


<<<<<<< HEAD
namespace App\Response;
=======
namespace App\Respons;
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44


class DeleteResponse
{
    public $id;

    /**
     * DeleteRequest constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}