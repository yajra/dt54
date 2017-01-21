@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <table id="users-table" class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('#users-table').DataTable({
                serverSide: true,
                processing: true,
                ajax: '/users',
                columns: [
                    {data: 'name', title: 'Name'},
                    {data: 'email', title: 'Email'},
                    {data: 'created_at', title: 'Created At'},
                    {data: 'updated_at', title: 'Update At'},
                    {data: 'action', title: 'Action', searchable: false, orderable: false, defaultContent: 'test'},
                ]
            });
        });
    </script>
@endpush
