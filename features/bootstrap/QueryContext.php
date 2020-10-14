<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use GuzzleHttp\Client;

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

    /**
     * @When /^I request all categories$/
     */
    public function iRequestAllCategories()
    {
        $this->response = $this->client->get(ConfigLinks::$BASE_API.ConfigLinks::$CATEGORIES_QUERY_ENDPOINT);
    }

    /**
     * @Given I have a category Id of :arg1
     * @param $arg1
     */
    public function iHaveACategoryIdOf($arg1)
    {
        $requestFactory = new RequestFactory();

        $this->request = $requestFactory->prepareRequestWithCategoryId($arg1);
    }

    /**
     * @Given I have access to the category query endpoint
     */
    public function iHaveAccessToTheCategoryQueryEndpoint()
    {
        $this->client = new Client([
            'base_uri'=>ConfigLinks::$BASE_API
        ]);
    }

    /**
    * @When I request category by Id
    */
    public function iRequestCategoryById()
    {
        $id = $this->request['category'];

        $this->response = $this->client->get(
            ConfigLinks::$BASE_API . ConfigLinks::$CATEGORY_ENDPOINT . '/' . $id,
            [
                \GuzzleHttp\RequestOptions::JSON=>$this->request
            ]
        );
    }

    /**
    * @Then The json should contain valid category
    */
    public function theJsonShouldContainValidCategory()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data['Data']['category'] == null)
        {
            throw new Exception('Error: Category is null!');
        }
    }

    /**
     * @When /^I request all projects with its categories$/
     */
    public function iRequestAllProjectsWithItsCategories()
    {
        $this->response = $this->client->get(
            ConfigLinks::$BASE_API.ConfigLinks::$CATEGORIES_WITH_PROJECTS_QUERY_ENDPOINT);
    }

    /**
     * @When /^I request all images$/
     */
    public function iRequestAllImages()
    {
        $this->response = $this->client->get(
            ConfigLinks::$BASE_API.ConfigLinks::$IMAGES_QUERY_ENDPOINT);
    }

    /**
     * @Given /^I have a project Id of "([^"]*)"$/
     */
    public function iHaveAProjectIdOf($arg1)
    {
        $requestFactory = new RequestFactory();

        $this->request = $requestFactory->prepareRequestWithProjectId($arg1);
    }

    /**
     * @When /^I request image by project Id$/
     */
    public function iRequestImageByProjectId()
    {
        $id = $this->request['project'];

        $this->response = $this->client->get(
            ConfigLinks::$BASE_API . ConfigLinks::$IMAGE_ENDPOINT . '/' . $id,
            [
                \GuzzleHttp\RequestOptions::JSON=>$this->request
            ]
        );
    }

    /**
     * @Given /^The json should contain valid project and image$/
     */
    public function theJsonShouldContainValidProjectAndImage()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data['Data']['project'] == null || $data['Data']['image'] == null)
        {
            throw new Exception('Error: Either image or project is null!');
        }
    }

    use QueriesCommon;
    use QueryUser;
    use QueryArticle;
}
