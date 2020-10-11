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
     * UpdateContext constructor.
     */
    public function __construct()
    {
    }

    use CreateCommon;
    use UpdateCommon;
    use UpdateArticle;
    use UpdateCategory;
}