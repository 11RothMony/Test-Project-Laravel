<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\tag;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' => 'HTML'
            ],
            [
                'name' => 'CSS'
            ],
            [
                'name' => 'JAVASCRIPT'
            ],
            [
                'name' => 'REACT JS'
            ],
            [
                'name' => 'NEXT JS'
            ],
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'LARAVEL'
            ],
            [
                'name' => 'MY SQL'
            ]
        ];
        foreach ($data as $record){
            tag::create($record);
        }
    }
}
