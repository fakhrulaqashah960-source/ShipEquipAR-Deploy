<?php

namespace App\Console\Commands;

use App\Models\Equipment;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Throwable;

class SyncArModels extends Command
{
    /**
     * Command name.
     */
    protected $signature = 'ar:sync';

    /**
     * Command description.
     */
    protected $description =
        'Sync equipment Reality AR models from GitHub Release to local public storage';


    public function handle(): int
    {
        $this->info('Starting AR model sync...');


        // =========================================
        // LOCAL AR DIRECTORY
        // =========================================

        $directory =
            public_path(
                'uploads/reality'
            );


        if (!is_dir($directory)) {

            mkdir(
                $directory,
                0775,
                true
            );
        }


        // =========================================
        // LOAD EQUIPMENT WITH AR MODEL
        // =========================================

        $equipments =
            Equipment::query()
                ->whereNotNull('model_file')
                ->where(
                    'model_file',
                    '!=',
                    ''
                )
                ->get([
                    'id',
                    'name',
                    'model_file',
                ]);


        if ($equipments->isEmpty()) {

            $this->info(
                'No AR models found.'
            );

            return self::SUCCESS;
        }


        $client =
            new Client([
                'connect_timeout' => 30,
                'timeout' => 900,
                'http_errors' => false,
                'allow_redirects' => true,
            ]);


        $success = 0;
        $skipped = 0;
        $failed = 0;


        foreach ($equipments as $equipment) {

            $modelValue =
                trim(
                    $equipment->model_file
                );


            // =========================================
            // NEW DATA = FULL GITHUB URL
            // =========================================

            if (
                str_starts_with(
                    $modelValue,
                    'http://'
                )
                ||
                str_starts_with(
                    $modelValue,
                    'https://'
                )
            ) {

                $modelUrl =
                    $modelValue;


                $path =
                    parse_url(
                        $modelUrl,
                        PHP_URL_PATH
                    );


                $fileName =
                    basename(
                        $path
                    );

            } else {

                // =====================================
                // LEGACY DATA = FILE NAME ONLY
                // =====================================

                $fileName =
                    basename(
                        $modelValue
                    );


                $owner =
                    config(
                        'services.github_ar.owner'
                    );


                $repo =
                    config(
                        'services.github_ar.repo'
                    );


                if (!$owner || !$repo) {

                    $this->error(
                        "Equipment {$equipment->id}: GitHub configuration missing."
                    );

                    $failed++;

                    continue;
                }


                $modelUrl =
                    "https://github.com/{$owner}/{$repo}/releases/latest/download/"
                    .
                    rawurlencode(
                        $fileName
                    );
            }


            // =========================================
            // SECURITY CHECK
            // =========================================

            if (
                !str_ends_with(
                    strtolower($fileName),
                    '.reality'
                )
            ) {

                $this->warn(
                    "Equipment {$equipment->id}: skipped non-Reality file."
                );

                $failed++;

                continue;
            }


            $destination =
                $directory .
                DIRECTORY_SEPARATOR .
                $fileName;


            // =========================================
            // ALREADY DOWNLOADED
            // =========================================

            if (
                file_exists($destination)
                &&
                filesize($destination) > 1024
            ) {

                $this->line(
                    "Already exists: {$fileName}"
                );

                $skipped++;

                continue;
            }


            // Temporary file prevents partially
            // downloaded files being served.
            $temporary =
                $destination .
                '.download';


            try {

                if (file_exists($temporary)) {
                    unlink($temporary);
                }


                $this->info(
                    "Downloading: {$fileName}"
                );


                // =====================================
                // STREAM DIRECTLY TO DISK
                // =====================================

                $response =
                    $client->request(
                        'GET',
                        $modelUrl,
                        [
                            'sink' =>
                                $temporary,
                        ]
                    );


                $status =
                    $response
                        ->getStatusCode();


                if ($status !== 200) {

                    if (file_exists($temporary)) {
                        unlink($temporary);
                    }


                    $this->error(
                        "Failed {$fileName} (HTTP {$status})"
                    );

                    $failed++;

                    continue;
                }


                if (
                    !file_exists($temporary)
                    ||
                    filesize($temporary) <= 1024
                ) {

                    if (file_exists($temporary)) {
                        unlink($temporary);
                    }


                    $this->error(
                        "Invalid download: {$fileName}"
                    );

                    $failed++;

                    continue;
                }


                // Atomic final rename
                rename(
                    $temporary,
                    $destination
                );


                $sizeMb =
                    round(
                        filesize($destination)
                        / 1024
                        / 1024,
                        2
                    );


                $this->info(
                    "Synced {$fileName} ({$sizeMb} MB)"
                );


                $success++;


            } catch (Throwable $e) {

                if (file_exists($temporary)) {
                    @unlink($temporary);
                }


                $this->error(
                    "Equipment {$equipment->id}: {$e->getMessage()}"
                );


                $failed++;
            }
        }


        $this->newLine();


        $this->info(
            "AR sync complete. Synced: {$success}, Existing: {$skipped}, Failed: {$failed}"
        );


        // Do not prevent Apache starting if one
        // old/broken model fails to download.
        return self::SUCCESS;
    }
}