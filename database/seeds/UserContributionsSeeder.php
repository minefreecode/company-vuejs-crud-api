<?php

use Illuminate\Database\Seeder;
use App\Models\Contribution\UserContribution;
class UserContributionsSeeder extends Seeder
{
    public function run()
    {
        factory(UserContribution::class, 10)->create();
    }
}
