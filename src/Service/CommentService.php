<?php


namespace App\Service;


use App\AutoMapping;
use App\Entity\Comments;
use App\Manager\CommentManager;
use App\Respons\CreateCommentResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Respons\GetCommentsResponse;
use App\Respons\GetCommentByIdResponse;
use App\Response\DeleteResponse;
use App\Respons\UpdateCommentResponse;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Doctrine\ORM\NonUniqueResultException;

class CommentService

{
    private $commentManager;
    private $autoMapping;


    public function __construct(CommentManager $commentManager, AutoMapping $autoMapping)
    {
        $this->commentManager =$commentManager;
        $this->autoMapping = $autoMapping;
    }

    public function create($request, $idArtical)
    {  
        $request->setArtical($request->getArtical($idArtical));
        $commentManager = $this->commentManager->create($request);
        $commentManager->getArtical($idArtical);
        $response = $this->autoMapping->map(Comments::class, CreateCommentResponse::class,
            $commentManager);
            
        return $response;
    }


    public function delete($request)
    {
        $result = $this->commentManager->delete($request);
        $response = $this->autoMapping->map(Comments::class, GetCommentByIdResponse::class, $result);
        //$error=[];
        if(!$response){
           $error=['error'=>"this comment not found!!!"];
           return $error;
        }
        else{
        return $response;}
        // $response = new DeleteResponse($result->getId());
      
        // return $response;
          
    }
    public function update($request)
    {
        $commentResult = $this->commentManager->update($request);
     
        $response = $this->autoMapping->map(Comments::class, UpdateCommentResponse::class, $commentResult);
        
        return $response;   
    }

    public function getCommentById($request)
    {
        $result = $this->commentManager->getCommentById($request);
        $response = $this->autoMapping->map(Comments::class, GetCommentByIdResponse::class, $result);
        return $response;
    }
    
    public function getAll($idArticle)
    {
        $result = $this->commentManager->getAll($idArticle);
        $response = [];
        foreach ($result as $row) {
            $response[] = $this->autoMapping->map(Comments::class, GetCommentsResponse::class, $row);
        }

        return $response;
    }

}