<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Accommodation;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AccommodationController extends Controller
{
    public function index() {
        return view("accommodation", [
            'accommodations' => Accommodation::all()
        ]);
    }

    public function Admin_index() {
        return view("admin.Accomodations", [
            'accommodations' => Accommodation::all()
        ]);
    }

    public function get($accommodationID) {
        $foundAccommodation = Accommodation::all()->find($accommodationID);
        $accommodationExists = isset($foundAccommodation);

        if($accommodationExists) {
            return view('accommodation.preview', [
                'accomondation' => $foundAccommodation
            ]);
        } else {
            abort(404);
        }
    }

    public function edit($accommodationID) {
        $foundAccommodation = Accommodation::all()->find($accommodationID);
        $accommodationExists = isset($foundAccommodation);

        if($accommodationExists) {
            return view('crud.accomodation-edit', [
                'Data' => $foundAccommodation,
            ]);
        } else {
            abort(404);
        }
    }

    public function delete($accommodationID): RedirectResponse|null {
        $foundAccommodation = Accommodation::all()->find($accommodationID);
        $accommodationExists = isset($foundAccommodation);

        if($accommodationExists) {
            $foundAccommodation->delete();

            return redirect("/accommondations-admin/");

        } else {
            abort(404);
        }
    }

    public function createAccommodation() {
        $accommodation = new Accommodation();
        $accommodation->user_id = request('user_id');
        $accommodation->taken = request('taken');
        $accommodation->name = request('name');
        $accommodation->room_type = request('room_type');
        $accommodation->image = request('image');
        $accommodation->description = request('description');
        $accommodation->save();

        return redirect('accommondations-admin');
    }

    public function update($accommodationID) {

        try {
            $e = Accommodation::all()->find($accommodationID);
            $e->user_id = request('user_id');
            $e->taken = request('taken');
            $e->name = request('name');
            $e->room_type = request('room_type');
            $e->image = request('image');
            $e->description = request('description');
            $e->save();
            return redirect("/accommondations/$accommodationID/edit");
        } catch (Exception $exception) {
            dump($exception);
        }
    }
}
