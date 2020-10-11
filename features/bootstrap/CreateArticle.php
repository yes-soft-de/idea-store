<?php

trait CreateArticle
{
    /**
     * @var array $article
     */
    private $article;

    /**
     * @Given /^I have a valid article data$/
     */
    public function iHaveAValidArticleData()
    {
        $factory = new RequestFactory();

        $this->article = $factory->prepareCreateArticleRequestPayload();
    }

    /**
     * @When /^I request article create with the data I have$/
     */
    public function iRequestArticleCreateWithTheDataIHave()
    {
        $this->response = $this->httpClient->post(
            ConfigLinks::$BASE_API . ConfigLinks::$ARTICLE_ENDPOINT,
            [
                "json" => $this->article
            ]
        );
    }
}