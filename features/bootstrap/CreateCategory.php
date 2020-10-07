<?php

trait CreateCategory
{
    /**
     * @var array $category
     */
    private $category;

    /**
     * @Given I have a valid category data
     */
    public function iHaveAValidCategoryData()
    {
        $factory = new RequestFactory();

        $this->category = $factory->prepareCreateCategoryRequestPayload();
    }

    /**
     * @When I request category create with the data I have
     */
    public function iRequestCategoryCreateWithTheDataIHave()
    {
        $this->response = $this->httpClient->post(
            ConfigLinks::$BASE_API . ConfigLinks::$CATEGORY_ENDPOINT,
            [
                "json" => $this->category
            ]
        );
    }

}