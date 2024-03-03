<?php

namespace App\Services;

use EasyRdf\Graph;
use EasyRdf\Resource;
use Exception;
use Illuminate\Support\Facades\Log;

class GetterService
{
    protected $graph;

    protected $resource;

    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
//        $this->graph = $graph;
    }

    public function getLiteral(string $property): string
    {
        try {
            $value = $this->resource->getLiteral($property, 'pt');
            if (empty($value)) {
                $value = $this->resource->getLiteral($property);
            }
            if (empty($value)) {
                return '';
            }

            return $value->getValue();
        } catch (Exception $exception) {
            Log::critical('Error trying to get literal at '.self::class, ['exception' => $exception]);

            return '';
        }
    }
}
