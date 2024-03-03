<?php

namespace App\Http\Controllers;

use App\Traits\Getters;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    use Getters;

    const TYPE = 'http://www.semanticweb.org/wilianssilva/ontologies/2024/1/untitled-ontology-7#personagem';
    public function __invoke()
    {
        $data = $this->getDataFromFile();
//        dd($data);

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
