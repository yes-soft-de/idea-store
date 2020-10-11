<?php

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

trait CreateCommon
{
    /**
     * @Given /^I am signed in admin$/
     */
    public function iAmSignedInAdmin()
    {
        $this->httpClient = new Client(['base_uri'=>ConfigLinks::$BASE_API]);

        return true;
    }

    /**
     * @Given I am an unsigned in user
     */
    public function iAmAnUnsignedInUser()
    {
        $this->httpClient = new Client(['base_uri'=>ConfigLinks::$BASE_API,
            'timeout'=>10.0]);

        return true;
    }

    /**
     * @Then I should get a response code with :arg1
     * @throws Exception
     */
    public function iShouldGetAResponseCodeWith($arg1)
    {
        if ($this->response->getStatusCode() == $arg1)
            return;
        else {
            return new Exception("Status Code Error", -1);
        }
    }
}