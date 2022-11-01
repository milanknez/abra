<?php

declare(strict_types=1);

namespace App\Presenters;

use GuzzleHttp\Client;
use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
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
        $this->template->invoices = $this->database
            ->table('invoice')
            ->order('id DESC')->fetchAll();
        $query = $this->database->query('SELECT * FROM invoice')->fetchAll();

        require_once 'kendo/wrappers/php/lib/DataSourceResult.php';
        require_once 'kendo/wrappers/php/lib/Kendo/Autoload.php';

        $transport = new \Kendo\Data\DataSourceTransport();
        $read = new \Kendo\Data\DataSourceTransportRead();
        $read->url('/')
            ->contentType('application/json')
            ->type('POST');

        $transport->read($read)
            ->parameterMap('function(data) {
              return kendo.stringify(data);
          }');

        $model = new \Kendo\Data\DataSourceSchemaModel();

        $idField = new \Kendo\Data\DataSourceSchemaModelField('id');
        $idField->type('string');
        $kodField = new \Kendo\Data\DataSourceSchemaModelField('kod');
        $kodField->type('string');
        $datVystField = new \Kendo\Data\DataSourceSchemaModelField('datVyst');
        $datVystField->type('string');
        $datSplatField = new \Kendo\Data\DataSourceSchemaModelField('datSplat');
        $datSplatField->type('string');
        $sumCelkemField = new \Kendo\Data\DataSourceSchemaModelField('sumCelkem');
        $sumCelkemField->type('string');

        $model->addField($idField)
            ->addField($kodField)
            ->addField($datVystField)
            ->addField($datSplatField)
            ->addField($sumCelkemField);

        $schema = new \Kendo\Data\DataSourceSchema();
        $schema->data('data')
            ->errors('errors')
            ->groups('groups')
            ->model($model)
            ->total('total');

        $dataSource = new \Kendo\Data\DataSource();

        $dataSource->transport($transport)
            ->data($query)
            ->pageSize(10)
            ->serverPaging(true)
            ->serverSorting(true)
            ->serverGrouping(true)
            ->schema($schema);

        $grid = new \Kendo\UI\Grid('grid');

        $id = new \Kendo\UI\GridColumn();
        $id->field('idField')
            ->title('Contact Name')
            ->width(240);

        $kod = new \Kendo\UI\GridColumn();
        $kod->field('kodField')
            ->title('Contact Title');

        $datVyst = new \Kendo\UI\GridColumn();
        $datVyst->field('datVystField')
            ->title('Company Name');

        $datSplat = new \Kendo\UI\GridColumn();
        $datSplat->field('datSplatField')
            ->width(150);

        $sumCelkem = new \Kendo\UI\GridColumn();
        $sumCelkem->field('sumCelkemFeild')
            ->width(150);

        $pageable = new \Kendo\UI\GridPageable();
        $pageable->refresh(true)
            ->pageSizes(true)
            ->buttonCount(5);

        $grid->addColumn($id, $kod, $datVyst, $datSplat, $sumCelkem)
            ->dataSource($dataSource)
            ->sortable(true)
            ->groupable(true)
            ->pageable($pageable)
            ->attr('style', 'height:550px');

        $this->template->kendoGrid = $grid->render();

    }

}
