<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
			[
				'status' 			=> 'Approve',
			],
			[
				'status' 			=> 'Pending',
			],
			[
				'status' 			=> 'Cancelled',
			],
			[
				'status' 			=> 'Available',
			],
			[
				'status' 			=> 'Not Available',
			],
			[
				'status' 			=> 'Defective',
			],
			[
				'status' 			=> 'Unreturned',
			],
            
        ];
        
        
        Status::insert($statuses);
    }
}
