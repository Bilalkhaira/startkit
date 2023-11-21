<?php

namespace App\DataTables;

use App\Models\Car;
use App\Models\Blog;
use App\Models\User;
use App\Models\SellerRequest;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SellerRequestDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        if (auth()->user()->getRoleNames()[0] != 'super admin') {
            $query = SellerRequest::query();
            $query->where('created_by', auth()->user()->id);
        }

        return (new EloquentDataTable($query))
            ->editColumn('user', function (SellerRequest $user) {
                return view('pages.sellerRequest.columns._sellerRequest', compact('user'));
            })
            ->addColumn('action', function (SellerRequest $user) {
                return view('pages.sellerRequest.columns._actions', compact('user'));
            })
            ->addColumn('view_car', function (SellerRequest $user) {
                return view('pages.sellerRequest.columns.view_car', compact('user'));
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(SellerRequest $model): QueryBuilder
    {
        return $model->newQuery()->with('car');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('seller_requests-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt' . "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'p>>",)
            ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
            ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
            ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages//cars/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID'),
            Column::make('name')->title('Name'),
            Column::make('phone')->title('Contact No'),
            Column::make('email')->title('Email'),
            Column::computed('view_car')->title('Car Detail'),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
