<?php

namespace NickMoline\NameParser\Mapper;

use NickMoline\NameParser\Part\Salutation;
use NickMoline\NameParser\Part\Firstname;
use NickMoline\NameParser\Part\Middlename;
use NickMoline\NameParser\Part\Lastname;

class MiddlenameMapperTest extends AbstractMapperTest
{
    /**
     * @return array
     */
    public function provider()
    {
        return [
            [
                'input' => [
                    new Firstname('Peter'),
                    'Fry',
                    new Lastname('Pan'),
                ],
                'expectation' => [
                    new Firstname('Peter'),
                    new Middlename('Fry'),
                    new Lastname('Pan'),
                ],
            ],
            [
                'input' => [
                    new Firstname('John'),
                    'Albert',
                    'Tiberius',
                    new Lastname('Brown'),
                ],
                'expectation' => [
                    new Firstname('John'),
                    new Middlename('Albert'),
                    new Middlename('Tiberius'),
                    new Lastname('Brown'),
                ],
            ],
            [
                'input' => [
                    'Mr',
                    new Firstname('James'),
                    'Tiberius',
                    'Kirk',
                ],
                'expectation' => [
                    'Mr',
                    new Firstname('James'),
                    new Middlename('Tiberius'),
                    'Kirk',
                ],
            ],
            [
                'input' => [
                    'James',
                    'Tiberius',
                    'Kirk',
                ],
                'expectation' => [
                    'James',
                    'Tiberius',
                    'Kirk',
                ],
            ],
            [
                'input' => [
                    'Albert',
                    'Einstein',
                ],
                'expectation' => [
                    'Albert',
                    'Einstein',
                ],
            ],
            [
                'input' => [
                    new Firstname('James'),
                    'Tiberius',
                ],
                'expectation' => [
                    new Firstname('James'),
                    new Middlename('Tiberius'),
                ],
                'arguments' => [
                    true
                ],
            ],
        ];
    }

    protected function getMapper($mapWithoutLastname = false)
    {
        return new MiddlenameMapper($mapWithoutLastname);
    }
}
