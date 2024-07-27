<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'name' =>'Frontend'
            ],
            [
                'name' =>'Backend'
            ],
            [
                'name' =>'Database'
            ],
            [
                'name' =>'DevOps'
            ]
        ];
        foreach($data as $record){
            category::create($record);
        }
    }
}
