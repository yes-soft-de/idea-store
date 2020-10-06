<?php


class RequestFactory
{
    public function prepareCreateCategoryRequestPayload()
    {
        $categoryMapper = new MapperCategory();

        $categoryMapper->setCategory("Fantasy", "Fantasy category");

        return $categoryMapper->getCategoryAsArray();
    }

    public function prepareCreateUserRequestPayload()
    {
        $userMapper = new MapperUser();

        $userMapper->setUser("Behat8989@test.com",
            "['ROLE_USER']",
            "000",
            "Behat8989",
            "12122112",
            "08-07-2020");

        return $userMapper->getUserAsArray();
    }

    public function prepareRequestWithUserId($id)
    {
        return [
            "user" => $id
        ];
    }

    public function prepareCategoryUpdatePayload($id)
    {
        return [
            "id" => $id,
            "category" => "behatCategory",
            "description" => "behat tested"
        ];
    }
}