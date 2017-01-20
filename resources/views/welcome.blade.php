<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
</head>
<body>
<div class="container" id="app">
    <table id="gg" class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
    </table>

    <data-table class="table table-bordered" :ajax="ajax" :columns="columns"></data-table>
</div>

<script src="/js/app.js"></script>
<link rel="stylesheet" href="/css/app.css">
<script>
    $(function () {
        $('#gg').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/users',
            columns: [
                {data: 'name', title: 'Name'},
                {data: 'email', title: 'Email'},
            ]
        });
    });

    const app = new Vue({
        el: '#app',
        data: {
            columns: [
                {data: 'name', title: 'Name'},
                {data: 'email', title: 'Email'},
                {data: 'post.title', title: 'Post Title'},
                {data: 'posts.0.content', title: 'Posts Content', name: 'posts.content'}
            ],
            ajax: '/users'
        }
    });
</script>
</body>
</html>
