<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="{{asset('/assets/css/reset.css')}}" />
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}" />
</head>
<body>
<main>
<div class="todo-wrap">
        <h2>Todo List</h2>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
            @endif
            <form action="/todo/create" method="post">
                @csrf
                <div class="input-todo">
                    <input type="text" name="content">
                    <button class="request-btn">
                        追加
                    </button>
                </div>
            </form>
        </div>
<div class="todo-table">
<table>
        <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{$item->created_at}}</td>
                <form action="/todo/update" method="post">
                <td class="todo-task">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <input type="text" name='content' value="{{$item->content}}">
                </td>
                <td>
                        <button class="create-btn">
                            更新
                        </button>
                    </form>
                </td>
                <form action="/todo/delete" method="post">
                @csrf
                    <td>
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button class="delete-btn">
                            削除
                        </button>
                    </td>
                </form>
            </tr>
            @endforeach
        </table>
</div>
</main>
<script></script>
</body>
</html>
