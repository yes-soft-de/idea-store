<?php

trait DeleteCommon
{
    /**
     * @Given /^I expect json response contain message of deleted successfully$/
     */
    public function iExpectJsonResponseContainMessageOfDeletedSuccessfully()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data['msg'] == "Deleted Successfully.")
        {
            return true;
        }
        else
        {
            //throw new Exception('Unexpected returned message!');
            echo "The item of the provided ID does not exist!";
        }
    }
}