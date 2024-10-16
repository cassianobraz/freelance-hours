<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Project;
use App\Models\Proposal;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(200)->create();
        User::query()->inRandomOrder()->limit(10)->get()->each(
            function (User $u) {
                $Project = Project::factory()->create(['created_by' => $u->id]);

                Proposal::factory()->count(random_int(4, 45))->create(['project_id' => $Project->id]);
            }
        );
    }
}
