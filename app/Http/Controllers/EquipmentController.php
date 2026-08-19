<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
            'module_id' => [
                'required',
            ],

            'name' => [
                'required',
            ],

            'description' => [
                'required',
            ],

            'function' => [
                'required',
            ],

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


        $imageUrl = null;
        $modelUrl = null;


        // =========================
        // IMAGE -> GITHUB RELEASE
        // =========================
        if ($request->hasFile('image')) {

            $imageAsset = $this->uploadToGitHubRelease(
                $request->file('image'),
                ['jpg', 'jpeg', 'png'],
                'equipment-image'
            );

            $imageUrl = $imageAsset['url'];
        }


        // =========================
        // AR MODEL -> GITHUB RELEASE
        // =========================
        if ($request->hasFile('model_file')) {

            $modelAsset = $this->uploadToGitHubRelease(
                $request->file('model_file'),
                ['reality'],
                'equipment-ar'
            );

            $modelUrl = $modelAsset['url'];
        }


        Equipment::create([
            'module_id'   => $request->module_id,
            'name'        => $request->name,
            'image'       => $imageUrl,
            'description' => $request->description,
            'function'    => $request->function,
            'model_file'  => $modelUrl,
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
            'module_id' => [
                'required',
            ],

            'name' => [
                'required',
            ],

            'description' => [
                'required',
            ],

            'function' => [
                'required',
            ],

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

            $imageAsset = $this->uploadToGitHubRelease(
                $request->file('image'),
                ['jpg', 'jpeg', 'png'],
                'equipment-image'
            );

            $data['image'] = $imageAsset['url'];
        }


        // =========================
        // UPDATE AR MODEL
        // =========================
        if ($request->hasFile('model_file')) {

            $modelAsset = $this->uploadToGitHubRelease(
                $request->file('model_file'),
                ['reality'],
                'equipment-ar'
            );

            $data['model_file'] = $modelAsset['url'];
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


    // =========================================================
    // UPLOAD FILE TO GITHUB RELEASE
    // =========================================================
    private function uploadToGitHubRelease(
        UploadedFile $file,
        array $allowedExtensions,
        string $prefix
    ): array {

        // Tentukan field untuk validation message
        $field = $prefix === 'equipment-ar'
            ? 'model_file'
            : 'image';


        // =========================
        // VALIDATE EXTENSION
        // =========================
        $extension = strtolower(
            $file->getClientOriginalExtension()
        );


        if (!in_array(
            $extension,
            $allowedExtensions,
            true
        )) {

            throw ValidationException::withMessages([
                $field =>
                    'Jenis fail tidak dibenarkan.',
            ]);
        }


        // =========================
        // GITHUB CONFIG
        // =========================
        $token = config(
            'services.github_ar.token'
        );

        $owner = config(
            'services.github_ar.owner'
        );

        $repo = config(
            'services.github_ar.repo'
        );


        if (!$token || !$owner || !$repo) {

            throw ValidationException::withMessages([
                $field =>
                    'GitHub upload configuration belum lengkap.',
            ]);
        }


        // =========================
        // ORIGINAL FILE NAME
        // =========================
        $originalName = basename(
            $file->getClientOriginalName()
        );


        $safeName = preg_replace(
            '/[^A-Za-z0-9._-]/',
            '_',
            $originalName
        );


        // =========================
        // UNIQUE ASSET NAME
        // =========================
        $assetName =
            $prefix .
            '_' .
            now()->format('YmdHis') .
            '_' .
            bin2hex(random_bytes(4)) .
            '_' .
            $safeName;


        // =========================
        // GET ORIGINAL FILE SIZE
        // =========================
        $localSize = (int) $file->getSize();


        if ($localSize <= 0) {

            throw ValidationException::withMessages([
                $field =>
                    'Fail kosong atau tidak dapat dibaca.',
            ]);
        }


        try {

            // =========================
            // GET LATEST RELEASE
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
                    'GitHub release request failed',
                    [
                        'field' =>
                            $field,

                        'status' =>
                            $releaseResponse->status(),

                        'response' =>
                            $releaseResponse->body(),
                    ]
                );


                throw ValidationException::withMessages([
                    $field =>
                        'Tidak dapat mendapatkan GitHub Release.',
                ]);
            }


            // =========================
            // GET RELEASE UPLOAD URL
            // =========================
            $uploadUrl = $releaseResponse->json(
                'upload_url'
            );


            if (!$uploadUrl) {

                throw ValidationException::withMessages([
                    $field =>
                        'GitHub Release upload URL tidak dijumpai.',
                ]);
            }


            // GitHub upload_url berbentuk:
            // https://uploads.github.com/.../assets{?name,label}
            //
            // Buang {?name,label}
            $uploadUrl = preg_replace(
                '/\{\?name,label\}$/',
                '',
                $uploadUrl
            );


            // =========================
            // CONTENT TYPE
            // =========================
            if ($extension === 'reality') {

                $contentType =
                    'application/octet-stream';

            } else {

                $contentType =
                    $file->getMimeType()
                    ?: 'application/octet-stream';
            }


            // =========================
            // OPEN FILE AS STREAM
            // =========================
            $realPath = $file->getRealPath();


            if (!$realPath) {

                throw ValidationException::withMessages([
                    $field =>
                        'Lokasi fail tidak dapat dibaca.',
                ]);
            }


            $handle = fopen(
                $realPath,
                'rb'
            );


            if ($handle === false) {

                throw ValidationException::withMessages([
                    $field =>
                        'Fail tidak dapat dibaca.',
                ]);
            }


            try {

                // =================================================
                // UPLOAD RAW BINARY
                //
                // IMPORTANT:
                // guna send() + body stream.
                // Jangan guna ->post() bersama withOptions(['body'])
                // kerana body boleh bertukar menjadi JSON [].
                // =================================================
                $uploadResponse = Http::withToken($token)
                    ->withHeaders([
                        'Accept' =>
                            'application/vnd.github+json',

                        'X-GitHub-Api-Version' =>
                            '2026-03-10',

                        'Content-Type' =>
                            $contentType,

                        'Content-Length' =>
                            (string) $localSize,
                    ])
                    ->connectTimeout(30)
                    ->timeout(900)
                    ->send(
                        'POST',
                        $uploadUrl .
                            '?name=' .
                            rawurlencode($assetName),
                        [
                            'body' => $handle,
                        ]
                    );

            } finally {

                if (is_resource($handle)) {
                    fclose($handle);
                }
            }


            // =========================
            // GITHUB SUCCESS = 201
            // =========================
            if ($uploadResponse->status() !== 201) {

                Log::error(
                    'GitHub asset upload failed',
                    [
                        'field' =>
                            $field,

                        'asset_name' =>
                            $assetName,

                        'local_size' =>
                            $localSize,

                        'status' =>
                            $uploadResponse->status(),

                        'response' =>
                            $uploadResponse->body(),
                    ]
                );


                throw ValidationException::withMessages([
                    $field =>
                        'Upload ke GitHub Release gagal.',
                ]);
            }


            // =========================
            // VERIFY UPLOADED SIZE
            // =========================
            $githubSize = (int) $uploadResponse->json(
                'size'
            );


            if ($githubSize !== $localSize) {

                Log::error(
                    'GitHub asset size mismatch',
                    [
                        'field' =>
                            $field,

                        'asset_name' =>
                            $assetName,

                        'local_size' =>
                            $localSize,

                        'github_size' =>
                            $githubSize,
                    ]
                );


                throw ValidationException::withMessages([
                    $field =>
                        'Saiz fail yang dimuat naik tidak sepadan dengan fail asal. Sila upload semula.',
                ]);
            }


            // =========================
            // GET DOWNLOAD URL
            // =========================
            $browserUrl = $uploadResponse->json(
                'browser_download_url'
            );


            if (!$browserUrl) {

                throw ValidationException::withMessages([
                    $field =>
                        'GitHub tidak memulangkan URL fail.',
                ]);
            }


            // =========================
            // SUCCESS
            // =========================
            return [
                'name' =>
                    $assetName,

                'url' =>
                    $browserUrl,

                'size' =>
                    $githubSize,
            ];

        } catch (ValidationException $e) {

            throw $e;

        } catch (Throwable $e) {

            Log::error(
                'GitHub file upload exception',
                [
                    'field' =>
                        $field,

                    'asset_name' =>
                        $assetName,

                    'local_size' =>
                        $localSize,

                    'message' =>
                        $e->getMessage(),
                ]
            );


            throw ValidationException::withMessages([
                $field =>
                    'Ralat semasa upload. Sila cuba lagi.',
            ]);
        }
    }
}