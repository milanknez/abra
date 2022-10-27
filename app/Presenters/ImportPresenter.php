<?php

declare(strict_types=1);

namespace App\Presenters;

use GuzzleHttp\Client;
use Nette;

final class ImportPresenter extends Nette\Application\UI\Presenter
{
    private $database;
    private $client;
    
    public function __construct(
        Nette\Database\Explorer $database,
        Client                  $client
    )
    {
        $this->database = $database;
        $this->client = $client;
    }

    public function renderDefault(): void
    {
        $response = $this->client->request('GET', 'https://nejlepsi.flexibee.eu/c/d450/faktura-prijata.json?detail=custom:id,kod,datVyst,datSplat,sumCelkem',
            [
                'auth' => ['d450', 'd450d450']
            ]
        );
        $json = json_decode((string)$response->getBody());
        $feed = $json->winstrom->{'faktura-prijata'};
        $this->saveData($feed);
    }

    public function saveData($data): void
    {
        if (!empty($data)) {
            foreach ($data as $item) {
                $item = (array) $item;
                $this->isInvoiceId($item['id']);
                if (!$this->isInvoiceId($item['id'])) {
                    $this->database->query('INSERT INTO invoice ?', $item);
                }
            }
            $this->sendJson("Data byla importována");
        }
    }

    public function isInvoiceId($id): bool
    {
        $sql = $this->database->query("SELECT id FROM invoice WHERE id=" . $id);
        return $sql->getRowCount() > 0 ? true : false;
    }

}
