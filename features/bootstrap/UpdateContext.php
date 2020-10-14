<?php


use Behat\Behat\Context\Context;

class UpdateContext implements Context
{
    /**
     * @var GuzzleHttp\Client $httpClient
     */
    private $httpClient;

    private $request;
    /**
     * @var GuzzleHttp\Psr7\Response
     */
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
     * @var array $image
     */
    private $image;

    /**
     * UpdateContext constructor.
     */
    public function __construct()
    {
    }

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

    /**
     * @When /^I request category update of ID "([^"]*)"$/
     */
    public function iRequestCategoryUpdateOfID($arg1)
    {
        $factory = new RequestFactory();

        $this->category = $factory->prepareCategoryUpdatePayload($arg1);

        $this->response = $this->httpClient->put(
            ConfigLinks::$BASE_API . ConfigLinks::$CATEGORY_ENDPOINT . '/' . $arg1,
            [
                "json"=>$this->category
            ]);
    }

    /**
     * @When /^I request image update of project ID "([^"]*)"$/
     */
    public function iRequestImageUpdateOfProjectID($arg1)
    {
        $factory = new RequestFactory();

        $this->image = $factory->prepareImageUpdatePayload($arg1);

        $this->response = $this->httpClient->put(
            ConfigLinks::$BASE_API . ConfigLinks::$IMAGE_ENDPOINT,
            [
                "json"=>$this->image
            ]);
    }

    /**
     * @Given /^The updated image should be equal to the new value$/
     */
    public function theUpdatedImageShouldBeEqualToTheNewValue()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data['Data']['image'] != "BehatTestUpdateImage")
        {
            throw new Exception('The image was not being updated correctly!');
        }
    }

    use CreateCommon;
    use UpdateCommon;
}