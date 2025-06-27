<?php

namespace NickMoline\NameParser\Part;

class LastnamePrefix extends Lastname
{
    protected $normalized = '';

    public function __construct(string $value, ?string $normalized)
    {
        $this->normalized = $normalized ?? $value;

        parent::__construct($value);
    }

    /**
     * if this is a lastname prefix, look up normalized version from registry
     * otherwise camelcase the lastname
     *
     * @return string
     */
    public function normalize(): string
    {
        return $this->normalized;
    }
}
