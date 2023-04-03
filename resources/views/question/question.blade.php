<!DOCTYPE html>
<html lang="ja">

<!-- head -->

<body class="text-center">

    <main class="form-signin">


        <form method="post" action="{{route('Qentry')}}" onSubmit="return checkSubmit()">
            <h2>投稿フォーム</h2>
            @CSRF
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">content</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="question_contents" rows="3"></textarea>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <input type="hidden" name="solution" value="0">
                <button type="submit" class="btn btn-primary">
                    投稿する
                </button>
                <button class="btn btn-primary" id="send" type="button" onClick="history.back()">キャンセル</button>
        </form>
        </div>

    </main>
</body>

<script>
    function checkSubmit() {
        if (window.confirm('投稿してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>

</html>