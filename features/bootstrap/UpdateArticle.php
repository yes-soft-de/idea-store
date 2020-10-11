<?php

trait UpdateArticle
{
    /**
     * @var array $article
     */
    private $article;

    /**
     * @When /^I request article update of ID "([^"]*)"$/
     */
    public function iRequestArticleUpdateOfID($arg1)
    {
        $factory = new RequestFactory();

        $this->article = $factory->prepareArticleUpdateRequestPayload($arg1);

        $this->response = $this->httpClient->put(
            ConfigLinks::$BASE_API . ConfigLinks::$ARTICLE_ENDPOINT,
            [
                "json"=>$this->article
            ]);
    }

}