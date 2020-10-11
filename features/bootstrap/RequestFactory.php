<?php


class RequestFactory
{
    public function prepareCreateArticleRequestPayload()
    {
        $articleMapper = new MapperArticle();

        $articleMapper->setArticle("Behat test", "Testing create article api", "1");

        return $articleMapper->getArticleAsArray();
    }

    public function prepareArticleUpdateRequestPayload($id)
    {
        return [
            "id" => $id,
            "articleTitle" => "Behat Update API Test",
            "article" => "Behat Update API Test",
            "idCategory" => "1"
        ];
    }

    public function prepareRequestWithArticleId($id)
    {
        return [
            "article" => $id
        ];
    }

    public function prepareCreateCategoryRequestPayload()
    {
        $categoryMapper = new MapperCategory();

        $categoryMapper->setCategory("Fantasy", "Fantasy category");

        return $categoryMapper->getCategoryAsArray();
    }

    public function prepareCreateUserRequestPayload()
    {
        $userMapper = new MapperUser();

        $userMapper->setUser("BehatUser1@test.com",
            "['ROLE_USER']",
            "000",
            "BehatUser1",
            "121224");

        return $userMapper->getUserAsArray();
    }

    public function prepareCreateProjectPayload()
    {
        $projectMapper = new MapperProject();

        $projectMapper->setProject("Behat test",
        "Behat test",
        "Behat test",
        "Behat test",
        "Behat test",
        "Behat test",
        "Behat test",
        "Behat test",
        "Behat test",
        "Behat test",
        "Behat test",
        "Behat test",
        "false");

        return $projectMapper->getProjectAsArray();
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