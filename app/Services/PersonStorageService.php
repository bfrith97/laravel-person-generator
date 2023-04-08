<?php

namespace App\Services;

use App\Models\GeneratedPerson;
use Illuminate\Support\Facades\Auth;

class PersonStorageService
{
    public function storePerson($personDetails)
    {
        // Generate and insert into the generated_people DB.
        $person = new GeneratedPerson();
        $person->user_id = Auth::id();
        $person->first_name = $personDetails['first_name'];
        $person->last_name = $personDetails['surname'];
        $person->age = $personDetails['age'];
        $person->image_url = $personDetails['photo']['full_url'];
        $person->save();

        return $person;
    }
}
