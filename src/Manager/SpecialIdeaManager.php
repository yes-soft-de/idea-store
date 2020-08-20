<?php


namespace App\Manager;


use App\AutoMapping;
use App\Entity\Categories;
use App\Entity\SpecialIdea;
use App\Repository\SpecialIdeaRepository;
use App\Request\CreateSpecialIdeaRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use Doctrine\ORM\EntityManagerInterface;

class SpecialIdeaManager
{
    private $entityManager;
    private $SpecialIdeaRepository;
    private $autoMapping;

    public function __construct(EntityManagerInterface $entityManager, SpecialIdeaRepository $specialIdeaRepository,
 AutoMapping $autoMapping)
    {
        $this->entityManager = $entityManager;
        $this->SpecialIdeaRepository =$specialIdeaRepository;
        $this->autoMapping = $autoMapping;
    }

    public function create(CreateSpecialIdeaRequest $request)
    {
        if($request->idCategories)
        {
            $category = $this->entityManager->getRepository(Categories::class)
                ->find($request->idCategories);
            $request->setIdCategories($category);
        }
        $specialIdeaEntity = $this->autoMapping->map(CreateSpecialIdeaRequest::class, SpecialIdea::class, $request);
        $this->entityManager->persist($specialIdeaEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $specialIdeaEntity;
    }

    public function getAll()
    {
        $data = $this->SpecialIdeaRepository->getAll();

        return $data;
    }

    public function getById(GetByIdRequest $request)
    {
        return $result = $this->SpecialIdeaRepository->getSpecialIdeaById($request->getId());
    }

    public function delete(DeleteRequest $request)
    {
        $specialIdea = $this->SpecialIdeaRepository->getSpecialIdeaById($request->getId());
        if(!$specialIdea)
        {

        }
        else
        {
            $this->entityManager->remove($specialIdea);
            $this->entityManager->flush();
        }
        return $specialIdea;
    }
}