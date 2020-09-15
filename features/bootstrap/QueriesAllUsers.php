<?php

trait QueriesAllUsers
{
    /**
     * @When I request users list
     */
    public function iRequestUsersList()
    {
        $this->response = $this->client->get(ConfigLinks::$BASE_API.ConfigLinks::$USERS_QUERY_ENDPOINT);
    }

}
