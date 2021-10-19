<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Productseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('products')->insert([
           [
            'name'=>'Apple i-pad',
            'price'=>'2000',
            'description'=>'A branded i-pad 8GB RAM AND 20000 mAh battery',
            'category'=>'laptop',
            'gallery'=>'https://cdn.pixabay.com/photo/2014/05/02/21/49/home-office-336374_960_720.jpg'
           ],
           [
             'name'=>'OPPO Mobile',
            'price'=>'150',
            'description'=>'A smartphone with 3GB RAM AND 4500 mAh battery',
            'category'=>'mobile',
            'gallery'=>'https://waltonbd.com/image/catalog/category-banner/mobile/smart-phone-half-block.jpg'
           ],
           [
             'name'=>'Samsung Mobile',
            'price'=>'500',
            'description'=>'A smartphone with 12GB RAM AND 6000 mAh battery',
            'category'=>'mobile',
            'gallery'=>'https://www.itel-mobile.com/fileadmin/assets/img/product/S16_Pro/detail_page_banner-EN/S16-Pro-______phone.jpg'
           ],
           [
             'name'=>'I-phone',
            'price'=>'950',
            'description'=>'A smartphone with 8GB RAM,128 GB ROM, 48mp camera AND 5000 mAh battery',
            'category'=>'mobile',
            'gallery'=>'https://m.media-amazon.com/images/I/71fJ-gmBZtL._SL1500_.jpg'
           ],
           [
            'name'=>'Samsung -refrigerator',
            'price'=>'450',
            'description'=>'A refrigerator 12lt capacity and double door',
            'category'=>'refrigerator',
            'gallery'=>'https://www.businessinsider.in/thumb/msid-83870476,width-640,resizemode-4/Master.jpg'
           ],
           [
            'name'=>'Samsung led tv',
            'price'=>'350',
            'description'=>'A led tv OF 42INCHES display wide mode',
            'category'=>'tv',
            'gallery'=>'https://images.samsung.com/is/image/samsung/p6pim/in/ua32t4410akxxl/gallery/in-hd-t4300-ua32t4410akxxl-thumb-432183241?$480_480_PNG$'
           ]
           
        ]);
    }
}
