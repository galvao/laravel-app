<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <style>
            body {
                background-color: rgb(64, 64, 64);
                color: rgb(255, 255, 255)
            }
            div {
                padding: 5px;
                margin-bottom: 5px;
                border: 1px solid #fff;
            }

            .item {
                width: 250px;
                background-color: rgb(0, 64, 0);
            }

            .action {
                text-align: right;
                font-weight: bolder;
                border: 1px solid #ff0000;
                background-color: #ff0000;
                text-align: center;
                color: #fff;
            margin-left: 5px;
            }

            .active {
                width: 400px;
                background-color: rgb(64, 0, 0);
            }

            .dropzone {
                width: 400px;
                background-color: rgb(0, 0, 64);
            }
        </style>
    </head>
    <body>
        <div id="dropzone" class="dropzone">
            @foreach ($data as $item)
                <div id="item{{$item->id}}" class="item">{{$item->label}} <span class="action">X</span></div>
            @endforeach
        </div>
        <script type="text/javascript" src="dist/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="dist/jquery-ui-1.14.0/jquery-ui.min.js"></script>
        <script type="text/javascript">
        $(function () {
            $('.item').draggable();
            $('#dropzone').droppable({
                drop: function (event, ui) {
                    $(this).toggleClass('dropzone');
                    $(this).toggleClass('active');
                }
            });

            $('.action').each(function (element) {
                $(this).on('click', function () {
                    $.ajax({
                        url: '/delete/' + $(this).parent().attr('id'),
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function () {
                            $(this).parent().detach();
                        }
                    });
                });
            });
        });
        </script>
    </body>
</html>
