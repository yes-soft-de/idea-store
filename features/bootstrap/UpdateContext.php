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
     * @var array $category
     */
    private $category;

    /**
     * UpdateContext constructor.
     */
    public function __construct()
    {
    }

    /**
     * @When /^I request category update of ID "([^"]*)"$/
     */
    public function iRequestCategoryUpdateOfID($arg1)
    {
        $factory = new RequestFactory();

        $this->category = $factory->prepareCategoryUpdatePayload($arg1);

        $this->response = $this->httpClient->put(
            ConfigLinks::$BASE_API.'category/'.$arg1,
        [
            "json"=>$this->category
        ]);
    }

    use CreateCommon;
    use UpdateCommon;
}