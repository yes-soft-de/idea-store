<?php

use Behat\Gherkin\Node\PyStringNode;
use GuzzleHttp\Psr7\Request;

trait CreateUser
{
    /**
     * @var array $user
     */
    private $user;

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


}