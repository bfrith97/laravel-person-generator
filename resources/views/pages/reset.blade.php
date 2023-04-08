@extends('layouts.app')

@section('content')
    <?php if (isset($success_message)) : ?>
{{--    Show success message after deletion of all rows.--}}
        <div class="alert alert-success w-50 m-auto mt-3" role="alert">
            <?= $success_message ?>
        </div>

    <?php endif ; ?>

    <div class="card w-50 mx-auto mt-3">
        <div class="card-header text-center underline">
            <h1>Reset all</h1>
        </div>
        <div class="card-body">
            <p>Press the button to reset and delete all generated users' data.</p>
            <button type="button" class="btn btn-sm btn-danger" id="reset-btn" style="background-color: #dc3545">
                RESET
            </button>

            <form id="reset-form" action="/reset" method="post">
{{--                 Cross Site Request Forgery protection--}}
                @csrf
            </form>
        </div>
    </div>

    <script>
        // JQUERY to create delete confirmation
        $('#reset-btn').click(function() {
            if (confirm('Are you sure you would like to delete all user data?')) {
                $('#reset-form').submit();
            }
        })
    </script>
@endsection
