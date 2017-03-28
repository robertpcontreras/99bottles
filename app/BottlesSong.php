<?php

namespace App;

use App\Contracts\Songs;
use App\Contracts\Verses;

class BottlesSong implements Songs
{
    /**
     * The number of verses in the song
     *
     * @var int
     */
    protected $verses;

    /**
     * @var int
     */
    protected $currentVerse;

    /**
     * Song constructor.
     *
     * @param int $verses
     */
    public function __construct(int $verses = 99)
    {
        if ($verses < 1) {
            throw new \InvalidArgumentException('Verses must be greater than 0');
        }

        $this->verses = $verses;
    }

    /**
     * Prints out the song lyrics.
     *
     * Collects a range of numbers from 0 to the number of verses. This is then
     * reduced into a single string by getting the verse for each number in
     * the range and appending it to the carried song string variable.
     *
     * return string
     */
    public function __toString() : string
    {
        return trim(collect(range(0, $this->verses))->reduce(function ($song, $verse) {
            return $song.$this->getVerse($verse).PHP_EOL.PHP_EOL;
        }));
    }

    /**
     * Gets the Verse for the verse number specified.
     *
     * @param int $verseNo
     * @return Verses
     */
    public function getVerse(int $verseNo) : Verses
    {
        return new BottlesVerse($this, $verseNo);
    }

    /**
     * Returns the number of verses in the song
     *
     * @return int
     */
    public function numberOfVerses(): int
    {
        return $this->verses;
    }
}
