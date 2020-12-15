<?php

namespace App\DataTables;

use App\News;
use Microboard\Traits\DataTable as MicroboardDataTable;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
{
    use MicroboardDataTable;

    /**
     * Build DataTable class.
     *
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return $this->build($query)
            ->editColumn('body', '{{ Illuminate\Support\Str::limit($body, 70) }}');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\News $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(News $model)
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
            Column::make('title')->title(trans('news.fields.title')),
            Column::make('author')->title(trans('news.fields.author')),
            Column::make('body')->title(trans('news.fields.body')),
            Column::computed('action', '')
                ->exportable(false)
                ->printable(false)
                ->width('1%')
                ->addClass('text-right')
        ];
    }
}
