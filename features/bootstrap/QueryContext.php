<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class QueryContext implements Context
{
    /**
     * @var GuzzleHttp\Client $httpClient
     */
    private $httpClient;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When I request users list
     */
    public function iRequestUsersList()
    {
        $this->response = $this->client->get(ConfigLinks::$BASE_API.ConfigLinks::$USERS_QUERY_ENDPOINT);
    }

    /**
     * @When /^I request all articles$/
     */
    public function iRequestAllArticles()
    {
        $this->response = $this->client->get(ConfigLinks::$BASE_API.ConfigLinks::$ARTICLE_ENDPOINT);
    }

    use QueriesCommon;
    use QueryUser;
    use QueryArticle;
}
