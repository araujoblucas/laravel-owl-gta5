<?php

namespace App\Traits;

trait Getters
{
    public function getDataFromFile()
    {
        $file = file_get_contents(resource_path('resources.owl'));
        return json_decode($file);
    }

    public function getValue($item, $field): string
    {
        return ($item->{$field})[0]->{"@value"} ?? '';
    }

    public function getTitle($item)
    {
        $text = $item->{"@id"};
        $text = str_replace('http://www.semanticweb.org/wilianssilva/ontologies/2024/1/untitled-ontology-7#', '', $text);
        return str_replace('_', ' ', $text);
    }

    public function getLink($item)
    {
        $text = $item->{"@id"};
        return mb_strtolower(str_replace('http://www.semanticweb.org/wilianssilva/ontologies/2024/1/untitled-ontology-7#', '', $text));
    }

    public function getQuestOwner($item): array
    {
        if(empty($item)) {
            return [
                'title' => 'Personagem desconhecido',
                'link' => '#',
            ];
        }
        $text = $item->{"@id"};
        $owner = mb_strtolower(str_replace('http://www.semanticweb.org/wilianssilva/ontologies/2024/1/untitled-ontology-7#', '', $text));
        $characters = config('links.characters');

        foreach ($characters as $characterName => $characterLink) {
            if ($owner === $characterLink) {
                return [
                  'title' => $characterName,
                  'link' => $characterLink,
                ];
            }
        }
        return [
            'title' => 'Personagem desconhecido',
            'link' => '#',
        ];
    }
    public function getMissions($item): array
    {
        if(empty($item)) {
            return [
                'title' => 'Personagem desconhecido',
                'link' => '#',
            ];
        }
        $text = $item->{"@id"};
        $owner = mb_strtolower(str_replace('http://www.semanticweb.org/wilianssilva/ontologies/2024/1/untitled-ontology-7#', '', $text));
        $characters = config('links.missions');

        foreach ($characters as $characterName => $characterLink) {
            if ($owner === $characterLink) {
                return [
                  'title' => $characterName,
                  'link' => $characterLink,
                ];
            }
        }
        return [
            'title' => 'Personagem desconhecido',
            'link' => '#',
        ];
    }

}
