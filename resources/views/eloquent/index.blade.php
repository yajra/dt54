@extends('layouts.demo')

@section('title')
    <title>Eloquent DataTables | Laravel DataTables</title>
@endsection

@section('side-menu')
    @include('eloquent.partials.menu')
@endsection

@section('content')
    <h1>Laravel Eloquent DataTables</h1>
    <h3>Feature Overview:</h3>
    <ul>
        <li>Array & Object Response</li>
        <li>Eager Loading</li>
        <li>Nested Eager Loading</li>
        <li>Soft Deletes Trait</li>
        <li>Query Scopes</li>
    </ul>

    <h3 id="notes"><a href="#notes">Important Notes</a></h3>

    <h4 id="searching"><a href="#searching">Searching & Sorting on Eager Loaded Models</a></h4>
    <p>
        When searching/sorting for eager loaded models, your column name must be declared like <strong>relation.column</strong>
    </p>
    <pre><code>columns: [{data: 'id', name: 'posts.id'}, {data: 'user.name', name: 'user.name'}]</code></pre>

    <h4 id="relation"><a href="#relation">Relation Response Behavior</a></h4>
    <p>
        If your relations consists of (2) two or more words, the convention to use is as follows:
    </p>
    <pre><code>{data: 'relation_name.column', name: 'relationName.column'}</code></pre>

    <h4 id="select"><a href="#select">Selecting Fields</a></h4>
    <p>
        It is advised that you include <strong>select('table.*')</strong> on query to avoid weird issues where id from related model replaces the id of the main model.
    </p>
    <pre><code>$posts = Post::with('user')->select('posts.*');</code></pre>
@endsection

@push('scripts')
@endpush
