<?php

declare(strict_types=1);

namespace App\Presenters;

use http\Client\Response;
use http\Env\Request;
use Nette;

final class ApiPresenter extends Nette\Application\UI\Presenter
{
    private $database;

    public function __construct(
        Nette\Database\Explorer $database
    )
    {
        $this->database = $database;
    }

    public function renderDefault(): JsonResponse
    {
        $result = $this->database->query('SELECT * FROM invoice');
        $this->sendJson($result->fetchAll());
    }

    public function renderId(int $id): JsonResponse
    {
        $result = $this->database->query('SELECT * FROM invoice WHERE id='.$id);
        $this->sendJson($result->fetch());
    }

}
