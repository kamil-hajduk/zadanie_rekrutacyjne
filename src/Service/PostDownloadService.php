<?php
namespace App\Service;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;

use App\Model\HandlerInterface;
use App\Model\Post;
use GuzzleHttp\Client;

class PostDownloadService implements HandlerInterface
{
    private $client;
    private $serializer;

    public function __construct()
    {
        $this->client = new Client();
        $this->serializer = new Serializer([new ObjectNormalizer(), new ArrayDenormalizer()], ['json' => new JsonEncoder()]);
    }

    public function getPost(int $postId): Post
    {
      $response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/posts/'.$postId);
      $post = $this->serializer->deserialize($response->getBody(), 'App\Model\Post', 'json');
      return $post;
    }

    public function getAllPosts(): array
    {
      $response = $this->client->request('GET', 'https://jsonplaceholder.typicode.com/posts');
      $posts = $this->serializer->deserialize($response->getBody(), 'App\Model\Post[]', 'json');
      return $posts;
    }
}
