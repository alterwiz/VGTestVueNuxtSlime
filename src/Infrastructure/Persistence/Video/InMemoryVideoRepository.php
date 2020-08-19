<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Video;

use App\Domain\Video\Video;
use App\Domain\Video\VideoNotFoundException;
use App\Domain\Video\VideoRepository;

class InMemoryVideoRepository implements VideoRepository
{
    /**
     * @var Video[]
     */
    private $items;

    /**
     * InMemoryVideoRepository constructor.
     *
     * @param array|null $videos
     */
    public function __construct(array $videos = null)
    {

        $data = <<<EOF
[
    {
      "id": 1,
      "title": "What It’s Like To Work At AlgaeCal",
      "description": "Discover what it’s like to work at AlgaeCal with this quick video!",
      "video_id": "m3ralniniq"
    },
    {
      "id": 2,
      "title": "Esther Mangini Testimonial",
      "category": "Testimonials",
      "description": "Esther’s journey to healthier bones",
      "video_id": "ybyot0dm7q"
    },
    {
      "id": 3,
      "title": "Teresa Cucurull Testimonial",
      "description": "Teresa’s journey to healthier bones",
      "video_id": "mhmv73k989"
    },
    {
      "id": 4,
      "title": "Perfect Pilates For Osteoporosis - Legwork",
      "description": "Bone Healthy Exercises!",
      "video_id": "3n5p02h26w"
    },
    {
      "id": 5,
      "title": "Perfect Pilates For Osteoporosis - Amazing Abs",
      "description": "Bone Healthy Exercises!",
      "video_id": "kkgeu7v2va"
    },
    {
      "id": 6,
      "title": "Lara's Homemade Granola",
      "description": "Bone Healthy Recipes",
      "video_id": "m6amjftj3w"
    },
    {
      "id": 7,
      "title": "Brazil Nut Pesto",
      "description": "Bone Healthy Recipes",
      "video_id": "ajoe5d0jk0"
    }
  ]
EOF;

    $defaultVideos = [];

    foreach (json_decode($data, true) as $key => $item) {

        $defaultVideos[] = new Video(
            $item['id'],
            $item['title'],
            $item['description'],
            $item['video_id'],
            $item['category'] ?? null,
        );

    }

        $this->items = $videos ?? $defaultVideos; 

        // [
        //     new Video(1, 
        //         'What It\'s Like To Work At AlgaeCal', 
        //         'Discover what it\'s like to work at AlgaeCal with this quick video!', 
        //         'm3ralniniq'),

        //     new Video(2,
        //         'Esther Mangini Testimonial',

        //         'Testimonials'
        //     ),
        //     // 2 => new User(2, 'steve.jobs', 'Steve', 'Jobs'),
        //     // 3 => new User(3, 'mark.zuckerberg', 'Mark', 'Zuckerberg'),
        //     // 4 => new User(4, 'evan.spiegel', 'Evan', 'Spiegel'),
        //     // 5 => new User(5, 'jack.dorsey', 'Jack', 'Dorsey'),
        // ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function findById(int $id): Video
    {
        if (!isset($this->items[$id])) {
            throw new VideoNotFoundException();
        }

        return $this->items[$id];
    }
}
