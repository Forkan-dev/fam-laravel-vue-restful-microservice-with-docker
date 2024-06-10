<?php

namespace App\Services\Gateway;

use Illuminate\Support\Facades\Http;

class Gateway
{

    private string $prefix;
    private string $endPoint;
    private mixed $url;
    private mixed $method;
    private mixed $requestData;

    public function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->client = Http::acceptJson();
    }

    public function handle($requestData, $verify = false)
    {
        $this->requestData = $requestData;
        $this->detachingUrl();

        if (!$verify) {
            $this->client = $this->client->withoutVerifying();
        }

        return $this->call();
    }

    private function detachingUrl(): void
    {
        $parts = explode('/', $this->url);
        // remove empty string
        $parts = array_values(array_filter($parts));
        if (count($parts) < 3) {
            $this->prefix = $parts[1];
            $this->endPoint = $parts[1];
        }
    }

    private function call()
    {
        try {
            $api = $this->getApi();

            $response = match (strtolower($this->method)) {
                'post' => $this->client->post($api, $this->requestData),
                'put' => $this->client->put($api, $this->requestData),
                'delete' => $this->client->delete($api),
                default => $this->client->get($api),
            };

            return $response->json();

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    private function getApi(): string
    {
        $aliasAndPort = $this->getAliasAndPort();
        return "http://$aliasAndPort->alias:$aliasAndPort->port/api/v1/$this->endPoint";
    }

    private function getAliasAndPort(): object|int
    {
        return match ($this->endPoint) {
            'users', 'projects' => (object)(["alias" => "master-alias", "port" => 8001]),
            default => throw new \Exception("Endpoint not found"),
        };
    }
}
