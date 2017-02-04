<?php

require_once '../src/Sort.php';

use joshtronic\Sort;

class SortTest extends PHPUnit_Framework_TestCase
{
    public function testByNameASC()
    {
        $shuffled = array(
            array('name' => 'epsilon'),
            array('name' => 'gamma'),
            array('name' => 'alpha'),
            array('name' => 'delta'),
            array('name' => 'beta'),
        );

        $sorted = array(
            array('name' => 'alpha'),
            array('name' => 'beta'),
            array('name' => 'delta'),
            array('name' => 'epsilon'),
            array('name' => 'gamma'),
        );

        Sort::by('name', $shuffled);

        $this->assertEquals($sorted, $shuffled);
    }

    public function testByNameDESC()
    {
        $shuffled = array(
            array('name' => 'epsilon'),
            array('name' => 'gamma'),
            array('name' => 'alpha'),
            array('name' => 'delta'),
            array('name' => 'beta'),
        );

        $sorted = array(
            array('name' => 'gamma'),
            array('name' => 'epsilon'),
            array('name' => 'delta'),
            array('name' => 'beta'),
            array('name' => 'alpha'),
        );

        Sort::by('name', $shuffled, Sort::DESC);

        $this->assertEquals($sorted, $shuffled);
    }

    public function testMissingField()
    {
        $shuffled = array(array('foo' => 'bar', 'bar' => 'foo'));
        $sorted   = array(array('foo' => 'bar', 'bar' => 'foo'));

        Sort::by('name', $shuffled);

        $this->assertEquals($sorted, $shuffled);
    }
}

