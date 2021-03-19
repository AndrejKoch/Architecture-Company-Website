<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
        'title' => 'Website title',
        'mainurl' => 'Website url',
        'email' => 'Contact email',
        'link' => 'Link',
        'address' => 'Address',
        'logo' => 'Logo',
        'description' => 'Description',
        'phone' => 'Phone',
        'mobilephone' => 'Mobile Phone',
        'ctitle1' => 'First content title',
        'calttitle1' => 'First alternative content title',
        'ctitle2' => 'Second content title',
        'calttitle2' => 'Second alternative content title',
        'ctitle3' => 'Third content title',
        'calttitle3' => 'Third alternative content title',
        'ctitle4' => 'Fourth content title',
        'calttitle4' => 'Fourth alternative content title',
        'ctitle5' => 'Fifth content title',
        'calttitle5' => 'Fifth alternative content title',
        'ctitle6' => 'Sixth content title',
        'calttitle6' => 'Sixth alternative content title',
        'facebook' => 'Facebook link',
        'lat' => 'Google maps latitude',
        'lng' => 'Google maps longitude'
        ]);
    }
}
