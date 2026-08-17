<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Throwable;

class ShipController extends Controller
{
    // =========================
    // ADMIN LIST SHIPS
    // =========================
    public function index()
    {
        $ships = Ship::all();

        return view(
            'admin.ships.index',
            compact('ships')
        );
    }


    // =========================
    // CREATE PAGE
    // =========================
    public function create()
    {
        return view('admin.ships.create');
    }


    // =========================
    // STORE SHIP
    // =========================
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:8192',
            ],

            'ar_model' => [
                'nullable',
                'file',
                'max:204800',
            ],
        ]);


        $imageUrl = null;
        $arModelUrl = null;


        // =========================
        // UPLOAD IMAGE TO GITHUB
        // =========================
        if ($request->hasFile('image')) {

            $imageAsset = $this->uploadToGitHubRelease(
                $request->file('image'),
                'image',
                [
                    'jpg',
                    'jpeg',
                    'png',
                    'webp',
                ],
                'ship-image'
            );

            $imageUrl = $imageAsset['url'];
        }


        // =========================
        // UPLOAD AR TO GITHUB
        // =========================
        if ($request->hasFile('ar_model')) {

            $arAsset = $this->uploadToGitHubRelease(
                $request->file('ar_model'),
                'ar_model',
                [
                    'reality',
                ],
                'ship-ar'
            );

            $arModelUrl = $arAsset['url'];
        }


        // =========================
        // SAVE DATABASE
        // =========================
        Ship::create([
            'name'        => $request->name,
            'description' => $request->description,
            'image'       => $imageUrl,
            'ar_model'    => $arModelUrl,
        ]);


        return redirect()
            ->route('admin.ships.index')
            ->with(
                'success',
                'Type of Ship Added Successfully'
            );
    }


    // =========================
    // SHOW SHIP
    // =========================
    public function show($id)
    {
        $ship = Ship::findOrFail($id);

        return view(
            'admin.ships.show',
            compact('ship')
        );
    }


    // =========================
    // EDIT PAGE
    // =========================
    public function edit($id)
    {
        $ship = Ship::findOrFail($id);

        return view(
            'admin.ships.edit',
            compact('ship')
        );
    }


    // =========================
    // UPDATE SHIP
    // =========================
    public function update(Request $request, $id)
    {
        $ship = Ship::findOrFail($id);


        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:8192',
            ],

            'ar_model' => [
                'nullable',
                'file',
                'max:204800',
            ],
        ]);


        $data = [
            'name'        => $request->name,
            'description' => $request->description,
        ];


        // =========================
        // UPDATE IMAGE
        // =========================
        if ($request->hasFile('image')) {

            $imageAsset = $this->uploadToGitHubRelease(
                $request->file('image'),
                'image',
                [
                    'jpg',
                    'jpeg',
                    'png',
                    'webp',
                ],
                'ship-image'
            );

            $data['image'] = $imageAsset['url'];
        }


        // =========================
        // UPDATE AR MODEL
        // =========================
        if ($request->hasFile('ar_model')) {

            $arAsset = $this->uploadToGitHubRelease(
                $request->file('ar_model'),
                'ar_model',
                [
                    'reality',
                ],
                'ship-ar'
            );

            $data['ar_model'] = $arAsset['url'];
        }


        $ship->update($data);


        return redirect()
            ->route('admin.ships.index')
            ->with(
                'success',
                'Ship updated successfully'
            );
    }


    // =========================
    // DELETE SHIP
    // =========================
    public function destroy($id)
    {
        $ship = Ship::findOrFail($id);

        $ship->delete();


        return redirect()
            ->route('admin.ships.index')
            ->with(
                'success',
                'Ship deleted successfully'
            );
    }


    // =========================================================
    // UPLOAD FILE TO GITHUB RELEASE
    // =========================================================
    private function uploadToGitHubRelease(
        UploadedFile $file,
        string $field,
        array $allowedExtensions,
        string $prefix
    ): array {

        // =========================
        // CHECK EXTENSION
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
                $field => 'Jenis fail tidak dibenarkan.',
            ]);
        }


        // =========================
        // GITHUB CONFIG
        // =========================
        $token = config('services.github_ar.token');
        $owner = config('services.github_ar.owner');
        $repo  = config('services.github_ar.repo');


        if (!$token || !$owner || !$repo) {

            throw ValidationException::withMessages([
                $field =>
                    'GitHub configuration belum lengkap.',
            ]);
        }


        // =========================
        // SAFE FILE NAME
        // =========================
        $originalName = basename(
            $file->getClientOriginalName()
        );


        $safeName = preg_replace(
            '/[^A-Za-z0-9._-]/',
            '_',
            $originalName
        );


        // Setiap asset mesti ada nama unik
        $assetName =
            $prefix .
            '_' .
            now()->format('YmdHis') .
            '_' .
            bin2hex(random_bytes(4)) .
            '_' .
            $safeName;


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
            // GET UPLOAD URL
            // =========================
            $uploadUrl =
                $releaseResponse->json('upload_url');


            if (!$uploadUrl) {

                throw ValidationException::withMessages([
                    $field =>
                        'GitHub upload URL tidak dijumpai.',
                ]);
            }


            // GitHub beri URL:
            // .../assets{?name,label}
            // Buang bahagian template akhir.

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
            // OPEN FILE STREAM
            // =========================
            $handle = fopen(
                $file->getRealPath(),
                'rb'
            );


            if ($handle === false) {

                throw ValidationException::withMessages([
                    $field =>
                        'Fail tidak dapat dibaca.',
                ]);
            }


            try {

                // =========================
                // UPLOAD BINARY TO GITHUB
                // =========================
                $uploadResponse =
                    Http::withToken($token)
                    ->withHeaders([
                        'Accept' =>
                            'application/vnd.github+json',

                        'X-GitHub-Api-Version' =>
                            '2026-03-10',

                        'Content-Type' =>
                            $contentType,
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


            // GitHub successful upload = HTTP 201
            if ($uploadResponse->status() !== 201) {

                Log::error(
                    'GitHub asset upload failed',
                    [
                        'field' => $field,

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
            // GET PERMANENT DOWNLOAD URL
            // =========================
            $browserUrl =
                $uploadResponse->json(
                    'browser_download_url'
                );


            if (!$browserUrl) {

                throw ValidationException::withMessages([
                    $field =>
                        'GitHub tidak memulangkan URL fail.',
                ]);
            }


            return [
                'name' => $assetName,
                'url'  => $browserUrl,
            ];

        } catch (ValidationException $e) {

            throw $e;

        } catch (Throwable $e) {

            Log::error(
                'Ship GitHub upload exception',
                [
                    'field' =>
                        $field,

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