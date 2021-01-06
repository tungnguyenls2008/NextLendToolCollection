<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('forms')->insert([
            'id' => 1,
            'form_title' => 'Hồ sơ mẫu 01',
            'json_form_info' => '{"title":"saafsdf","form":[{"type":"checkbox-group","required":0,"label":"Nhóm hộp kiểm","name":"checkbox-group-1609909708234","values":[{"option-1":"Option 1"}]},{"type":"radio-group","required":0,"label":"Nhóm Radio","name":"radio-group-1609909706889","values":[{"option-1":"Option 1"},{"option-2":"Option 2"},{"option-3":"Option 3"}]},{"type":"select","required":0,"label":"Chọn","name":"select-1609909706142","multiple":0,"values":[{"option-1":"Option 1"},{"option-2":"Option 2"},{"option-3":"Option 3"}]},{"type":"text","required":0,"label":"Trường văn bản","name":"text-1609909704963"}]}',
            'json_data'=>'[{"type":"checkbox-group","required":0,"label":"Nhóm hộp kiểm","name":"checkbox-group-1609909708234","values":[{"option-1":"Option 1"}]},{"type":"radio-group","required":0,"label":"Nhóm Radio","name":"radio-group-1609909706889","values":[{"option-1":"Option 1"},{"option-2":"Option 2"},{"option-3":"Option 3"}]},{"type":"select","required":0,"label":"Chọn","name":"select-1609909706142","multiple":0,"values":[{"option-1":"Option 1"},{"option-2":"Option 2"},{"option-3":"Option 3"}]},{"type":"text","required":0,"label":"Trường văn bản","name":"text-1609909704963"}]',
            'creator' => 'admin',
            'version' => '1',
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
