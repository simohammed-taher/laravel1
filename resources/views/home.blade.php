<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js" ></script>
</head>
<body class="bg-image"
style="
  background-image: url('https://mdbcdn.b-cdn.net/img/Photos/Others/images/76.webp');
  height: 100vh;
">
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To-Do List</h3>
                <form action="{{ route('store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="input-group">
                    <input type="text" name="content" class="form-control" placeholder="add your now todo">
                    <button type="submit" class="btn btn-warning btn-sm px-4 ">
                        <i class="fas fa-clipboard-list"></i>
                    </button>
                </div>
                </form>
                @if (count($todolists))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($todolists as $todolist)
                    <li class="list-group-item">
                        <form action="/todolist/{{ $todolist->id }}" method="POST">
                            {{ $todolist->content }}
                            @csrf
                            @method('POST')
                            <div class="form-group">
                            <input type="text" class="form-control" placeholder="Update ??" name="title" value="{{ $todolist->title }}"><br>
                            <button type="submit" class="btn btn-primary">Update  <i class="fas fa-marker"></i></button>
                        </div>
                          </form>
                        <form action="/todolist/{{ $todolist->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="form-group">
                            <button type="submit" class="btn  btn-danger ">Delete   <i class=" fas fa-trash "></i></button>
                            </div>
                          </form>
                    </li>
                    @endforeach
                </ul>
                @else
                <p class="text-center mt-3">No Tasks!</p>
                @endif
            </div>
            @if (count($todolists))
            <div class="card-footer">
                You have {{ count($todolists) }} pending tasks
            </div>
            @endif
        </div>
    </div>

</body>
</html>
