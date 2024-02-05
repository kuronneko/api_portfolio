<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Persona;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $personas = Persona::with(['user', 'city.country', 'skills.type', 'socials', 'projects.details'])->where('user_id', Auth::user()->id)->get();
            return response()->json($personas);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['*' => 'required'] + ['lastname' => ''] ?? []);

        try {
            $persona = Persona::create($request->merge([
                'user_id' => Auth::user()->id,
                'lastname' => $request->input('lastname') ?? "",
            ])->except('email', 'github', 'whatsapp'));

            Social::create([
                'name' => 'GitHub',
                'content' => $request->github,
                'persona_id' => $persona->id,
            ]);
            Social::create([
                'name' => 'Email',
                'content' => $request->email,
                'persona_id' => $persona->id,
            ]);
            Social::create([
                'name' => 'WhatsApp',
                'content' => $request->whatsapp,
                'persona_id' => $persona->id,
            ]);
            return response()->json([
                'persona' => $persona,
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        try {
            return response()->json($persona);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function projects(Persona $persona)
    {
        //projects full filter
        //$projects = Project::with(['details'])->where('persona_id', Persona::where('id', $persona->id)->where('user_id', Auth::user()->id)->first()->id)->get();
        try {
            $projects = Project::with(['persona', 'details'])->where('persona_id', Persona::where('id', $persona->id)->where('user_id', Auth::user()->id)->first()->id)->get();
            return response()->json($projects);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function socials(Persona $persona)
    {
        try {
            $socials = Social::with(['persona'])->where('persona_id', Persona::where('id', $persona->id)->where('user_id', Auth::user()->id)->first()->id)->get();
            return response()->json($socials);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function skills(Persona $persona)
    {
        try {
            $skills = Skill::with(['persona', 'type'])->where('persona_id', Persona::where('id', $persona->id)->where('user_id', Auth::user()->id)->first()->id)->get();
            return response()->json($skills);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function getActivePersona()
    {
        $persona = Persona::where('status', 1)->first();
        return response()->json($persona);
    }
    */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getActivePersona($uuid)
    {
        try {
            $persona = Persona::with(['user', 'city.country', 'skills.type', 'socials', 'projects.details'])->where('status', 1)->where('user_id', User::where('uuid', $uuid)->first()->id)->first();
            if ($persona) {
                return response()->json($persona);
            } else {
                return response()->json(['error' => 'You need to create/activate a persona profile']);
            }
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate(['*' => 'required'] + ['lastname' => ''] ?? []);

        try {

            $persona->fill($request->merge([
                'user_id' => Auth::user()->id,
                'lastname' => $request->input('lastname') ?? "",
            ])->all())->save();

            return response()->json([
                'persona' => $persona,
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Persona $persona)
    {
        try {
            if ($persona->status == 1) {
                $persona->status = 0;
            } else {
                $persona->status = 1;
                foreach (Persona::where('user_id', Auth::user()->id)->get() as $personas) {
                    if ($personas != $persona) {
                        $personas->status = 0;
                        $personas->save();
                    }
                }
            }
            $persona->save();
            return response()->json(['persona' => $persona]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        try {
            Detail::whereIn('project_id', Project::where('persona_id', $persona->id)->get()->pluck('id'))->delete();
            Project::where('persona_id', $persona->id)->delete();
            Skill::where('persona_id', $persona->id)->delete();
            Social::where('persona_id', $persona->id)->delete();
            $persona->delete();
            return response()->json([
                'mensaje' => 'Persona deleted',
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        }
    }
}
