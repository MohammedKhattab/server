<?php

namespace App\DataTables;

use App\Job;
use Microboard\Traits\DataTable as MicroboardDataTable;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class JobDataTable extends DataTable
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
            ->editColumn('has_a_car', function (Job $job) {
                $label = 'نعم';
                $colors = 'badge-dark text-white';

                if (!$job->has_a_car) {
                    $label = 'لا';
                    $colors = 'badge-primary';
                }

                return "<span class='badge {$colors}'>{$label}</span>";
            })
            ->editColumn('created_at', function (Job $job) {
                return "<time datetime='{$job->created_at}'>{$job->created_at->format('d/m/Y h:m')}</time>";
            })
            ->rawColumns(['action', 'created_at', 'has_a_car']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Job $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Job $model)
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
            Column::make('id')->title(trans('jobs.fields.id')),
            Column::make('name')->title(trans('jobs.fields.name')),
            Column::make('phone')->title(trans('jobs.fields.phone')),
            Column::make('city')->title(trans('jobs.fields.city')),
            Column::make('has_a_car')->title(trans('jobs.fields.has_a_car'))->addClass('text-center'),
            Column::make('created_at')->title(trans('jobs.fields.created_at')),
            Column::computed('action', '')
                ->exportable(false)
                ->printable(false)
                ->width('1%')
                ->addClass('text-right')
        ];
    }
}
