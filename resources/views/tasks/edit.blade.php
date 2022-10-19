<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit_tasks</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>論文投稿編集</h1>
    <!-- なぜmethodはpostなの？ -->
    <!-- updateアクションを呼び出したいので、actionはtasks/{}になりmethodはpatch -->
    <form action="/tasks/{{$task->id}}" method='post'>
        @csrf
        @method('PATCH')
        <p>
            <label for="title">論文タイトル</label><br>
            <!-- valueってなに？これがcontrollerのrequestに代入している？-->
            <input type="text" name="title" value="{{ $task->title }}">
        </p>
        <p>
            <label for="body">本文</label><br>
            <!-- なぜテキストエリアにはvalueがないのか？ -->
            <textarea name="body" class="body">{{ $task->body }}</textarea>
        </p>
        <div>
            <input type="submit" value="更新">
            <button onclick="location.href='/tasks'">詳細に戻る</button>
        </div>
    </form>



</body>

</html>
