<?php


namespace App\Manager;


use App\AutoMapping;
use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use App\Request\CreateArticleRequest;
use App\Request\DeleteRequest;
use App\Request\GetByIdRequest;
use App\Request\UpdateArticleRequest;
use Doctrine\ORM\EntityManagerInterface;

class ArticleManager
{
    private $entityManager;
    private $articleRepository;
    private $autoMapping;

    public function __construct(EntityManagerInterface $entityManager, AutoMapping $autoMapping,
 ArticlesRepository $articleRepository)
    {
        $this->entityManager = $entityManager;
        $this->articleRepository = $articleRepository;
        $this->autoMapping = $autoMapping;
    }

    public function create(CreateArticleRequest $request)
    {
        $articleEntity = $this->autoMapping->map(CreateArticleRequest::class, Articles::class, $request);

        $this->entityManager->persist($articleEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $articleEntity;
    }

    public function update(UpdateArticleRequest $request)
    {
        $articleEntity = $this->articleRepository->getArticleById($request->getId());
        if(!$articleEntity)
        {

        }
        else
        {
            $articleEntity = $this->autoMapping->mapToObject(UpdateArticleRequest::class,
             Articles::class, $request, $articleEntity);
            $this->entityManager->flush();
            return $articleEntity;
        }
    }

    public function getAll()
    {
        $data = $this->articleRepository->getAll();
        return $data;
    }

    public function getArticleById(GetByIdRequest $request)
    {
        return $result = $this->articleRepository->getArticleById($request->getId());
    }

    
    public function delete(DeleteRequest $request)
    {
        $article = $this->articleRepository->getArticleById($request->getId());
        if(!$article)
        {

        }
        else
        {
            $this->entityManager->remove($article);
            $this->entityManager->flush();
        }
        return $article;
    }

    public function getArticleWithComment(GetByIdRequest $request)
    {
        return $result = $this->articleRepository->getArticleWithComment($request->getId());
    }
}