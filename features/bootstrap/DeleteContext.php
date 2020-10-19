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

    /**
     * @When /^I request delete a project of ID "([^"]*)"$/
     */
    public function iRequestDeleteAProjectOfID($arg1)
    {
        $this->response = $this->httpClient->delete(
            ConfigLinks::$BASE_API.ConfigLinks::$PROJECT_ENDPOINT.'/'.$arg1
        );
    }

    /**
     * @When /^I request delete a special idea of ID "([^"]*)"$/
     */
    public function iRequestDeleteASpecialIdeaOfID($arg1)
    {
        $this->response = $this->httpClient->delete(
            ConfigLinks::$BASE_API.ConfigLinks::$SPECIAL_IDEA_ENDPOINT.'/'.$arg1
        );
    }

    /**
     * @When /^I request delete an order of ID "([^"]*)"$/
     */
    public function iRequestDeleteAnOrderOfID($arg1)
    {
        $this->response = $this->httpClient->delete(
            ConfigLinks::$BASE_API.ConfigLinks::$ORDER_ENDPOINT.'/'.$arg1
        );
    }

    /**
     * @When /^I request delete a message of ID "([^"]*)"$/
     */
    public function iRequestDeleteAMessageOfID($arg1)
    {
        $this->response = $this->httpClient->delete(
            ConfigLinks::$BASE_API.ConfigLinks::$MESSAGE_ENDPOINT.'/'.$arg1
        );
    }

    use QueriesCommon;
    use DeleteCommon;
}