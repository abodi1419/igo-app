<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data =
            [
                ['name'=>'Arabic', 'name_ar'=>'عربي'],
                ['name'=>'Fast food', 'name_ar'=>'وجبات سريعة'],
                ['name'=>'Sandwiches', 'name_ar'=> 'ساندوتشات'],
                ['name'=>'American', 'name_ar'=>'امريكي'],
                ['name'=>'Coffee', 'name_ar'=>'قهوة'],
                ['name'=>'Desserts', 'name_ar'=> 'حلويات'],
                ['name'=>'Shawarma and doner', 'name_ar'=>'شاورما'],
                ['name'=>'International', 'name_ar'=> 'عالمي'],
                ['name'=>'Beverages', 'name_ar'=> 'مشروبات'],
                ['name'=>'Juices', 'name_ar'=> 'عصائر'],
                ['name'=>'Bakery', 'name_ar'=>'مخبز'],
                ['name'=>'Italian', 'name_ar'=> 'ايطالي'],
                ['name'=>'Sea food', 'name_ar'=>'مأكولات بحريه'],
                ['name'=>'Grill', 'name_ar'=> 'شوايه'],
                ['name'=>'Indian', 'name_ar'=>'هندي'],
                ['name'=>'Asian', 'name_ar'=>'اسيوي'],
                ['name'=>'Burgers', 'name_ar'=> 'برجر'],
                ['name'=>'Healthy food', 'name_ar'=> 'مأكولات صحيه'],
                ['name'=>'Saudi', 'name_ar'=> 'سعودي'],
                ['name'=>'Mexican', 'name_ar'=> 'مكسيكي'],
                ['name'=>'Pasta', 'name_ar'=> 'معكرونه'],
                ['name'=>'Flowers', 'name_ar'=> 'زهور'],
                ['name'=>'Vegetarian', 'name_ar'=> 'نباتي'],
                ['name'=>'Sushi', 'name_ar'=> 'سوشي'],
                ['name'=>'Pakistani', 'name_ar'=> 'باكستاني'],
                ['name'=>'Japanese', 'name_ar'=> 'ياباني'],
                ['name'=>'Korean', 'name_ar'=> 'كوري'],
                ['name'=>'Hot dogs', 'name_ar'=> 'نقانق'],
                ['name'=>'Flafel', 'name_ar'=> 'فلافل'],
                ['name'=>'Lebanese', 'name_ar'=> 'لبناني'],
                ['name'=>'Breakfast', 'name_ar'=> 'افطار'],
                ['name'=>'Salads', 'name_ar'=> 'سلطات'],
                ['name'=>'Pastries', 'name_ar'=> 'معجنات'],
                ['name'=>'Indonesian', 'name_ar'=> 'اندنوسي'],
                ['name'=>'Roastery', 'name_ar' => 'محمصه'],
                ['name'=>'Noodles', 'name_ar'=> 'نودلز'],
                ['name'=>'Meat', 'name_ar'=> 'لحم'],
            ];

        RestaurantCategory::insert($data);
    }
}
