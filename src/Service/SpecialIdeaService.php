<?php


namespace App\Service;


use App\AutoMapping;
use App\Entity\SpecialIdea;
use App\Manager\SpecialIdeaManager;
use App\Respons\CreateSpecialIdeaResponse;
use App\Respons\GetSpecialIdeaResponse;

class SpecialIdeaService
{
    private $specialIdeaManager;
    private $autoMapping;

    public function __construct(SpecialIdeaManager $specialIdeaManager, AutoMapping $autoMapping)
    {
        $this->specialIdeaManager = $specialIdeaManager;
        $this->autoMapping = $autoMapping;
    }

    public function create($request)
    {
        $specialIdeaResult = $this->specialIdeaManager->create($request);
        $response = $this->autoMapping->map(SpecialIdea::class, CreateSpecialIdeaResponse::class, $specialIdeaResult);
        //here we should set the category
        return $response;
    }

    public function getAll()
    {
        $result = $this->specialIdeaManager->getAll();
        $response = [];
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map(SpecialIdea::class, GetSpecialIdeaResponse::class, $row);
        }

        return $response;
    }

    public function getById()
    {}

    public function delete()
    {}

}