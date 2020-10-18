<?php
use Behat\Behat\Context\Context;

/**
 * Defines application features from the specific context.
 */
class CreateContext implements Context
{
    /**
     * @var GuzzleHttp\Client $httpClient
     */
    private $httpClient;
    private $request;
//    /**
//     * @var GuzzleHttp\Psr7\Response
//     */
    private $response;

    /**
     * @var array $article
     */
    private $article;

    /**
     * @var array $category
     */
    private $category;

    /**
     * @var array $project
     */
    private $project;

    /**
     * @var array $user
     */
    private $user;

    /**
     * @var array $image
     */
    private $image;

    /**
     * @var array $message
     */
    private $message;

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

    /**
     * @Given /^The json should contain the new article$/
     */
    public function theJsonShouldContainTheNewArticle()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data["Data"]["articleTitle"] != "Behat test")
        {
            throw new Exception('Error in creating new article!');
        }
    }

    /**
     * @Given I have a valid category data
     */
    public function iHaveAValidCategoryData()
    {
        $factory = new RequestFactory();

        $this->category = $factory->prepareCreateCategoryRequestPayload();
    }

    /**
     * @When I request category create with the data I have
     */
    public function iRequestCategoryCreateWithTheDataIHave()
    {
        $this->response = $this->httpClient->post(
            ConfigLinks::$BASE_API . ConfigLinks::$CATEGORY_ENDPOINT,
            [
                "json" => $this->category
            ]
        );
    }

    /**
     * @Given /^The json should contain the new category$/
     */
    public function theJsonShouldContainTheNewCategory()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data["Data"]["category"] != "Fantasy")
        {
            throw new Exception('Error in creating new category!');
        }
    }

    /**
     * @Given /^I have a valid project data$/
     */
    public function iHaveAValidProjectData()
    {
        $factory = new RequestFactory();

        $this->project = $factory->prepareCreateProjectPayload();
    }

    /**
     * @When /^I request project create with the data I have and Category ID "([^"]*)"$/
     */
    public function iRequestProjectCreateWithTheDataIHaveAndCategoryID($arg1)
    {
        $this->response = $this->httpClient->post(
            ConfigLinks::$BASE_API . ConfigLinks::$PROJECT_ENDPOINT . '/'. $arg1,
            [
                "json" => $this->project
            ]
        );
    }

    /**
     * @Given /^The json should contain the new project$/
     */
    public function theJsonShouldContainTheNewProject()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data["Data"]["projectName"] != "Behat test 12")
        {
            throw new Exception('Error in creating new project!');
        }
    }

    /**
     * @Given /^I have a valid user data$/
     */
    public function iHaveAValidUserData()
    {
        $factory = new RequestFactory();

        $this->user = $factory->prepareCreateUserRequestPayload();
    }

    /**
     * @When /^I request user create with the data I have$/
     */
    public function iRequestUserCreateWithTheDataIHave()
    {
        $this->response = $this->httpClient->post(
            ConfigLinks::$BASE_API . ConfigLinks::$CREATE_USER_ENDPOINT,
            [
                "json" => $this->user
            ]
        );
    }

    /**
     * @Given /^I have an exist project ID "([^"]*)"$/
     */
    public function iHaveAnExistProjectID($arg1)
    {
        $factory = new RequestFactory();

        $this->project = $factory->prepareRequestWithProjectId($arg1);

        $this->response = $this->httpClient->get(
          ConfigLinks::$BASE_API . ConfigLinks::$PROJECT_ENDPOINT. '/' . $arg1
        );

        if(!($this->response))
        {
            throw new Exception('The provided project does not exist!');
        }
    }

    /**
     * @Given /^I have a valid image data$/
     */
    public function iHaveAValidImageData()
    {
        $data = json_decode($this->response->getBody(), true);

        $projectID = $data['Data'][0]['id'];

        $factory = new RequestFactory();

        $this->image = $factory->prepareCreateImagePayload($projectID);

    }

    /**
     * @When /^I request image create with the data I have$/
     */
    public function iRequestImageCreateWithTheDataIHave()
    {
        $this->response = $this->httpClient->post(
            ConfigLinks::$BASE_API . ConfigLinks::$IMAGE_ENDPOINT,
            [
                "json" => $this->image
            ]
        );
    }

    /**
     * @Given /^The json should contain the new image$/
     */
    public function theJsonShouldContainTheNewImage()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data["Data"]["image"] != "BehatImageTest")
        {
            throw new Exception('Error in creating new image!');
        }
    }

    /**
     * @Given /^The json should contain the new user name$/
     */
    public function theJsonShouldContainTheNewUserName()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data["Data"]["userName"] != "BehatUser123")
        {
            throw new Exception('Error in creating new user!');
        }
    }

    /**
     * @Given /^I have a valid message data from userID "([^"]*)"$/
     */
    public function iHaveAValidMessageDataFromUserID($arg1)
    {
        $factory = new RequestFactory();

        $this->message = $factory->prepareCreateMessageRequestPayload($arg1);
    }

    /**
     * @When /^I request message create with the data I have$/
     */
    public function iRequestMessageCreateWithTheDataIHave()
    {
        $this->response = $this->httpClient->post(
            ConfigLinks::$BASE_API . ConfigLinks::$MESSAGE_ENDPOINT . '/' . $this->message["user"],
            [
                "json" => $this->message
            ]
        );
    }

    /**
     * @Then The json should contain the subject of the created message
     */
    public function theJsonShouldContainTheSubjectOfTheCreatedMessage()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data["Data"]["subject"] != "HelloBehat")
        {
            throw new Exception('Error in creating new message!');
        }
    }


    use CreateCommon;
}