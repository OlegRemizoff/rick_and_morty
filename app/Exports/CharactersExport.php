<?php

namespace App\Exports;

use App\Models\Characters;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CharactersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Characters::join('locations', 'characters.location_id', '=', 'locations.id')
        ->join('character_episode', 'characters.id', '=', 'character_episode.character_id')
        ->join('episodes', 'character_episode.episode_id', '=', 'episodes.id')
        ->select(
            'characters.name',
            'characters.status',
            'characters.species',
            'characters.gender',
            'locations.name as locations_name',
            'locations.url',
            DB::raw('GROUP_CONCAT(episodes.name SEPARATOR ", ") as episode_names')
        )
        ->groupBy([
            'characters.id',
            'characters.name',
            'characters.status',
            'characters.species',
            'characters.gender',
            'locations.name',
            'locations.url',
            'episodes.name'
        ])
        ->get();
    }

    public function headings(): array
    {
        // Задаем названия столбцов
        return [
            'Имя',
            'Статус',
            'Вид',
            'Пол',
            'Название локации',
            'url локации',
            'Эпизоды, в которых снимался',
        ];
    }

}
