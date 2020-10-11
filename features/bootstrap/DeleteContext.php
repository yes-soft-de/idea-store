<?php

use Behat\Behat\Context\Context;
use GuzzleHttp\Client;

class DeleteContext implements Context
{
    /**
     * @var GuzzleHttp\Client $httpClient
     */
    private $httpClient;
    /**
     * @var GuzzleHttp\Psr7\Response
     */
    public $response;

    public function __construct()
    {
    }

    /**
     * @Given /^I am signed in admin$/
     */
    public function iAmSignedInAdmin()
    {
        $this->httpClient = new Client(['base_uri'=>ConfigLinks::$BASE_API]);

        return true;
    }

    /**
     * @When /^I request delete a category of ID "([^"]*)"$/
     */
    public function iRequestDeleteACategoryOfID($arg1)
    {
        $this->response = $this->httpClient->delete(
            ConfigLinks::$BASE_API.ConfigLinks::$CATEGORY_ENDPOINT.'/'.$arg1
        );
    }

    /**
     * @When /^I request delete an article of ID "([^"]*)"$/
     */
    public function iRequestDeleteAnArticleOfID($arg2)
    {
        $this->response = $this->httpClient->delete(
            ConfigLinks::$BASE_API.ConfigLinks::$ARTICLE_ENDPOINT.'/'.$arg2
        );
    }

    use QueriesCommon;
    use DeleteCommon;
}