<?php


class MapperArticle
{
    /**
     * @var ObjectArticle $article
     */
    private $article;

    public function __construct()
    {
    }

    /**
     * @return ObjectArticle
     */
    public function getArticle(): ObjectArticle
    {
        return $this->article;
    }

    public function setArticle($articleTitle, $article, $idCategory): void
    {
        $this->article = new ObjectArticle();

        $this->article->setArticleTitle($articleTitle);
        $this->article->setArticle($article);
        $this->article->setIdCategory($idCategory);
    }

    public function getArticleAsArray(): array
    {
        return [
            "title"=>$this->article->getArticleTitle(),
            "article"=>$this->article->getArticle(),
            "category"=>$this->article->getIdCategory()
        ];
    }
}