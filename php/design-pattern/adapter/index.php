<?php

require './vendor/autoload.php';

use Acme\Book;
use Acme\BookInterface;
use Acme\Kindle;
use Acme\Nook;
use Acme\ReaderAdapter;

class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

$person = new Person;

echo 'Book read():' . PHP_EOL;
$book = new Book;
$person->read($book);

echo 'Kindle read():' . PHP_EOL;
$kindle = new Kindle;
$kindleReaderAdapter = new ReaderAdapter($kindle);
$person->read($kindleReaderAdapter);

echo 'Nook read():' . PHP_EOL;
$nook = new Nook;
$nookReaderAdapter = new ReaderAdapter($nook);
$person->read($nookReaderAdapter);

// Book read():
//  - open the Book
//  - turn the page
// Kindle read():
//  - turn on the Kindle
//  - press next on the Kindle
// Nook read():
//  - turn on the Nook
//  - press next on the Nook
