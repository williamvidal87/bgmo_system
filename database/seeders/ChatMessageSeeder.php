<?php

namespace Database\Seeders;

use App\Models\ChatMessageDatabase;
use Illuminate\Database\Seeder;

class ChatMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message = [
			[
				'from_id' 			=> '1',
				'to_id' 			=> '2',
				'message' 			=> 'hi',
				'created_at'        => '2022-11-02 15:06:30',
			],
			[
				'from_id' 			=> '2',
				'to_id' 			=> '1',
				'message' 			=> 'hi',
				'created_at'        => '2022-11-02 16:06:30',
			],
			[
				'from_id' 			=> '2',
				'to_id' 			=> '1',
				'message' 			=> 'hello',
				'created_at'        => '2022-11-02 15:06:30',
			],
        ];
        
        
        ChatMessageDatabase::insert($message);
    }
}
