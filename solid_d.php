<?php

interface HttpServiceInterface
{
    public function request(string $url, string $method, array $options = []);
}

class XMLHttpService implements HttpServiceInterface
{
    public function request(string $url, string $method, array $options = [])
    {
        // Some logic
    }
}

class Http
{
    public function __construct(protected HttpServiceInterface $service)
    {
    }

    public function get(string $url, array $options): void
    {
        $this->service->request($url, 'GET', $options);
    }

    public function post(string $url): void
    {
        $this->service->request($url, 'POST');
    }
}

$http = new Http(new XMLHttpService());
$http->get('url', []);
$http->post('url');
