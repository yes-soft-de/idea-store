<?php

trait CreateProject
{
    /**
     * @var array $project
     */
    private $project;

    /**
     * @Given /^I have a valid project data$/
     */
    public function iHaveAValidProjectData()
    {
        $factory = new RequestFactory();

        $this->project = $factory->prepareCreateProjectPayload();
    }

    /**
     * @When /^I request project create with the data I have and Category ID "([^"]*)"$/
     */
    public function iRequestProjectCreateWithTheDataIHaveAndCategoryID($arg1)
    {
        $this->response = $this->httpClient->post(
            ConfigLinks::$BASE_API . ConfigLinks::$PROJECT_ENDPOINT . '/'. $arg1,
            [
                "json" => $this->project
            ]
        );
    }
}