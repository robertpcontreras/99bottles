<?php

namespace App\Contracts;


interface Verses
{
    /**
     * Verses constructor. Sets the song this verse belongs
     * to and the verse number of that song.
     *
     * @param Songs $song
     * @param int $verseNo
     */
    public function __construct(Songs $song, int $verseNo);

    /**
     * Converts the verse object into a string.
     *
     * @return string
     */
    public function __toString() : string;

    /**
     * Returns the lyrics for the verse.
     *
     * @return string
     */
    public function getLyrics() : string;
}