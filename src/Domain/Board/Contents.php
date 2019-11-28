<?php


namespace App\Domain\Board;


use JsonSerializable;

class Contents implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $user_id;

    /**
     * @var string
     */
    private $user_seq;

    /**
     * @var string
     */
    private $user_name;

    /**
     * @var string
     */
    private $contents;

    /**
     * @param int|null $id
     * @param string   $user_name
     * @param string   $contents
     * @param string   $user_id
     * @param string   $user_seq
     */
    public function __construct(?int $id, string $user_name, string $contents, string $user_id, string $user_seq)
    {
        $this->id = $id;
        $this->user_name = ucfirst($user_name);
        $this->contents = ucfirst($contents);
        $this->user_id = strtolower($user_id);
        $this->user_seq = ucfirst($user_seq);
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getUserSeq(): string
    {
        return $this->user_seq;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->user_name;
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        return $this->contents;
    }


    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'userName' => $this->user_name,
            'userSeq' => $this->user_seq,
            'userId' => $this->user_id,
        ];
    }
}