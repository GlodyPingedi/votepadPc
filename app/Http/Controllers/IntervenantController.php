<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use App\Models\Intervenant;
use Illuminate\Http\Request;
use App\Models\IntervenantPhase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $intervenantPhaseCount = [];
        foreach ($intervenants as $intervenant) {
            $intervenantPhaseCount[$intervenant->id] = $intervenant->phases->count();
        }
        return view('intervenants.index', compact('intervenants', 'intervenantPhaseCount'));
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
        $now = date('Y-m-d H:i:s');
        $getRows = 0;
        $data = [];
        foreach ($rows as $row) {
            $intervenant = Intervenant::where('email', $row['email'])->first();
            $getRows += 1;
            if ($intervenant) {
                $intervenantId = $intervenant->id;
            } else {
                $intervenant = Intervenant::create([
                    'email' => $row['email'],
                    'created_at' => $now,
                    'updated_at'=> $now,
                ]);
                $intervenantId = $intervenant->id;
            }
    
            do {
                $coupon = '';
                for ($i = 0; $i < $codeLength; $i++) {
                    $position = mt_rand(0, $charactersNumber - 1);
                    $coupon .= $characters[$position];
                }
            } while (IntervenantPhase::where('coupon', $coupon)->exists());
    
            $couponPhase = $slug.$coupon;
            $getRecord = IntervenantPhase::where('intervenant_id', $intervenantId)->where('phase_id', $phaseId)->first();
            if ($getRecord) {
                continue;
            }

            $data[] = [
                'intervenant_id' => $intervenantId,
                'phase_id' => $phaseId,
                'coupon' => $couponPhase,
                'created_at' => $now,
                'updated_at'=> $now,
            ];
        }
        $status = IntervenantPhase::insert($data);
    
        if ($status) {
            $reader->close();
            unlink($fichier);
            $insertionsCount = count($data);
            return redirect(route('intervenants.index'))->with('success', 'Insertion effectuée : '.$insertionsCount.' sur '.$getRows.' lignes.');
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

    public function form(){
        return view('intervenants.authenticate');
    }

    public function authenticate(Request $request)
    {
        $email = $request->email;
        $coupon = $request->coupon;
        $intervenant = Intervenant::where('email', $email)->first();
    
        if (!$intervenant) {
            return redirect(route('form-authenticate'))->with('unsuccess', 'L\'adresse email insérée est invalide.');
        } else 
        {
            $intervenantId = $intervenant->id;
            $intervenantPhase = IntervenantPhase::where('intervenant_id', $intervenantId)->where('coupon', $coupon)->first();
            if (!$intervenantPhase) {
                return redirect(route('form-authenticate'))->with('unsuccess', 'Le coupon inséré est invalide.');
            } 
            else {
                $intervenantToken = $intervenantPhase->token;
                if ($intervenantToken != 0) {
                    return redirect(route('form-authenticate'))->with('unsuccess', 'ce coupon a été déjà utilisé.');
                }
                else{
                    $intervenantPhaseCoupon = $intervenantPhase->coupon;
                    $token = $intervenantPhase->createToken($intervenantPhaseCoupon)->plainTextToken;
                    $intervenantPhase->token = $token;
                    $intervenantPhase->save(); 
                    $phaseSlug = substr($intervenantPhaseCoupon, 0, 3);
                    $phase = Phase::where('slug', $phaseSlug)->first();
                    return view('intervenants.intro', compact('phase'));
                }           
            }
        }
    }
}
