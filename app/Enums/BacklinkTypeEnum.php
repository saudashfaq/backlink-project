<?php

namespace  App\Enums;

class BacklinkTypeEnum
{
    const POST300 = 'post_300';
    const POST700 = 'post_700';
    const POST1000 = 'post_1000';
    const BACKLINK = 'backlink';



    public  static function getList(): array
    {
        return [
            self::POST300 => ['name' => "Approx 300 words Post", 'value' => self::POST300],
            self::POST700 => ['name' => "Approx 700 words Post", 'value' => self::POST700],
            self::POST1000 => ['name' => "Approx 1000 words Post", 'value' => self::POST1000],
            self::BACKLINK => ['name' => "Backlink only", 'value' => self::BACKLINK],

        ];
    }
}
