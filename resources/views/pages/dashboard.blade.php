@extends('layouts.app')

@section('content')
    <?php if (isset($api_error)) : ?>
    {{--    Show error message if API retreival does not function .--}}
    <div class="alert alert-danger w-50 m-auto mt-3" role="alert">
            <?= $api_error ?>
    </div>

    <?php endif ; ?>

    <div class="card w-50 mx-auto mt-5">
        <div class="card-header text-center underline">
            <h1>Dashboard</h1>
        </div>
        <div class="card-body">
            <?php if (isset($first_name)) : ?>
            <p><strong>Name:</strong> <?= $first_name, ' ', $surname ?></p>
            <p><strong>Age:</strong> <?= $age ?></p>
            <p><strong>Image:</strong></p>
            <img class="m-6 w-50 h-50 m-auto" src="<?= $photo['full_url'] ?>" alt="Picture of <?=$first_name, ' ', $surname?>"/>
            <?php endif ; ?>
        </div>
    </div>

@endsection
