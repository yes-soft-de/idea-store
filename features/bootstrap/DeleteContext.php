<?php

use Behat\Behat\Context\Context;
use GuzzleHttp\Client;

class DeleteContext implements Context
{
    /**
     * @var GuzzleHttp\Client $httpClient
     */
    private $httpClient;

    public function __construct()
    {
    }

    /**
     * @Given /^I am signed in admin$/
     */
    public function iAmSignedInAdmin()
    {
        $this->httpClient = new Client(['base_uri'=>ConfigLinks::$BASE_API]);

        return true;
    }



    use QueriesCommon;
    use DeleteCommon;
}