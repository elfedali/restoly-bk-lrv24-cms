<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'm@m.m',
        ]);

        \App\Models\Node::factory(10)->create();
        \App\Models\Term::factory(10)->create();

        $nodes = \App\Models\Node::all();
        $terms = \App\Models\Term::all();

        $nodes->each(function ($node) use ($terms) {
            $node->terms()->attach(
                $terms->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
