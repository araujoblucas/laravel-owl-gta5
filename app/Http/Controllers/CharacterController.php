<?php

namespace App\Http\Controllers;

use App\Traits\Getters;
use Illuminate\Support\Str;

class CharacterController extends Controller
{
    use Getters;

    const SUBCLASS = 'http://www.semanticweb.org/ontologies/gta-ontology#personagem';

    public function __invoke(string $character)
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

        foreach ($array as $item) {
            if ($this->getLink($item) != $character) {
                continue;
            }
            $character = [
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

        foreach ($data as $item) {
            if (isset($item->{'http://www.w3.org/2000/01/rdf-schema#domain'})) {
                foreach ($item->{'http://www.w3.org/2000/01/rdf-schema#domain'} as $type) {
                    if (Str::contains($type->{'@id'}, $character['link'])) {
                        $character['quests'][] = $this->getMissions($item->{'http://www.w3.org/2000/01/rdf-schema#range'}[0]);
                        break;
                    }
                }
            }
        }

        $character['quests'] = $character['quests'] ?? [];

        return view('character', compact('character'));
    }
}
