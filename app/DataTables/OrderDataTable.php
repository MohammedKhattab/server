<?php

namespace App\DataTables;

use App\Order;
use Illuminate\Database\Eloquent\Builder;
use Microboard\Traits\DataTable as MicroboardDataTable;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    use MicroboardDataTable;

    /**
     * Build DataTable class.
     *
     * @param $query
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return $this->build($query)
            ->filterColumn('user', function (Builder $query, $keyword) {
                return $query->whereHas('user', function (Builder $query) use ($keyword) {
                    return $query->where('name', 'LIKE', "%{$keyword}%")
                        ->orWhere('phone', 'LIKE', "%{$keyword}%");
                });
            })
            ->addColumn('title', function(Order $order) {
                return $order->title;
            })
            ->addColumn('total', function(Order $order) {
                return $order->readableTotal();
            })
            ->addColumn('user', function (Order $order) {
                $user = $order->user;

                return '<div class="media align-items-center">' .
                    '<a href="' . route('microboard.users.show', $user) . '" class="avatar avatar-sm rounded-circle mr-3">' .
                    '<img alt="' . $user->name . '" src="' . $user->avatar . '" width="36" height="36"></a>' .
                    '<div class="media-body">' .
                    '<span class="mb-0 d-block">' . $user->name . '</span>' .
                    '<a href="https://wa.me/' . $user->phone . '" target="_blank" class="mb-0" style="font-size: 13px;">' .
                    '<i class="fab text-green fa-whatsapp"></i> ' .
                    $user->phone .
                    '</a>' .
                    '</div></div>';
            })
            ->editColumn('is_for_client', function (Order $order) {
                $label = 'نعم، الطلب من البائع';
                $colors = 'badge-dark text-white';

                if (!$order->is_for_client) {
                    $label = 'لا، الطلب من عميل';
                    $colors = 'badge-primary';
                }

                return "<span class='badge {$colors}'>{$label}</span>";
            })
            ->editColumn('created_at', function (Order $order) {
                return "<time datetime='{$order->created_at}'>{$order->created_at->format('d/m/Y h:m')}</time>";
            })
            ->addColumn('status', 'admin.orders.status')
            ->rawColumns(['status', 'title', 'created_at', 'is_for_client', 'user', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->newQuery()->latest();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('created_at')->visible(false),
            Column::make('id')->visible(false),
            Column::make('title')->title(trans('orders.fields.title')),
            Column::make('user')->title(trans('orders.fields.user')),
            Column::make('is_for_client')->addClass('text-center')->title(trans('orders.fields.is_for_client')),
            Column::make('product_type')->title(trans('orders.fields.product_type')),
            Column::make('total')->title(trans('orders.fields.total')),
            Column::make('status')->title(trans('orders.fields.status.title')),
            Column::make('created_at')->title(trans('orders.fields.created_at')),
            Column::computed('action', '')
                ->exportable(false)
                ->printable(false)
                ->width('1%')
                ->addClass('text-right')
        ];
    }
}
