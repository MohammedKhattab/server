<?php

namespace App\DataTables;

use App\Page;
use Illuminate\Database\Eloquent\Builder;
use Microboard\Traits\DataTable as MicroboardDataTable;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PageDataTable extends DataTable
{
    use MicroboardDataTable;

    /**
     * Build DataTable class.
     *
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return $this->build($query);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Page $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Page $model)
    {
        return $model->newQuery();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('title')->title(trans('pages.fields.title')),
            Column::make('slug')->title(trans('pages.fields.slug')),
            Column::computed('action', '')
                ->exportable(false)
                ->printable(false)
                ->width('1%')
                ->addClass('text-right')
        ];
    }
}
