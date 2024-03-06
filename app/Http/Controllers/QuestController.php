<?php

namespace App\Http\Controllers;

use App\Traits\Getters;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class QuestController extends Controller
{
    use Getters;

    const SUBCLASS = 'http://www.semanticweb.org/ontologies/gta-ontology#missão';

    public function __invoke(string $mission = '')
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
            if ($this->getLink($item) != $mission) {
                continue;
            }

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
        $mission = Arr::first($contents);

        foreach ($data as $item) {
            if (isset($item->{'http://www.w3.org/2000/01/rdf-schema#range'})) {
                foreach ($item->{'http://www.w3.org/2000/01/rdf-schema#range'} as $type) {
                    if (Str::contains($type->{'@id'}, $mission['link'])) {
                        $mission['quest_owner'] = $this->getQuestOwner($item->{'http://www.w3.org/2000/01/rdf-schema#domain'}[0]);
                        break;
                    }
                }
            }
        }

        $mission['quest_owner'] = $mission['quest_owner'] ?? $this->getQuestOwner('');

        return view('quest', compact('mission'));
    }
}
