<?php
namespace App\Manager;

use App\AutoMapping;
use App\Entity\Comments;
use App\Entity\Articles;

use App\Repository\CommentsRepository;
use App\Request\CreateCommentRequest;
use App\Repository\ArticlesRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Request\GetByIdRequest;
use App\Request\DeleteRequest;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Flex\Response;
use App\Request\UpdateCommentRequest;
use PhpParser\Comment;

class CommentManager
{
    private $entityManager;
    private $commentsRepository;
    private $autoMapping;   
    private $articlesRepository;

    public function __construct(EntityManagerInterface $entityManagerInterface,
    CommentsRepository $commentsRepository, AutoMapping $autoMapping, ArticlesRepository $articlesRepository )
    {
        $this->entityManager = $entityManagerInterface;
        $this->commentsRepository=$commentsRepository;
        $this->autoMapping = $autoMapping;
        $this->articlesRepository = $articlesRepository;
    }

    public function create(CreateCommentRequest $request)
    {
        if($request->artical){
            $artical= $this->entityManager->getRepository(Articles::class)
            ->find($request->artical);
            $request->setArtical($artical);
        }
        
        $commentEntity = $this->autoMapping->map(CreateCommentRequest::class, Comments::class, $request);

        $this->entityManager->persist($commentEntity);
        $this->entityManager->flush();
        $this->entityManager->clear();
        return $commentEntity;
    }
   

    public function delete(DeleteRequest $request)
    {
        $comment = $this->commentsRepository->findCommentByld($request->getId());
        if (!$comment ) {
           // return new Response(['data'=>'this project  is not found']);
          
        } 
         else{   

            $this->entityManager->remove($comment);
            $this->entityManager->flush();
         }
         return $comment;
    }
    public function update(UpdateCommentRequest $request)
    {
       
        if ($request->artical) {
            $artical = $this->entityManager->getRepository(Articles::class)
                ->find($request->artical);
            $request->setArtical($artical);
        }

        $commentEntity = $this->commentsRepository->findCommentByld($request->getId());
        
        if (!$commentEntity) {

        } else {
            $commentEntity = $this->autoMapping->mapToObject(UpdateCommentRequest::class, Comments::class, $request, $commentEntity);
            $this->entityManager->flush();
        }
        return $commentEntity;
    }
    
    public function getCommentById(GetByIdRequest $request)
    {

        return $result = $this->commentsRepository->findCommentByld($request->getId());
    }
    
    
    public function getAll($idArticle)
    {
        $data = $this->commentsRepository->getAll($idArticle);

        return $data;
    }
}
