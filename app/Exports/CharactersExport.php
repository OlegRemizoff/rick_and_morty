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
        return Characters::query()
        ->select([
            'characters.id',
            'characters.name',
            'characters.status',
            'characters.species',
            'characters.gender',
            'locations.name as location_name',
            'locations.url as location_url',
            DB::raw("GROUP_CONCAT(DISTINCT episodes.name SEPARATOR ', ') as episodes")
        ])
        ->leftJoin('character_episode', 'characters.id', '=', 'character_episode.character_id')
        ->leftJoin('episodes', 'episodes.id', '=', 'character_episode.episode_id')
        ->leftJoin('locations', 'characters.location_id', '=', 'locations.id')
        ->groupBy([
            'characters.id',
            'characters.name',
            'characters.status',
            'characters.species',
            'characters.gender',
            'locations.name',
            'locations.url'
        ])
        ->get()
        ->makeHidden(['id']);
        
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
