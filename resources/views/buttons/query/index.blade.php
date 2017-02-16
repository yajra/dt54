@extends('layouts.demo')


@section('side-menu')
    @include('buttons.partials.menu')
@endsection

@section('title')
    <title>Query Builder DataTable using Buttons Plugin</title>
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
            <h2>Query Builder DataTable using Buttons Plugin</h2>
            <div class="panel panel-default">
                <div class="panel-body">
                    {!!  $dataTable->table()  !!}
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="html">
            <h2>HTML</h2>
            <pre><code class="html">@{!! $dataTable->table()  !!}</code></pre>
        </div>
        <div class="tab-pane fade" id="php">
            <h2>Routes</h2>
            <pre><code class="php">{{ file_get_contents(base_path('routes/buttons/query.php')) }}</code></pre>

            <h2>Controller</h2>
            <pre><code class="php">{{ file_get_contents(app_path('Http/Controllers/Buttons/QueryBuilderController.php')) }}</code></pre>

            <h2>DataTable</h2>
            <pre><code class="php">{{ file_get_contents(app_path('DataTables/Buttons/UsersQueryBuilderDataTable.php')) }}</code></pre>
        </div>
        <div class="tab-pane fade" id="js">
            <h2>JS</h2>
            <pre><code class="javascript">@{!! $dataTable->scripts() !!}</code></pre>
        </div>
    </div>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
@endpush
