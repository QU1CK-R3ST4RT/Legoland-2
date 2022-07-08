<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Models\Attraction;

class AttractionController extends Controller {

    public function index() {
        return view("attractions", [
            'attractions' => Attraction::all()
        ]);
    }

    public function Admin_index() {
        return view("admin.attractions", [
            'attractions' => Attraction::all()
        ]);
    }

    public function get($attractionID) {
        $foundAttraction = Attraction::all()->find($attractionID);
        $attractionExists = isset($foundAttraction);

        if($attractionExists) {
            return view('attraction.preview', [
                'attraction' => $foundAttraction
            ]);
        } else {
            abort(404);
        }
    }

    public function edit($attractionID) {
        $foundAttraction = Attraction::all()->find($attractionID);
        $attractionExists = isset($foundAttraction);

        if($attractionExists) {
            return view('crud.accomodation-edit', [
                'Data' => $foundAttraction,
            ]);
        } else {
            abort(404);
        }
    }

    public function delete($attractionID): RedirectResponse|null {
        $foundAttraction = Attraction::all()->find($attractionID);
        $attractionExists = isset($foundAttraction);

        if($attractionExists) {
            $foundAttraction->delete();
            return redirect("/attractions-admin/");
        } else {
            abort(404);
        }
    }

    public function createAttraction() {
        $attraction = new Attraction();
        $attraction->height = request('height');
        $attraction->capacity = request('capacity');
        $attraction->name = request('name');
        $attraction->image = request('image');
        $attraction->description = request('description');
        $attraction->save();

        return redirect('attractions-admin');
    }

    public function update($attractionID) {

        // Valideer de input, en zet hierna de nieuwe data in het ticket.
        // Voer de wijzigingen hierna ook door.
        $foundAttraction = Attraction::all()->find($attractionID);
        $foundAttraction->height = request('height');
        $foundAttraction->capacity = request('capacity');
        $foundAttraction->name = request('name');
        $foundAttraction->image = request('image');
        $foundAttraction->description = request('description');
        $foundAttraction->save();

        return redirect("attractions/$attractionID/edit");
    }
}
