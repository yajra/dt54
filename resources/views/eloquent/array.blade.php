@extends('layouts.demo')

@section('side-menu')
    @include('eloquent.partials.menu')
@endsection

@section('title')
    <title>Eloquent DataTable with Array Response</title>
@endsection

@section('content')
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#demo" role="tab" data-toggle="tab">Demo</a></li>
        <li><a href="#html" role="tab" data-toggle="tab">HTML</a></li>
        <li><a href="#php" role="tab" data-toggle="tab">PHP</a></li>
        <li><a href="#js" role="tab" data-toggle="tab">JS</a></li>
    </ul>
    <!-- TAB CONTENT -->
    <div class="tab-content">
        <div class="active tab-pane fade in" id="demo">
            <h2>Eloquent DataTable with Array Response</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('eloquent.tables.users')
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="html">
            <h2>HTML</h2>
            <pre><code>{{ file_get_contents(base_path('resources/views/eloquent/tables/users.blade.php')) }}</code></pre>
        </div>
        <div class="tab-pane fade" id="php">
            <h2>Controller</h2>
            <pre><code>{{ file_get_contents(app_path('Http/Controllers/Eloquent/ArrayResponseController.php')) }}</code></pre>

            <h2>Routes</h2>
            <pre><code>{{ file_get_contents(base_path('routes/eloquent/array.php')) }}</code></pre>
        </div>
        <div class="tab-pane fade" id="js">
            <h2>JS</h2>
            <pre><code id="js-container"></code></pre>
        </div>
    </div>
@endsection

@push('scripts')
<script id="script">
    $(function () {
        $('#users-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/eloquent/array-data'
        });
    });
</script>
@endpush
