<?php

namespace App\Contracts;


interface Songs
{
    /**
     * Songs constructor
     *
     * @param int $verses
     */
    public function __construct(int $verses);

    /**
     * Returns a string representation of the song.
     *
     * @return string
     */
    public function __toString() : string;

    /**
     * Returns the number of verses in the song
     *
     * @return int
     */
    public function numberOfVerses() : int;

    /**
     * Gets the verse based on the verse number for the song.
     *
     * @param int $verseNo
     * @return Verses
     */
    public function getVerse(int $verseNo) : Verses;
}