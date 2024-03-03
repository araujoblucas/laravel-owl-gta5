<?php

namespace App\Http\Controllers;

use App\Traits\Getters;

class HomeController extends Controller
{
    use Getters;

    const SUBCLASS = 'http://www.semanticweb.org/wilianssilva/ontologies/2024/1/untitled-ontology-7#missão';

    public function __invoke()
    {
        $data = $this->getDataFromFile();

        $types = [];
        foreach ($data as $item) {
            if (isset($item->{'http://www.w3.org/2000/01/rdf-schema#subClassOf'})) {
                foreach ($item->{'http://www.w3.org/2000/01/rdf-schema#subClassOf'} as $type) {
                    if ($type->{'@id'} === self::SUBCLASS) {
                        $types[] = $item->{'@id'};
                        break;
                    }
                }
            }
        }

        foreach ($types as $type) {
            foreach ($data as $item) {
                if (isset($item->{'@type'})) {
                    foreach ($item->{'@type'} as $itemType) {
                        if ($itemType === $type) {
                            $array[] = $item;
                            break;
                        }
                    }
                }
            }
        }

        $contents = [];
        foreach ($array as $item) {
            $contents[] = [
                'title' => $this->getTitle($item),
                'link' => $this->getLink($item),
                'description' => $this->getValue($item, config('fields.missions.description')),
                'image' => $this->getValue($item, config('fields.missions.image')),
                'local' => $this->getValue($item, config('fields.missions.local')),
                'objective' => $this->getValue($item, config('fields.missions.objective')),
                'pre-requisite' => $this->getValue($item, config('fields.missions.pre-requisite')),
            ];
        }

        return view('home', compact('contents'));
    }
}
