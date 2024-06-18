<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\Intervenant;
use Illuminate\Support\Facades\DB;
use Spatie\SimpleExcel\SimpleExcelReader;
use App\Http\Requests\StoreIntervenantRequest;
use App\Http\Requests\UpdateIntervenantRequest;

class IntervenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $intervenants = Intervenant::latest()->paginate(13);
        return view('intervenants.index', compact('intervenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $phases = Phase::latest()->get();
        return view('intervenants.create', compact('phases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIntervenantRequest $request)
    {
        $phaseId = (int) $request->phase;
        $phase = Phase::find($phaseId);
        $slug = $phase->slug;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 3;
        $coupon = null;

        $request->validate([
            'fichier' => 'bail|required|file|mimes:csv'
        ]);
        
        $fichier = $request->fichier->move(public_path(), $request->fichier->hashName());
        
        $reader = SimpleExcelReader::create($fichier);
        $rows = $reader->getRows();
        
        $data = [];
        foreach ($rows as $row) {
            do {
                $coupon = '';
                for ($i = 0; $i < $codeLength; $i++) {
                    $position = mt_rand(0, $charactersNumber - 1);
                    $coupon .= $characters[$position];
                }
            } while (Intervenant::where('coupon', $coupon)->exists());
            $couponPhase = $slug.$coupon;
            $now = date('Y-m-d H:i:s');
            $data[] = [
                'email' => $row['email'],
                'coupon'  => $couponPhase,
                'created_at' => $now,
                'updated_at'=> $now,
            ];
        }

        $status = Intervenant::insert($data);
        
        if ($status) {
            $reader->close();
            unlink($fichier);
            return redirect(route('intervenants.index'))->with('success', 'Insertion réussie');
        } else {
            abort(500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Intervenant $intervenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intervenant $intervenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIntervenantRequest $request, Intervenant $intervenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intervenant $intervenant)
    {
        //
    }
}
