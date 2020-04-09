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

$book = new Book;
$person->read($book);

$kindle = new Kindle;
$kindleReaderAdapter = new ReaderAdapter($kindle);
$person->read($kindleReaderAdapter);

$nook = new Nook;
$nookReaderAdapter = new ReaderAdapter($nook);
$person->read($nookReaderAdapter);
