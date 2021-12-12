<?php declare(strict_types=1);
namespace AoC\Y2021\Dec12;

class Cave
{
    public bool $small;
    public bool $isEnd;
    public int $visited = 0;
    public array $connections = [];

    public function __construct(string $name)
    {
        $this->isEnd = 'end' === $name;
        $this->small = ctype_lower($name[0]);
    }
}
