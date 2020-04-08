<?php

namespace App\Controller\Blog;

use App\Form\Blog\CreateBlogFomType;
use App\Service\Blog\CreateBlogService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Swagger\Annotations as SWG;
use FOS\RestBundle\Controller\Annotations as REST;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

/**
 * @REST\Version("v1")
 */
class CreateBlogController extends AbstractController
{
    
    /**
     * @REST\Post(
     * "/{version}/blogs",
     * name="blogs.create"
     * )
     * @SWG\Response(
     *     response=201,
     *     description="Returns json data blog was created",
     * )
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request, CreateBlogService $service): JsonResponse
    {
        $form = $this->createForm(CreateBlogFomType::class);

        $form->submit($request->request->all());
        if(!$form->isValid()){
            throw new \Exception("Faile validate");
        }
        return $this->json($service->handle($form->getData()), Response::HTTP_CREATED, [], [AbstractNormalizer::GROUPS => 'blog']);
    }
}