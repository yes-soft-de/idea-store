<?php


use Behat\Behat\Context\Context;
use GuzzleHttp\Client;

/**
 * Defines application features from the specific context.
 */
class QueriesContext implements Context
{
    public function __construct()
    {}

    use QueriesCommon;
    use QueriesAllUsers;
}