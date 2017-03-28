<?php

namespace App;

use App\Contracts\Songs;
use App\Contracts\Verses;

class BottlesVerse implements Verses
{
    /**
     * @var Songs
     */
    private $song;

    /**
     * @var int
     */
    private $verseNo;

    /**
     * Verses constructor. Sets the song this verse belongs
     * to and the verse number of that song.
     *
     * @param Songs $song
     * @param int $verseNo
     */
    public function __construct(Songs $song, int $verseNo)
    {
        $this->song = $song;
        $this->verseNo = $verseNo;
    }

    /**
     * Converts the verse object into a string.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->getLyrics();
    }

    /**
     * Returns the Lyrics for the verse.
     *
     * @return string
     */
    public function getLyrics(): string
    {
        $bottlesRemaining = $this->getNumberOfBottles();

        if ($bottlesRemaining == 1 ) {
            return $this->lastBottleRemainingLyrics();
        }

        if ($bottlesRemaining == 0) {
            return $this->noBottlesRemainingLyrics();
        }

        return $this->getLine1($bottlesRemaining).PHP_EOL.$this->getLine2($bottlesRemaining);
    }

    /**
     * Gets the number of bottles remaining based on the total number
     * of verses on the song and the current verse number.
     *
     * @return int
     */
    private function getNumberOfBottles() : int
    {
        return $this->song->numberOfVerses() - $this->verseNo;
    }

    /**
     * Returns the lyrics when no bottles are left remaining on the wall
     *
     * @return string
     */
    private function noBottlesRemainingLyrics(): string
    {
        $line1 = "No more bottles of beer on the wall, no more bottles of beer.";
        $line2 = sprintf(
            "Go to the store and buy some more, %d bottles of beer on the wall.",
            $this->song->numberOfVerses()
        );

        return $line1 . PHP_EOL . $line2;
    }

    /**
     * Returns the lyrics when there is only one bottle remaining on the wall.
     *
     * @return string
     */
    private function lastBottleRemainingLyrics(): string
    {
        $line1 = "1 bottle of beer on the wall, 1 bottle of beer.";
        $line2 = "Take one down and pass it around, no more bottles of beer on the wall.";

        return $line1 . PHP_EOL . $line2;
    }

    /**
     * Return the lyrics for the the line of a verse from the 99 bottles on the wall song
     * @param int $bottles
     * @return string
     */
    private function getLine1(int $bottles) : string
    {
        return sprintf("%d bottles of beer on the wall, %d bottles of beer.", $bottles, $bottles);
    }

    /**
     * @param int $bottles
     * @return string
     */
    private function getLine2(int $bottles) : string
    {
        return $bottles > 2
            ? sprintf("Take one down and pass it around, %d bottles of beer on the wall.", $bottles-1)
            : "Take one down and pass it around, 1 bottle of beer on the wall.";
    }
}
