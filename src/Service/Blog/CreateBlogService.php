<?php

namespace App\Service\Blog;

use App\Entity\Blog;
use App\Entity\User;
use App\Service\BaseService;

class CreateBlogService extends BaseService 
{
    
    public function handle(Blog $blog)
    {
        $author = $this->entityManagerInterface->getRepository(User::class)->find(1);
        $blog->setAuthor($author);
        $this->entityManagerInterface->persist($blog);
        $this->entityManagerInterface->flush();
        return $blog;
    }
}