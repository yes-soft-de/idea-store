<?php

use Behat\Gherkin\Node\PyStringNode;
use GuzzleHttp\Psr7\Request;

trait CreateUser
{
    /**
     * @var array $user
     */
    private $user;

//    /**
//     * @Given I have a valid user data:
//     */
//    public function iHaveAValidUserData2(PyStringNode $string)
//    {
//        $this->requestPayload = $string;
//    }

//    /**
//     * @Then I should find the newly created user in the user List
//     */
//    public function iShouldFindTheNewlyCreatedUserInTheUserList()
//    {
//        $res = $this->httpClient->request('GET',
//         ConfigLinks::$BASE_API.ConfigLinks::$USERS_QUERY_ENDPOINT);
//
//        $json = json_decode($res->getBody()->getContents())->Data;
//
//        foreach ($json as $item)
//        {
//            if($this->user["userName"]==$item->userName)
//                return true;
//            else echo $this->user["userName"]." != ".$item->userName;
//        }
//
//        throw new Exception('User was not found!');
//    }
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