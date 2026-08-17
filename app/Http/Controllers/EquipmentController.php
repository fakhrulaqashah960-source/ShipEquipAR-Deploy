<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Module;
use GuzzleHttp\Psr7\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;

class EquipmentController extends Controller
{
    // =========================
    // ADMIN LIST EQUIPMENT
    // =========================

    public function index()
    {
        $equipments = Equipment::with('module')->get();

        return view(
            'admin.equipment.index',
            compact('equipments')
        );
    }


    // =========================
    // CREATE PAGE
    // =========================

    public function create()
    {
        $modules = Module::all();

        return view(
            'admin.equipment.create',
            compact('modules')
        );
    }


    // =========================
    // STORE EQUIPMENT
    // =========================

    public function store(Request $request)
    {
        $request->validate([
            'module_id'   => 'required',
            'name'        => 'required',
            'description' => 'required',
            'function'    => 'required',

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:4096',
            ],

            'model_file' => [
                'nullable',
                'file',
                'max:204800',
            ],
        ]);


        // =========================
        // IMAGE UPLOAD
        // =========================

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName =
                time() . '_' .
                $request->file('image')->getClientOriginalName();

            $imageDirectory = public_path('uploads/equipment');

            if (!is_dir($imageDirectory)) {
                mkdir($imageDirectory, 0755, true);
            }

            $request->file('image')->move(
                $imageDirectory,
                $imageName
            );
        }


        // =========================
        // AR MODEL → GITHUB RELEASE
        // =========================

        $modelName = null;

        if ($request->hasFile('model_file')) {
            $modelName = $this->uploadRealityToGitHub(
                $request->file('model_file')
            );
        }


        // =========================
        // SAVE DATABASE
        // =========================

        Equipment::create([
            'module_id'   => $request->module_id,
            'name'        => $request->name,
            'image'       => $imageName,
            'description' => $request->description,
            'function'    => $request->function,
            'model_file'  => $modelName,
        ]);


        return redirect()
            ->route('admin.equipment.index')
            ->with(
                'success',
                'Equipment Added Successfully'
            );
    }


    // =========================
    // EDIT PAGE
    // =========================

    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);

        $modules = Module::all();

        return view(
            'admin.equipment.edit',
            compact(
                'equipment',
                'modules'
            )
        );
    }


    // =========================
    // UPDATE EQUIPMENT
    // =========================

    public function update(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        $request->validate([
            'module_id'   => 'required',
            'name'        => 'required',
            'description' => 'required',
            'function'    => 'required',

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:4096',
            ],

            'model_file' => [
                'nullable',
                'file',
                'max:204800',
            ],
        ]);


        $data = [
            'module_id'   => $request->module_id,
            'name'        => $request->name,
            'description' => $request->description,
            'function'    => $request->function,
        ];


        // =========================
        // UPDATE IMAGE
        // =========================

        if ($request->hasFile('image')) {

            $imageName =
                time() . '_' .
                $request->file('image')->getClientOriginalName();

            $imageDirectory = public_path('uploads/equipment');

            if (!is_dir($imageDirectory)) {
                mkdir($imageDirectory, 0755, true);
            }

            $request->file('image')->move(
                $imageDirectory,
                $imageName
            );

            $data['image'] = $imageName;
        }


        // =========================
        // UPDATE AR MODEL
        // =========================

        if ($request->hasFile('model_file')) {

            $modelName = $this->uploadRealityToGitHub(
                $request->file('model_file')
            );

            $data['model_file'] = $modelName;
        }


        $equipment->update($data);


        return redirect()
            ->route('admin.equipment.index')
            ->with(
                'success',
                'Equipment Updated Successfully'
            );
    }


    // =========================
    // DELETE EQUIPMENT
    // =========================

    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);

        $equipment->delete();

        return redirect()
            ->route('admin.equipment.index')
            ->with(
                'success',
                'Equipment Deleted Successfully'
            );
    }


    // =========================
    // USER VIEW EQUIPMENT
    // =========================

    public function userShow($id)
    {
        $equipment = Equipment::with('module')
            ->findOrFail($id);

        return view(
            'user.equipment.show',
            compact('equipment')
        );
    }


    // ==========================================================
    // UPLOAD .REALITY FILE TO GITHUB RELEASE
    // ==========================================================

    private function uploadRealityToGitHub($file): string
    {
        // Pastikan extension ialah .reality
        $extension = strtolower(
            $file->getClientOriginalExtension()
        );

        if ($extension !== 'reality') {

            throw ValidationException::withMessages([
                'model_file' =>
                    'AR model mestilah fail .reality',
            ]);
        }


        // Ambil config GitHub
        $token = config('services.github_ar.token');
        $owner = config('services.github_ar.owner');
        $repo  = config('services.github_ar.repo');


        if (!$token || !$owner || !$repo) {

            throw ValidationException::withMessages([
                'model_file' =>
                    'GitHub AR configuration belum lengkap.',
            ]);
        }


        // Bersihkan nama fail
        $originalName = basename(
            $file->getClientOriginalName()
        );

        $safeName = preg_replace(
            '/[^A-Za-z0-9._-]/',
            '_',
            $originalName
        );


        // Nama unik supaya GitHub tak kena duplicate asset
        $modelName =
            now()->format('YmdHis') .
            '_' .
            bin2hex(random_bytes(4)) .
            '_' .
            $safeName;


        try {

            // =========================
            // 1. GET LATEST RELEASE
            // =========================

            $releaseResponse = Http::withToken($token)
                ->withHeaders([
                    'Accept' =>
                        'application/vnd.github+json',

                    'X-GitHub-Api-Version' =>
                        '2026-03-10',
                ])
                ->connectTimeout(20)
                ->timeout(60)
                ->get(
                    "https://api.github.com/repos/{$owner}/{$repo}/releases/latest"
                );


            if (!$releaseResponse->successful()) {

                Log::error(
                    'GitHub latest release failed',
                    [
                        'status' =>
                            $releaseResponse->status(),

                        'response' =>
                            $releaseResponse->body(),
                    ]
                );

                throw ValidationException::withMessages([
                    'model_file' =>
                        'Tidak dapat mendapatkan GitHub Release.',
                ]);
            }


            $release = $releaseResponse->json();


            if (empty($release['upload_url'])) {

                throw ValidationException::withMessages([
                    'model_file' =>
                        'GitHub Release tidak mempunyai upload URL.',
                ]);
            }


            // GitHub beri URL begini:
            // .../assets{?name,label}
            // Kita buang {?name,label}

            $uploadUrl = preg_replace(
                '/\{\?name,label\}$/',
                '',
                $release['upload_url']
            );


            // =========================
            // 2. OPEN FILE AS STREAM
            // =========================

            $handle = fopen(
                $file->getRealPath(),
                'rb'
            );


            if ($handle === false) {

                throw ValidationException::withMessages([
                    'model_file' =>
                        'Fail AR tidak dapat dibaca.',
                ]);
            }


            $stream = Utils::streamFor($handle);


            // =========================
            // 3. UPLOAD TO GITHUB
            // =========================

            $uploadResponse = Http::withToken($token)
                ->withHeaders([
                    'Accept' =>
                        'application/vnd.github+json',

                    'X-GitHub-Api-Version' =>
                        '2026-03-10',
                ])
                ->withBody(
                    $stream,
                    'application/octet-stream'
                )
                ->connectTimeout(30)
                ->timeout(900)
                ->post(
                    $uploadUrl .
                    '?name=' .
                    rawurlencode($modelName)
                );


            if ($uploadResponse->status() !== 201) {

                Log::error(
                    'GitHub AR upload failed',
                    [
                        'status' =>
                            $uploadResponse->status(),

                        'response' =>
                            $uploadResponse->body(),
                    ]
                );

                throw ValidationException::withMessages([
                    'model_file' =>
                        'Upload AR model ke GitHub gagal.',
                ]);
            }


            return $modelName;

        } catch (ValidationException $e) {

            throw $e;

        } catch (Throwable $e) {

            Log::error(
                'AR model upload exception',
                [
                    'message' => $e->getMessage(),
                ]
            );


            throw ValidationException::withMessages([
                'model_file' =>
                    'Ralat semasa upload AR model. Sila cuba lagi.',
            ]);
        }
    }
}