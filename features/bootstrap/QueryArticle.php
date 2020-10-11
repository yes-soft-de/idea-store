<?php

use GuzzleHttp\Client;

trait QueryArticle
{
    /**
     * @Given /^I have an article Id of "([^"]*)"$/
     */
    public function iHaveAnArticleIdOf($arg1)
    {
        $requestFactory = new RequestFactory();

        $this->request = $requestFactory->prepareRequestWithArticleId($arg1);
    }

    /**
     * @Given /^I have access to the article query endpoint$/
     */
    public function iHaveAccessToTheArticleQueryEndpoint()
    {
        $this->client = new Client([
            'base_uri'=>ConfigLinks::$BASE_API
        ]);
    }

    /**
     * @When /^I request article by Id$/
     */
    public function iRequestArticleById()
    {
        $id = $this->request['article'];

        $this->response = $this->client->get(
            ConfigLinks::$BASE_API . ConfigLinks::$ARTICLE_ENDPOINT . '/' . $id,
            [
                \GuzzleHttp\RequestOptions::JSON=>$this->request
            ]
        );
    }

    /**
     * @Given /^The json should contain valid article title$/
     */
    public function theJsonShouldContainValidArticleTitle()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data['Data']['articleTitle'] == null)
        {
            throw new Exception('Error: Article title is null!');
        }
    }
}