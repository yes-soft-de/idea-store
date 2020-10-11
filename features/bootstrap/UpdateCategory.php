<?php

trait UpdateCategory
{
    /**
     * @var array $category
     */
    private $category;

    /**
     * @When /^I request category update of ID "([^"]*)"$/
     */
    public function iRequestCategoryUpdateOfID($arg1)
    {
        $factory = new RequestFactory();

        $this->category = $factory->prepareCategoryUpdatePayload($arg1);

        $this->response = $this->httpClient->put(
            ConfigLinks::$BASE_API . ConfigLinks::$CATEGORY_ENDPOINT . '/' . $arg1,
            [
                "json"=>$this->category
            ]);
    }
}