<?php


class RequestFactory
{
    public function prepareCreateArticleRequestPayload()
    {
        $articleMapper = new MapperArticle();

        $articleMapper->setArticle(
            "Behat test",
            "Testing create article api",
            "1",
            "2020-10-12"
        );

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

    public function prepareCategoryUpdatePayload($id)
    {
        return [
            "id" => $id,
            "category" => "behatCategory2",
            "description" => "behat tested"
        ];
    }

    public function prepareRequestWithCategoryId($id)
    {
        return [
            "category" => $id
        ];
    }

//    public function prepareCreateMessageRequestPayload($arg1)
//    {
//        $messageMapper = new MapperMessage();
//
//        $messageMapper->setMessage("Hello from Behat", $arg1,"2020-10-10");
//
//        return $messageMapper->getMessageAsArray();
//    }

    public function prepareCreateImagePayload($arg1)
    {
        $imageMapper = new MapperImage();

        $imageMapper->setImage(
            "BehatImageTest",$arg1
        );

        return $imageMapper->getImageAsArray();
    }

    public function prepareImageUpdatePayload($id)
    {
        return [
            "image" => "BehatTestUpdateImage",
            "project" => $id
        ];
    }

    public function prepareCreateProjectPayload()
    {
        $projectMapper = new MapperProject();

        $projectMapper->setProject("Behat test 12",
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

    public function prepareRequestWithProjectId($id)
    {
        return [
            "project" => $id
        ];
    }

    public function prepareProjectUpdateRequestPayload($id)
    {
        return [
            "id" => $id,
            "projectName" => "BehatProject",
            "description" => "Behat Update API Test"
        ];
    }

    public function prepareOrderUpdateRequestPayload($id, $user, $project)
    {
        return [
            "id" => $id,
            "projectName" => $user,
            "description" => $project
        ];
    }

    public function prepareCreateSpecialIdeaRequestPayload()
    {
        $specialIdeaMapper = new MapperSpecialIdea();

        $specialIdeaMapper->setSpecialIdea(
            "newSpecialIdeaBehat",
            "Behat test for create new special idea",
            "similarLinkTest"
        );

        return $specialIdeaMapper->getSpecialIdeaAsArray();
    }

    public function prepareRequestWithSpecialIdeaId($id)
    {
        return [
            "specialIdea" => $id
        ];
    }

    public function prepareCreateUserRequestPayload()
    {
        $userMapper = new MapperUser();

        $userMapper->setUser("BehatUser123@test.com",
            "['ROLE_USER']",
            "000",
            "BehatUser123",
            "121224",
            "2020-10-14"
        );

        return $userMapper->getUserAsArray();
    }

    public function prepareRequestWithUserId($id)
    {
        return [
            "user" => $id
        ];
    }

}