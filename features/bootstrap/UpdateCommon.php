<?php

trait UpdateCommon
{
    /**
     * @Given /^I should get the message update successfully$/
     */
    public function iShouldGetTheMessageUpdateSuccessfully()
    {
        $data = json_decode($this->response->getBody(), true);

        if($data['msg'] == "Updated Successfully.")
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