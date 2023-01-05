<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductOption;
use App\Models\User;
use Illuminate\Database\Seeder;

class DumbDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin = [
            'name'=>"Admin",
            'name_ar'=>"المدير",
            'email' => 'admin@igorestaurants.com',
            'password' => bcrypt('Asd@12345'),
            'phone' => '0548404996',
        ];
        $user = User::create($admin);
        $user->type=0;
        $user->save();

        $user1 = [
            'name'=>'Albaik',
            'name_ar'=>'البيك',
            'email'=>'a1@gmail.com',
            'password'=>bcrypt('asd12345'),
            'phone'=>'0505050505',
            'commercial_register'=>'1234567899',
            'num_of_branches'=>'50',
        ];
        $user2 = [
            'name'=>'Altazij',
            'name_ar'=>'الطازج',
            'email'=>'a2@gmail.com',
            'password'=>bcrypt('asd12345'),
            'phone'=>'0505050500',
            'commercial_register'=>'1234567898',
            'num_of_branches'=>'50',
        ];

        $menu1 = [
            'name'=>'قائمة طعام فروع جدة',
            'user_id'=>'2',
        ];

        $menu2 = [
            'name'=>'قائمة طعام فروع جدة',
            'user_id'=>'3',
        ];

        $branch1 = [
            'username'=>'branch1@albaik',
            'name'=>'Almarwah branch',
            'name_ar'=>'فرع المروة',
            'password'=>bcrypt('asd12345'),
            'phone'=>'0545454654',
            'location'=>'http://google1.com',
            'street'=>'Heraa street',
            'street_ar'=>'شارع حراء',
            'city'=>'جدة - Jeddah',
            'district'=>'حي المروة - Al Marwah Dist.',
            'user_id'=>'2',
            'menu_id'=>'1',
        ];

        $branch2 = [
            'username'=>'branch1@altazij',
            'name'=>'Almarwah branch',
            'name_ar'=>'فرع المروة',
            'password'=>bcrypt('asd12345'),
            'phone'=>'0545454654',
            'location'=>'http://google2.com',
            'street'=>'Heraa street',
            'street_ar'=>'شارع حراء',
            'city'=>'جدة - Jeddah',
            'district'=>'حي المروة - Al Marwah Dist.',
            'user_id'=>'3',
            'menu_id'=>'1',
        ];

        $product1 = [
            'name'=>'Broasted 4 Pcs',
            'name_ar'=>'بروست 4 قطع',
            'price'=>'14.5',
            'calories'=>'455',
            'user_id'=>'2'
        ];

        $product2 = [
            'name'=>'Broasted 4 Pcs',
            'name_ar'=>'بروست 4 قطع',
            'price'=>'14.5',
            'calories'=>'455',
            'user_id'=>'3'
        ];

        $productCat1 = [
            'name'=>'Chicken',
            'name_ar'=>'دجاج',
            'index'=>'1',
            'user_id'=>'2',
        ];

        $productCat2 = [
            'name'=>'Chicken',
            'name_ar'=>'دجاج',
            'index'=>'1',
            'user_id'=>'3',
        ];

        $option1 = [
            'option'=>'Add cheese',
            'option_ar'=>'إضافة جبنة',
            'user_id'=>'2',
            'price'=>'2',
        ];
        $option2 = [
            'option'=>'Add cheese',
            'option_ar'=>'إضافة جبنة',
            'user_id'=>'3',
            'price'=>'2',
        ];

        $user = User::create($user1);
        $menu = Menu::create($menu1);
        $branch = Branch::create($branch1);
        $product = Product::create($product1);
        $product->menus()->attach($menu->id);
        $category = ProductCategory::create($productCat1);
        $product->categories()->attach($category->id);
        $option = ProductOption::create($option1);

        $user = User::create($user2);
        $menu = Menu::create($menu2);
        $branch = Branch::create($branch2);
        $product = Product::create($product2);
        $product->menus()->attach($menu->id);
        $category = ProductCategory::create($productCat2);
        $product->categories()->attach($category->id);
        $option = ProductOption::create($option2);



    }
}
