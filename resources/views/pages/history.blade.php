@extends('layouts.app')

@section('content')

    <div class="card w-50 mx-auto mt-3">
        <div class="card-header text-center underline">
            <h1>History</h1>
        </div>
        <div class="card-body">
            <?php if (count($generatedPeople) > 0) : ?>
            <p><strong>Click on a name to see their details.</strong></p>
            <?php else : ?>
            <p>It doesn't seem like there are any generated people, yet. Please navigate to the <strong><u><a href="/dashboard">Dashboard</a></u></strong> to generate some.</p>
            <?php endif ;?>

            <div class="accordion accordion-flush" id="accordion">
                <?php foreach ($generatedPeople as $person) : ?>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$person['id']?>" aria-expanded="false" aria-controls="collapse<?=$person['id']?>">
                            <?= $person['first_name'], ' ', $person['last_name'] ?>
                        </button>
                    </h2>
                    <div id="collapse<?=$person['id']?>" class="accordion-collapse collapse" data-bs-parent="#accordion">
                        <div class="accordion-body">
                            <p><strong>Age: </strong><?= $person['age'] ?></p>
                            <p><strong>Picture: </strong></p>
                            <img class="m-6 w-50 h-50 m-auto" src="<?= $person['image_url'] ?>" alt="Picture of <?=$person['first_name'], ' ', $person['last_name']?>"/>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="w-50 m-auto mt-2">
        {{ $generatedPeople->links('vendor.pagination.bootstrap-5') }}
    </div>

@endsection
