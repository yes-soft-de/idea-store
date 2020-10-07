<?php

trait DeleteCommon
{
    /**
     * @var GuzzleHttp\Psr7\Response
     */
    public $response;

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
     * @Given /^I expect json response contain message of deleted successfully$/
     */
    public function iExpectJsonResponseContainMessageOfDeletedSuccessfully()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data['msg'] == "deleted Successfully.")
        {
            return true;
        }
        else
        {
            throw new Exception('Unexpected returned message!');
        }
    }
}