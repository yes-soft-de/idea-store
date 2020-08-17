<?php


namespace App\Manager;


use App\AutoMapping;
use App\Entity\SpecialIdea;
use App\Repository\SpecialIdeaRepository;
use App\Request\CreateSpecialIdeaRequest;
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

    public function getById()
    {}

    public function delete()
    {}
}