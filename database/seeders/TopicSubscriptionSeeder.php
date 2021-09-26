<?php

namespace Database\Seeders;

use App\Models\Topic;
use App\Models\TopicSubscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TopicSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topicIds = collect(range(1, Topic::count()));
        $userIds = collect(range(1, User::count()));

        $possibleSubscriptions = $userIds->crossJoin($topicIds);
        $now = Carbon::now();
        $subscriptions = $possibleSubscriptions
            ->random(50)
            ->map(fn($item) => [
                    'user_id' => $item[0],
                    'topic_id' => $item[1],
                    'updated_at' => $now,
                    'created_at' => $now,
                ])
            ->all();
        // dd($subscriptions);

        TopicSubscription::factory()->createMany($subscriptions);
    }
}
