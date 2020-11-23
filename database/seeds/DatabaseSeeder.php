<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        \DB::table('users')->insert([
            'su_id' => 7835,
            'su_uid' => 07005,
            'password' => bcrypt('07005'),
            'su_join_date' => "2020-09-14 00:00:00",
            'su_name' => '鄭又誠',
            'su_email' => null,
            'su_mobile_code' => '',
            'su_sucid' => 425,
            'su_check' => null,
            'su_pass_date' => "1977-11-30 00:00:00",
            'su_state' => false,
            'su_allow_item' => null,
            'su_err_cnt' => 0,
            'su_is_store' => false,
            'su_area_code' => '',
            'su_job_status' => 1,
            'su_del' => false,
        ]);

        \DB::table('todos')->insert([
            'todo' => '完成TODO',
            'done' => false,
            'created_at' => date('Y/m/d H:i:s'),
            'updated_at' => date('Y/m/d H:i:s'),
        ]);
    }
}
