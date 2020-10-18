<?php


class MapperSpecialIdea
{
    /**
     * @var ObjectSpecialIdea $specialIdea
     */
    private $specialIdea;

    /**
     * @return ObjectSpecialIdea
     */
    public function getSpecialIdea(): ObjectSpecialIdea
    {
        return $this->specialIdea;
    }

    public function setSpecialIdea($ideaNew, $description, $similarIdeaLink): void
    {
        $this->specialIdea = new ObjectSpecialIdea();

        $this->specialIdea->setIdeaNew($ideaNew);
        $this->specialIdea->setDescription($description);
        $this->specialIdea->setSimilarIdeaLink($similarIdeaLink);
    }

    public function getSpecialIdeaAsArray(): array
    {
        return [
            "ideaNew"=>$this->specialIdea->getIdeaNew(),
            "description"=>$this->specialIdea->getDescription(),
            "similarIdealink"=>$this->specialIdea->getSimilarIdeaLink()
        ];
    }
}