<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>タスク管理ツール</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <style>
        /* Custom page CSS
        -------------------------------------------------- */
        /* Not required for template or sticky footer method. */
        
        .container {
            width: auto;
            max-width: 800px;
            padding: 0 15px;
        }
        
        .main {
            padding-bottom: 100px;
        }
        
        .footer {
            background-color: #f5f5f5;
        }
        </style>
    </head>

    <body>
        {{-- ナビゲーションバー --}}
        @include('commons.navbar')

        <div class="container main">
            {{-- エラーメッセージ --}}
            @include('commons.error_messages')
            @yield('content')
        </div>
        <footer class="footer mt-auto py-3 fixed-bottom">
            <div class="container">
                <span class="text-muted">タスク管理ツール　20220921</span>
            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>