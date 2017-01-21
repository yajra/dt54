@extends('layouts.demo')

@section('side-menu')
    @include('eloquent.partials.menu')
@endsection

@section('title')
    <title>Eloquent DataTable with Has Many</title>
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
            <h2>Eloquent DataTable with Has Many</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    @include('eloquent.tables.user-posts')
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="html">
            <h2>HTML</h2>
            <pre><code class="html">{{ file_get_contents(base_path('resources/views/eloquent/tables/user-posts.blade.php')) }}</code></pre>
        </div>
        <div class="tab-pane fade" id="php">
            <h2>Routes</h2>
            <pre><code class="php">{{ file_get_contents(base_path('routes/eloquent/has-many.php')) }}</code></pre>

            <h2>Controller</h2>
            <pre><code class="php">{{ file_get_contents(app_path('Http/Controllers/Eloquent/HasManyController.php')) }}</code></pre>
        </div>
        <div class="tab-pane fade" id="js">
            <h2>JS</h2>
            <pre><code id="js-container" class="javascript"></code></pre>
        </div>
    </div>
@endsection

@push('scripts')
<script id="script">
    $(function () {
        $('#user-posts-table').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/eloquent/has-many-data',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'title', name: 'posts.title'},
            ]
        });
    });
</script>
@endpush
