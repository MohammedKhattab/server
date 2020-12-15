<?php

namespace App\DataTables;

use App\Contact;
use Illuminate\Database\Eloquent\Builder;
use Microboard\Traits\DataTable as MicroboardDataTable;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactDataTable extends DataTable
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
            ->editColumn('created_at', function (Contact $contact) {
                return "<time datetime='{$contact->created_at}'>{$contact->created_at->format('d/m/Y h:m')}</time>";
            })
            ->rawColumns(['action', 'created_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Contact $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Contact $model)
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
            Column::make('name')->title(trans('contacts.fields.name')),
            Column::make('email')->title(trans('contacts.fields.email')),
            Column::make('phone')->title(trans('contacts.fields.phone')),
            Column::make('subject')->title(trans('contacts.fields.subject')),
            Column::make('created_at')->title(trans('contacts.fields.created_at')),
            Column::computed('action', '')
                ->exportable(false)
                ->printable(false)
                ->width('1%')
                ->addClass('text-right')
        ];
    }
}
