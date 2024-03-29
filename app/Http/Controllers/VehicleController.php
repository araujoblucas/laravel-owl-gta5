<?php

namespace App\Http\Controllers;

use App\Traits\Getters;
use Illuminate\Support\Arr;

class VehicleController extends Controller
{
    use Getters;

    const TYPE = 'http://www.semanticweb.org/ontologies/gta-ontology#veiculo';

    public function __invoke(string $vehicle = '')
    {
        $data = $this->getDataFromFile();

        $array = [];
        foreach ($data as $item) {
            if (isset($item->{'@type'})) {
                foreach ($item->{'@type'} as $type) {
                    if ($type === self::TYPE) {
                        $array[] = $item;
                        break;
                    }
                }
            }
        }
        $content = [];
        foreach ($array as $item) {
            if ($this->getLink($item) != $vehicle) {
                continue;
            }

            $content[] = [
                'name' => $this->getValue($item, config('fields.vehicles.name')),
                'link' => $this->getLink($item),
                'description' => $this->getValue($item, config('fields.vehicles.description')),
                'image' => $this->getValue($item, config('fields.vehicles.image')),
                'local' => $this->getValue($item, config('fields.vehicles.local')),
                'objective' => $this->getValue($item, config('fields.vehicles.objective')),
                'pre-requisite' => $this->getValue($item, config('fields.vehicles.pre-requisite')),
            ];
        }
        $vehicle = Arr::first($content);

        return view('vehicle', compact('vehicle'));
    }
}
