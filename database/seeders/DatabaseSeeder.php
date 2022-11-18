<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SmsTemplate;
use App\Models\CompanyDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
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
        User::create([
            'username' => 'Chester',
            'password' => Hash::make('premiotest'),
            'userrole' => 'Super Admin'
        ]);

        User::create([
            'username' => 'Dondon',
            'password' => Hash::make('desmarkpremio'),
            'userrole' => 'Admin'
        ]);

        SmsTemplate::create([
            'beforename' => "Hello good day ",
            'inbetweennamebalance' => ". I would like to remind you to pay you monthly payment of ",
            'inbetweenbalanceunitname' => " pesos for the unit ",
            'afterunitname' => ". thank you very much."
        ]);

        CompanyDetail::create([
            'introduction' => 'Motorcycle and Appliance Store',
            'vision' => 'Desmark will become a household name for every Filipino family. Filipino families always have a “suki” sari sari store or a “suki” market vendor, in this same way, Desmark will become every Filipino family\'s “suki” motorcycle and appliance store.',
            'corevalues' => "Proceed always with ambition and youthfulness. Respect sound theory, develop fresh ideas, and make the most effective use of time. Enjoy your work and encourage open communications. Strive constantly for a harmonious flow of work. Be ever mindful of the value of research and endeavor.",
            'history' => "Starting from a small store in Butuan City in March 1, 1988, Desmark has grown to become one of the leading players in the motorcycle and home appliance retail industry in the Philippines. Desmark is a retail establishment that makes quality products affordable to Filipinos from all walks of life through its in-house installment plans. Over the years and together with its affiliate Premio Corporation, Desmark has expanded its operations to over 200 branches nationwide. Desmark is mainly found in Northern and Southern Mindanao but has also expanded to North Luzon, Central Luzon, South Luzon, NCR, Cebu. Panay and Negros. These range from major cities such as Davao City, Cagayan de Oro City, Butuan City, Surigao City, General Santos City, Iligan City, Dumaguete City, Siquijor, Tuburan Cebu, Liloan Cebu, Laguna, Metro Manila, Pampanga, Tarlac, Batangas and to more rural areas such as Kalilangan, Bayugan and Mangagoy. Desmark Corporation is one of the key dealers for Honda motorcycles and numerous home appliance companies such as Sony, Samsung, LG, Sharp, Panasonic, Fujidenzo, Dewfoam, TCL, Koppel, Wow Magic Sing and Daikin.
            \n
            With the combination of aggressive promotional activities, great customer service and a loyal customer base, the company has garnered several awards for growth and achievement from major companies such as Sharp Philippines, Sony Philippines, Samsung Philippines, Honda Philippines and Matsushita Electronics (Panasonic). In fact Desmark has been consistently part of the Top 5 Honda Dealers in the country for the past 6 years. Not only that, Desmark continues to thrive in the appliance industry with 10th place nationwide for Samsung Philippines and 8th place nationwide for Sony Philippines.
            \n
            In order to further improve operations, the company established sister companies in Premio Corporation and Dupoint Management Corporation. Premio Corporation caters to the multibrand motorcycle market including Kawasaki, Yamaha and Suzuki. Dupoint Management Corporation is the real estate arm and primarily engages in the development and leasing of commercial properties. When it comes to Yamaha Motorcycles, Premio Corporation also ranks as the 3rd top dealer for Yamaha Philippines.
            \n
            Desmark is confident in the future as it continues to improve on its operations by expanding to other areas with a wider range of products and improved service from a growing number of employees while improving the lives of many Filipinos.",
            'mission' => "Desmark\'s mission is to become a top of mind, nationwide retail establishment that makes high quality motorcycles and home appliances more affordable to Filipinos from all walks of life through aggressive yet easy in-house installment plans and low spot cash prices. While still maintaining the thrust to only sell high quality products and providing only high quality services." 
        ]);

        Brand::create([
            'brandname' => 'Kawasaki',
            'sixMonthRate' => '1.1',
            'twelveMonthRate' => '1.2',
            'eigthteenMonthRate' => '1.3',
            'twentyfourMonthRate' => '1.4',
            'thirtyMonthRate' => '1.5',
            'thirtysixMonthRate' => '1.6'

        ]);

        Brand::create([
            'brandname' => 'Honda',
            'sixMonthRate' => '1.1',
            'twelveMonthRate' => '1.3',
            'eigthteenMonthRate' => '1.5',
            'twentyfourMonthRate' => '1.7',
            'thirtyMonthRate' => '1.9',
            'thirtysixMonthRate' => '2.1'

        ]);

        // \App\Models\User::factory(10)->create();
    }
}
