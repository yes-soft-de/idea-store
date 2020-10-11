<?php


namespace App\Service;


use App\AutoMapping;
use App\Entity\Articles;
use App\Manager\ArticleManager;
use App\Respons\CreateArticleResponse;
use App\Respons\GetArticleByIdResponse;
use App\Respons\GetArticleResponse;
use App\Respons\UpdateArticleResponse;

class ArticleService
{
    private $articleManager;
    private $autoMapping;

    public function __construct(ArticleManager $articleManager, AutoMapping $autoMapping)
    {
        $this->articleManager = $articleManager;
        $this->autoMapping = $autoMapping;
    }

    public function create($request)
    {
        $articleResult = $this->articleManager->create($request);

        return $this->autoMapping->map(Articles::class, CreateArticleResponse::class, $articleResult);
    }

    public function update($request)
    {
        $articleResult = $this->articleManager->update($request);

        $response = $this->autoMapping->map(Articles::class, UpdateArticleResponse::class, $articleResult);
        $response->setArticle($request->getArticle());

        return $response;
    }

    public function getAll()
    {
        $response = [];
        $result = $this->articleManager->getAll();

        foreach ($result as $row)
        {
            $response[] = $this->autoMapping->map(Articles::class, GetArticleResponse::class, $row);
        }

        return $response;
    }

    public function getArticleById($request)
    {
        $result = $this->articleManager->getArticleById($request);

        return $this->autoMapping->map(Articles::class, GetArticleByIdResponse::class, $result);
    }

    public function delete($request)
    {
        $articleResult = $this->articleManager->delete($request);

        if(!($articleResult instanceof Articles))
        {
            return null;
        }

        return $this->autoMapping->map(Articles::class, GetArticleByIdResponse::class, $articleResult);
    }
}