<?php

use App\Models\Media;
use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Position;
use App\Models\Skill;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Chomrurn
 * Date: 6/11/2019
 * Time: 4:38 PM
 */

class ProductionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        //Page
        $page = Page::create([
            'title'     => 'Home',
            'content'   => '',
            'hero'      => ''
        ]);
        $page = Page::create([
            'title'     => 'Solutions',
            'content'   => '',
            'hero'      => ''
        ]);
        $page = Page::create([
            'title'     => 'Portfolios',
            'content'   => '',
            'hero'      => ''
        ]);
        $page = Page::create([
            'title'     => 'About Us',
            'content'   => '',
            'hero'      => ''
        ]);
        $page = Page::create([
            'title'     => 'Contact Us',
            'content'   => '',
            'hero'      => ''
        ]);

        $media = Media::create([
            'name'      => '44065017_241724283360036_7849954436053991424_n',
            'slug'      => '44065017-241724283360036-7849954436053991424-n',
            'guid'      => 'uploads/2019/06/44065017-241724283360036-7849954436053991424-n.jpg',
            'mime_type' => 'image/jpeg',
            'size'      => 49424
        ]);
        $media = Media::create([
            'name'      => '53894592_2272072969701621_9089111432196259840_o',
            'slug'      => '53894592-2272072969701621-9089111432196259840-o',
            'guid'      => 'uploads/2019/06/53894592-2272072969701621-9089111432196259840-o.jpg',
            'mime_type' => 'image/jpeg',
            'size'      => 224580
        ]);
        $media = Media::create([
            'name'      => 'dashboad',
            'slug'      => 'dashboad',
            'guid'      => 'uploads/2019/06/dashboad.png',
            'mime_type' => 'image/png',
            'size'      => 71011
        ]);

        $media = Media::create([
            'name'      => 'hello dude',
            'slug'      => 'hello-dude',
            'guid'      => 'uploads/2019/06/hello-dude.jpg',
            'mime_type' => 'image/jpeg',
            'size'      => 221963
        ]);

        //Skill
        $skill = Skill::create([
            'title'         => 'PHP - Laravel',
            'description'   => ''
        ]);
        $skill = Skill::create([
            'title'         => 'WordPress',
            'description'   => ''
        ]);
        $skill = Skill::create([
            'title'         => 'HTML - CSS - jQuery',
            'description'   => ''
        ]);
        $skill = Skill::create([
            'title'         => 'Bootstrap 4',
            'description'   => ''
        ]);
        $skill = Skill::create([
            'title'         => 'Digital Marketing',
            'description'   => ''
        ]);

        $portfolio = Portfolio::create([
            'title'     => 'Airport Mobile App',
            'content'   => 'AmaTop10 is your one-stop source for unbiased Top 10 product reviews, online shopping tips and advice and a full range of informational articles dedicated to our readers’ needs',
            'date'      => '2019-03-10',
            'client_id' => 1,
            'featured_image' => 1
        ]);
        $portfolio = Portfolio::create([
            'title'     => 'Web App',
            'content'   => 'AmaTop10 is your one-stop source for unbiased Top 10 product reviews, online shopping tips and advice and a full range of informational articles dedicated to our readers’ needs',
            'date'      => '2019-03-10',
            'client_id' => 1,
            'featured_image' => 2
        ]);

        $position = Position::create([
            'name'          => 'SEO',
            'description'   => ''
        ]);
        $position = Position::create([
            'name'          => 'Marketing',
            'description'   => ''
        ]);
        $position = Position::create([
            'name'          => 'Mobile Developer',
            'description'   => ''
        ]);
        $position = Position::create([
            'name'          => 'Accountant',
            'description'   => ''
        ]);

    }
}