<?php

namespace App\Models;


class Post
{

    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "radenyaqine",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos facilis magni harum recusandae quo hic, quia at nisi! Molestiae minus iure accusamus dignissimos repellat in saepe quidem explicabo quam laudantium?"
        ],
        [
            "title" => "Judul Post kedua",
            "slug" => "judul-post-kedua",
            "author" => "radenyaqine",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus exercitationem quisquam officiis, fugit nemo ea aperiam dolore ratione eveniet quis facere aliquam delectus voluptatem maiores iusto, optio quae, odit porro? Dolor maiores repellat dicta temporibus deserunt est nobis omnis laudantium id voluptatem numquam sed vero, iste cumque suscipit ipsam. Et, aliquam! Nemo reiciendis, ad quos consectetur expedita explicabo incidunt molestiae tenetur asperiores placeat quibusdam minima fuga non repudiandae debitis quisquam aspernatur quas, distinctio nisi a numquam inventore? Error, quos. Quas fugit suscipit non, hic, soluta esse voluptatibus molestias tenetur tempore, voluptatem iure animi? Quod iusto voluptatibus quia. Aliquam, magnam! Voluptatibus?"
        ],
        [
            "title" => "Judul Post Ketiga",
            "slug" => "judul-post-ketiga",
            "author" => "radenyaqine",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorum, consectetur animi rem, atque eum quos accusamus error delectus ullam pariatur, quidem aliquid minima veniam nesciunt excepturi saepe eveniet tenetur! Consectetur alias repellendus perspiciatis! Quisquam, quas quae? Odio dicta atque, ea itaque ab debitis animi adipisci nisi ullam quidem deserunt voluptatem amet veniam natus unde repellendus. Possimus necessitatibus molestias ipsa eveniet commodi nam dolorum ducimus consequatur, totam, nobis ullam tempore tenetur incidunt sit rerum, veritatis id eos pariatur. Facilis, inventore."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {

        $posts = static::all();


        return $posts->firstWhere("slug", $slug);
    }
}
