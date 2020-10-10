<?php


namespace App\Service;


use App\AutoMapping;
use App\Entity\SpecialIdea;
use App\Manager\SpecialIdeaManager;
use App\Respons\CreateSpecialIdeaResponse;
use App\Respons\GetSpecialIdeaByIdResponse;
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

    public function create($request, $idCategory)
    {
        $request->setIdCategories($request->getIdCategories($idCategory));

        $specialIdeaResult = $this->specialIdeaManager->create($request);

        $specialIdeaResult->getIdCategories($idCategory);

        return $this->autoMapping->map(SpecialIdea::class, CreateSpecialIdeaResponse::class, $specialIdeaResult);
    }

    public function getAll()
    {
        $response = [];
        $result = $this->specialIdeaManager->getAll();

        foreach ($result as $row) {
            $response[] = $this->autoMapping->map(SpecialIdea::class, GetSpecialIdeaResponse::class, $row);
        }

        return $response;
    }

    public function getById($request)
    {
        $result = $this->specialIdeaManager->getById($request);

        return $this->autoMapping->map(SpecialIdea::class, GetSpecialIdeaByIdResponse::class, $result);
    }

    public function delete($request)
    {
        $specialIdeaResult = $this->specialIdeaManager->delete($request);

        return $this->autoMapping->map(SpecialIdea::class, GetSpecialIdeaByIdResponse::class,
            $specialIdeaResult);
    }

}