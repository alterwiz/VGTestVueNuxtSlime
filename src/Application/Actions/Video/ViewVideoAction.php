<?php
declare(strict_types=1);

namespace App\Application\Actions\Video;

use Psr\Http\Message\ResponseInterface as Response;

class ViewVideoAction extends VideoAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $id = (int) $this->resolveArg('id');
        $item = $this->videoRepository->findById($id);
        $this->logger->info("Video of id `${id}` was viewed.");

        // return $this->respondWithData(json_decode($item, true));
        return $this->respondWithData($item);
    }
}
