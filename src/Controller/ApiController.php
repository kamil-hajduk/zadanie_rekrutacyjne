<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\PostDownloadService;

class ApiController extends AbstractController
{
    public function getPost(int $id, PostDownloadService $postDownloadService): Response
    {
        $post = $postDownloadService->getPost($id);
        return new Response($this->container->get('serializer')->serialize($post, 'json'));
    }

    public function getAllPosts(PostDownloadService $postDownloadService): Response
    {
        $posts = $postDownloadService->getAllPosts();
        return new Response($this->container->get('serializer')->serialize($posts, 'json'));
    }
}
