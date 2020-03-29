<?php

use Illuminate\Database\Seeder;
use App\Http\Model\languageModel;
class create_language_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *php artisan db:seed --class=create_language_seeder
     * @return void
     */
    public function run()
    {
        $languages=[
            'Zulu',
            'English',
            'Xhosa',
            'Sisotho'
        ];

       foreach($languages as $language)
       {
        languageModel::create(['languages'=>$language]);
       }
        
    }
}
