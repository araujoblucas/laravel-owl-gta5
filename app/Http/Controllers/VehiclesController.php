<?php

namespace App\Http\Controllers;

use App\Traits\Getters;

class VehiclesController extends Controller
{
    use Getters;

    const TYPE = 'http://www.semanticweb.org/wilianssilva/ontologies/2024/1/untitled-ontology-7#veiculo';

    public function __invoke()
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

        $vehicles = [];
        foreach ($array as $item) {
            $vehicles[] = [
                'name' => $this->getValue($item, config('fields.vehicles.name')),
                'link' => $this->getLink($item),
                'description' => $this->getValue($item, config('fields.vehicles.description')),
                'image' => $this->getValue($item, config('fields.vehicles.image')),
                'local' => $this->getValue($item, config('fields.vehicles.local')),
                'objective' => $this->getValue($item, config('fields.vehicles.objective')),
                'pre-requisite' => $this->getValue($item, config('fields.vehicles.pre-requisite')),
            ];
        }

        return view('vehicles', compact('vehicles'));
    }
}
