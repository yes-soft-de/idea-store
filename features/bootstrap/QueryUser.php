<?php

use GuzzleHttp\Client;

trait QueryUser
{
    /**
     * @Given I have a user Id of :arg3
     * @param $arg3 int
     */
    public function iHaveAUserIdOf($arg3)
    {
        $requestFactory = new RequestFactory();

        $this->request = $requestFactory->prepareRequestWithUserId($arg3);
    }

    /**
     * @When I request user by Id
     */
    public function iRequestUserById()
    {
        $id = $this->request['user'];

        $this->response = $this->client->get(
            ConfigLinks::$BASE_API.'users/'.$id,
            [
                \GuzzleHttp\RequestOptions::JSON=>$this->request
            ]
        );
    }

//    /**
//     * @Then I expect a response code of :arg1
//     */
//    public function iExpectAResponseCodeOf($arg1)
//    {
//        throw new PendingException();
//    }

//    /**
//     * @Then I expect a valid json response
//     */
//    public function iExpectAValidJsonResponse()
//    {
//        throw new PendingException();
//    }

    /**
     * @Then The json should contain valid user name
     */
    public function theJsonShouldContainValidUserName()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data['Data']['username'] == null || $data['Data']['username'] == "")
        {
            throw new Exception('Error: Username is either empty or null!');
        }
    }

    /**
     * @Given /^I have access to the user query endpoint$/
     */
    public function iHaveAccessToTheUserQueryEndpoint()
    {
        $this->client = new Client([
            'base_uri'=>ConfigLinks::$BASE_API
        ]);
    }

    /**
     * @Given I have a wrong user Id of :arg4
     */
    public function iHaveAWrongUserIdOf($arg4)
    {
        $requestFactory = new RequestFactory();

        $this->request = $requestFactory->prepareRequestWithUserId($arg4);
    }

    /**
     * @Then I expect json response contain null value
     */
    public function iExpectJsonResponseContainNullValue()
    {
        $response = json_decode($this->response->getBody(), true);

        if (!isset($response['Data'])) {
            return true;
        } else {
            throw new Exception("Data Load is incorrect");
        }
    }

    /**
     * @Then I expect json response contain message of Data not found
     */
    public function iExpectJsonResponseContainMessageOfDataNotFound()
    {
        $response = json_decode($this->response->getBody(), true);

        if ($response["msg"] == "Data not found!") {
            return true;
        } else {
            throw new Exception("Message is Deceiving");
        }
    }

}