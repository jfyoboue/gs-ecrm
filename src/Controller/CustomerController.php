<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpClient\HttpClient;

class CustomerController extends AbstractController {
    private $apiUrl = "http://127.0.0.1:8081/api";

    public function index() {
      $client = HttpClient::create();
      $url = $this->apiUrl.'/customers';
      $response = $client->request('GET', $url);
      $content = "";
      $statusCode = $response->getStatusCode();
      $customers = array();

      if ($statusCode == 200) {
        $content = json_decode($response->getContent());
        $customers = $content->data;
      }

      return $this->render('customers/index.html.twig', array('customers' => $customers));
    }

    public function new() {
      return $this->render('customers/new.html.twig');
    }

    public function create() {
      
    }
}
