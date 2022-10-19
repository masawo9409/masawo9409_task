<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tasks</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>タスク一覧</h1>
    <ul>
        @method('DELETE')
        @foreach ( $tasks as $task )
        <!-- $tasksの中から、$task[id]を順番に取り出している。 -->
        <li>
            <div class="title">
                <!-- showに飛ばすためのデータ送信先の設定。タイトルを$taskから引用 -->
                <a href="/tasks/{{ $task->id }}"> {{ $task->title }} </a>
                <!-- 削除ボタンの生成。クリックしたらdeleteアクションが呼び出されるように記載。 -->
                <form action="/tasks/{{$task->id}}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
                </form>
            </div>
        </li>
        @endforeach
    </ul>
    <hr>
    <h1>新規論文投稿</h1>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <li>
        {{ $error }}
    </li>
    @endforeach
    @endif
    <div>


    </div>

    <form action="/tasks" method="POST">
        @csrf
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
        </p>
        <p>
            <label for="body">内容</label><br>
            <textarea name="body" class="body">{{ old('body') }}</textarea>
        </p>
        <input type="submit" value="Create Task">
    </form>



</body>

</html>
