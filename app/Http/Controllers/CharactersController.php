<?php

namespace App\Http\Controllers;

use App\Traits\Getters;

class CharactersController extends Controller
{
    use Getters;

    const SUBCLASS = 'http://www.semanticweb.org/ontologies/gta-ontology#personagem';

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

        $characters = [];
        foreach ($array as $item) {
            $characters[] = [
                'name' => $this->getValue($item, config('fields.characters.name')),
                'link' => $this->getLink($item),
                'social_class' => $this->getValue($item, config('fields.characters.social_class')),
                'job' => $this->getValue($item, config('fields.characters.job')),
                'image' => $this->getValue($item, config('fields.characters.image')),
                'special_ability' => $this->getValue($item, config('fields.characters.special_ability')),
                'age' => $this->getValue($item, config('fields.characters.age')),
                'home' => $this->getValue($item, config('fields.characters.home')),
            ];
        }

        return view('characters', compact('characters'));
    }
}
