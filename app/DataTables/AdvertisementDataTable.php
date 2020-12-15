<?php

namespace App\DataTables;

use App\Advertisement;
use Illuminate\Database\Eloquent\Builder;
use Microboard\Traits\DataTable as MicroboardDataTable;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AdvertisementDataTable extends DataTable
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
            ->editColumn('started_at', function(Advertisement $advertisement) {
                return "<time datetime=\"{$advertisement->started_at}\">{$advertisement->started_at->format('Y/m/d')}</time>";
            })
            ->editColumn('expired_at', function(Advertisement $advertisement) {
                return "<time datetime=\"{$advertisement->expired_at}\">{$advertisement->expired_at->format('Y/m/d')}</time>";
            })
            ->rawColumns(['started_at', 'expired_at', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Advertisement $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Advertisement $model)
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
            Column::make('url')->title(trans('advertisements.fields.url')),
            Column::make('started_at')->title(trans('advertisements.fields.started_at')),
            Column::make('expired_at')->title(trans('advertisements.fields.expired_at')),
            Column::computed('action', '')
                ->exportable(false)
                ->printable(false)
                ->width('1%')
                ->addClass('text-right')
        ];
    }
}
