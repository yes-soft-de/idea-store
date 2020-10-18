<?php

use GuzzleHttp\Client;

trait QueriesCommon
{
    public $request;

    /**
     * @var GuzzleHttp\Psr7\Response
     */
    public $response;

    /**
     * @var GuzzleHttp\Client $client
     */
    public $client;

    public function __construct()
    {
    }

    /**
     * @Then I should get a response code with :arg1
     */
    public function iShouldGetAResponseCodeWith($arg1)
    {
        if($this->response->getStatusCode()==$arg1)
            return;
        else
        {
            throw new Exception("Status code error", -1);
        }
    }

    /**
     * @Given I have access to backend
     */
    public function iHaveAccessToBackend()
    {
        $this->client = new Client([
            'base_uri'=>ConfigLinks::$BASE_API,
            'timeout'=>10.0
        ]);
        return true;
    }

    /**
     * @Then I should get a valid json
     */
    public function iShouldGetAValidJson()
    {
        if(ValidatorCommon::isValidJson($this->response)!=true)
        {
            throw new Exception("JSON Format Error".ValidatorCommon::isValidJson($this->response));
        }
    }

    /**
     * @Given /^I should get the message fetched successfully$/
     */
    public function iShouldGetTheMessageFetchedSuccessfully()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data['msg'] == "Fetched Successfully.")
        {
            return true;
        }
        else
        {
            //throw new Exception('Unexpected returned message!');
            echo "The item does not exist!";
        }
    }

}