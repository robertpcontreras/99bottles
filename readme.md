# 99 Bottles on the Wall Laravel Implementation

This is demo provides a Laravel based solution to create the lyrics for the 99 bottles of beer on the wall song.

This is obviously an over exaggerated solution to this problem, a minimal solution to the same problem may be:
```php
$lyrics = "";
$start = 99;

for ($verses = $start; $verses > 1; $verses--) {
   $lyrics .= sprintf(
       "%d bottles of beer on the wall, %d bottles of beer.\nTake one down and pass it around, %d %s of beer on the wall.\n\n",
       $verses, $verses, $verses-1, $verses == 2 ? "bottle" : "bottles"
   );
}

$lyrics .= "1 bottle of beer on the wall, 1 bottle of beer.\nTake one down and pass it around, no more bottles of beer on the wall.\n\n";
$lyrics .= "No more bottles of beer on the wall, no more bottles of beer.\nGo to the store and buy some more, $start bottles of beer on the wall.";

echo $lyrics;
```

But this good exercise to demonstrate use of OO design and practices as well as the ability to write basic tests to test the solution.

## Installation steps




