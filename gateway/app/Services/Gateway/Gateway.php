<?php

namespace App\Services\Gateway;

use Illuminate\Support\Facades\Http;

class Gateway
{

    private string $prefix;
    private string $endPoint;

    public function handle($prefix)
    {
        $this->detachingUrl($prefix);
        $response = $this->call();
        dd($response->json());
    }

    private function detachingUrl($prefix)
    {
        $parts = explode('/', $prefix);
//        remove empty string
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
            return Http::withoutVerifying()->get($api);
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
            default => 500,
        };
    }
}
