<?php

use Illuminate\Database\Seeder;
use App\Models\Contribution\PeopleContribution;
class UserContributionsSeeder extends Seeder
{
    public function run()
    {
        factory(PeopleContribution::class, 10)->create();
    }
}
