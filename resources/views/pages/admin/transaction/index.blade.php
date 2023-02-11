@extends('layouts.admin')

@section('title')
    Transaction
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Transaction</h2>
                <p class="dashboard-subtitle">List of Transactions</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>Transaction</th>
                                                <th>Nama</th>
                                                <th>Total</th>
                                                <th>Date</th>
                                                <th>Item</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script>
        const data = $.get('{{ route('test') }}', function(data, status) {


            $('#crudTable').DataTable({
                //     "paging": true,
                //     "lengthChange": true,
                //     "searching": true,
                //     "ordering": true,
                //     "info": true,
                //     "autoWidth": true,
                "data": data,
                "columns": [{
                        "data": "code"
                    },
                    {
                        "data": "nama_user"
                    },
                    {
                        "data": "total_price"
                    },
                    {
                        "data": "created_at",
                        render: function(data, type, row) {
                            const today = new Date(row.created_at);
                            const yyyy = today.getFullYear();
                            let mm = today.getMonth() + 1; // Months start at 0!
                            let dd = today.getDate();

                            if (dd < 10) dd = '0' + dd;
                            if (mm < 10) mm = '0' + mm;

                            const formattedToday = dd + '-' + mm + '-' + yyyy;

                            return formattedToday
                        }

                    },
                    {
                        "data": "transaction_detail.nama_produk",
                        render: function(data, type, row) {

                            const final = row.transaction_detail.map(d => d.nama_produk + "  X" + d
                                .quantity).join(
                                "<br>");
                            return final;
                        }
                    },
                ]
            });

        });

        // const data = $.get('{{ route('test') }}', function(data, status) {
        //     console.log(data);

        // });

        // var datatable = $('#crudTable').DataTable({

        //     "paging": true,
        //     "lengthChange": true,
        //     "searching": true,
        //     "ordering": true,
        //     "info": true,
        //     "autoWidth": true,

        //     columns: [{
        //             data: 'code',
        //             name: 'code'
        //         },


        //     ]
        // })

        // datatable.clear()
        // $.each([code: "test"], function(index, value) {
        //     datatable.row.add(value);
        // });
        // datatable.draw();
    </script>
@endpush
