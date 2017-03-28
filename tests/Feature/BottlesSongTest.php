<?php

namespace Tests\Feature;

use App\BottlesSong;
use Tests\TestCase;

class BottlesSongTest extends TestCase
{
    public function testThe99BottlesSongLyricsGetCreatedProperly()
    {
        $songLyrics = file_get_contents(base_path('tests/data') . '/99bottlesOnTheWallLyrics.txt');

        $this->assertSame($songLyrics, (string) new BottlesSong());
    }

    public function testTheNumberOfVersesCanBeOverridden()
    {
        $songLyrics = file_get_contents(base_path('tests/data') . '/50bottlesOnTheWallLyrics.txt');

        $this->assertSame($songLyrics, (string) new BottlesSong(50));

        $songLyrics = <<<STRING
1 bottle of beer on the wall, 1 bottle of beer.
Take one down and pass it around, no more bottles of beer on the wall.

No more bottles of beer on the wall, no more bottles of beer.
Go to the store and buy some more, 1 bottles of beer on the wall.
STRING;
        $this->assertSame($songLyrics, (string) new BottlesSong(1));
    }

    public function testTheNumberOfVersesCannotBeLessThan1()
    {
        $this->expectException('InvalidArgumentException');

        $song = new BottlesSong(0);
    }
}
