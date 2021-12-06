<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Users</title>
</head>

<body>
    <style>
        body {
            padding-top: 20px;
            width: 80%;
            margin: 0px auto;
        }

        table {
            width: 100%;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            font-size: 13px;
            background-color: #fff;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
            border-right: 1px solid #dddddd;
        }

        th {
            background-color: #1877f2;
            color: #fff;
            border-radius: 2px;
        }

        .form-action {
            display: flex;
        }

        .row-update {
            margin: 0 auto;
            width: 50%;
        }

    </style>
    <div class="container">
        <p>Hello: <a class="">{{ Auth::user()->name }}</a> || Role: {{ Auth::user()->roles }} </p>
        <div class="">
            <a class="btn btn-sm btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
</body>
{{-- <script type="text/javascript">
    $(document).ready(function() {
        $('.update').click(function() {
            var id = $(this).attr("data-id");
            $("#update").removeClass('d-none');
            $("#add").addClass('d-none');
            $.ajax({
                url: '{{ url('user/edit','+id+') }}',
                method: "GET",
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function(data) {
                    $("#form-update").attr('action',`user/update/${data.id}` );
                    $("#title-form").replaceWith("<h3>Update User</h3>");
                    $('#username').val(data.name);
                    $('#email').val(data.email);
                    $('#email').attr('disabled', 'disable');
                    $('#phone').val(data.phone);
                    $('#button').val("Update User");
                    $('#pass').remove();
                }
            })
        })
    })
</script> --}}

</html>
