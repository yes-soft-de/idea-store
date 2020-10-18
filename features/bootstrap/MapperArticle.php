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

    public function setArticle($articleTitle, $article, $idCategory, $date): void
    {
        $this->article = new ObjectArticle();

        $this->article->setArticleTitle($articleTitle);
        $this->article->setArticle($article);
        $this->article->setIdCategory($idCategory);
        $this->article->setDate($date);
    }

    public function getArticleAsArray(): array
    {
        return [
            "articleTitle"=>$this->article->getArticleTitle(),
            "article"=>$this->article->getArticle(),
            "idCategory"=>$this->article->getIdCategory(),
            "date" =>$this->article->getDate()
        ];
    }
}