<?php


class Users extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "name: ". parent::current();
    }

    function endChildren()
    {
        echo "password: ";
    }
}