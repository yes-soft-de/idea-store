<?php


class RequestFactory
{
    public function prepareCreateCategoryRequestPayload()
    {
        $categoryMapper = new MapperCategory();

        $categoryMapper->setCategory("drama", "drama");

        return $categoryMapper->getCategoryAsArray();
    }
}