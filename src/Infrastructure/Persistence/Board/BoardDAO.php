<?php


namespace App\Infrastructure\Persistence\Board;
use App\Domain\Board\Contents;
use App\Domain\Board\BoardRepository;

class BoardDAO implements BoardRepository
{
    /**
     * @var contents[]
     */
    private $contents;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $contents
     */
    public function __construct(array $contents = null)
    {
        $this->contents = $contents ?? [
                0 => new Contents(1, 'bill.gates', 'Bill', 'Gates','seq'),
                1 => new Contents(2, 'steve.jobs', 'Steve', 'Jobs','seq'),
                2 => new Contents(3, 'mark.zuckerberg', 'Mark', 'Zuckerberg','seq'),
                3 => new Contents(4, 'evan.spiegel', 'Evan', 'Spiegel','seq'),
                4 => new Contents(5, 'jack.dorsey', 'Jack', 'Dorsey','seq'),
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->contents);
    }

    /**
     * {@inheritdoc}
     */
    public function findUserOfId(int $id): Contents
    {
        if (!isset($this->contents[$id])) {
            #throw new Exception();
        }

        return $this->contents[$id];
    }
}