<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class PerformanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('performance')->insert([
            'title' => '赤い花、白い花',
            'date1' => '2022-07-24 15:00:00',
            'date2' => '2022-07-24 19:00:00',
            'venue_id' => 1,
            'price' => 3500,
            'member' => '竹之下たまみ、蓮子奈津美、中島詩織、秋元麻友子、佐藤郁、仲野朱音',
            'comment' => 'あでやかとも妖しとも不気味とも据えかねる花のいろ',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            
        ]);
    }
}
