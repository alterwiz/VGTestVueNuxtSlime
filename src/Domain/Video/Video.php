<?php
declare(strict_types=1);

namespace App\Domain\Video;

use JsonSerializable;

class Video implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $videoId;

    /**
     * @var string
     */
    private $category;    

    /**
     * @param int|null  $id
     * @param string    $title
     * @param string    $description
     * @param string    $videoId
     * @param string    $category
     */
    public function __construct(?int $id, string $title, string $description, string $videoId, ?string $category = null)
    {
        $this->id = $id;
        $this->title = ucfirst($title);
        $this->description = ucfirst($description);
        $this->videoId = $videoId;
        $this->category = $category;
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getVideoId(): string
    {
        return $this->videoId;
    }



    /**
     * @return string | null
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'videoId' => $this->videoId,
            'category' => $this->category,
        ];
    }
}
