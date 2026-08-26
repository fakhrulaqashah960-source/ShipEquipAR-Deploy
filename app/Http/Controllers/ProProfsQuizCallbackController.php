<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ProProfsQuizCallbackController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        /*
        |--------------------------------------------------------------------------
        | READ PROPROFS PAYLOAD
        |--------------------------------------------------------------------------
        |
        | Supports both JSON and normal REQUEST / form payloads.
        |
        */

        $payload = $request->isJson()
            ? $request->json()->all()
            : $request->all();


        /*
        |--------------------------------------------------------------------------
        | VERIFY NOTIFICATION TOKEN
        |--------------------------------------------------------------------------
        */

        $expectedToken = trim(
            (string) config(
                'services.proprofs.notification_token',
                ''
            )
        );

        $receivedToken = trim(
            (string) ($payload['token'] ?? '')
        );

        if (
            $expectedToken === ''
            || $receivedToken === ''
            || ! hash_equals(
                $expectedToken,
                $receivedToken
            )
        ) {
            return response()->json(
                [
                    'ok' => false,
                    'message' => 'Invalid notification token.',
                ],
                401
            );
        }


        /*
        |--------------------------------------------------------------------------
        | REQUIRED RESULT ID
        |--------------------------------------------------------------------------
        */

        $resultId = trim(
            (string) ($payload['result_id'] ?? '')
        );

        if ($resultId === '') {
            return response()->json(
                [
                    'ok' => false,
                    'message' => 'result_id is required.',
                ],
                422
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PROPROFS USER DETAILS
        |--------------------------------------------------------------------------
        */

        $proProfsUserId = trim(
            (string) (
                $payload['user_Id']
                ?? $payload['user_id']
                ?? ''
            )
        );

        $email = trim(
            (string) (
                $payload['user_Email']
                ?? $payload['user_email']
                ?? ''
            )
        );


        /*
        |--------------------------------------------------------------------------
        | MATCH TO SHIPEQUIPAR USER
        |--------------------------------------------------------------------------
        |
        | First try the Laravel user ID passed into the ProProfs iframe.
        | If that is unavailable, fall back to the user's email address.
        |
        */

        $user = null;

        if (
            $proProfsUserId !== ''
            && ctype_digit($proProfsUserId)
        ) {
            $user = User::find(
                (int) $proProfsUserId
            );
        }

        if (
            ! $user
            && $email !== ''
        ) {
            $user = User::where(
                'email',
                $email
            )->first();
        }


        /*
        |--------------------------------------------------------------------------
        | ATTEMPT DATE
        |--------------------------------------------------------------------------
        */

        $attemptedAt = $this->parseAttemptDate(
            $payload['attempt_date']
            ?? $payload['attempted_at']
            ?? null
        );


        /*
        |--------------------------------------------------------------------------
        | STORE / UPDATE QUIZ ATTEMPT
        |--------------------------------------------------------------------------
        |
        | result_id is unique, so receiving the same ProProfs notification
        | again updates the existing row instead of creating a duplicate.
        |
        */

        QuizAttempt::updateOrCreate(
            [
                'result_id' => $resultId,
            ],
            [
                'user_id' => $user?->id,

                'quiz_id' => $this->nullableString(
                    $payload['quiz_id'] ?? null
                ),

                'quiz_name' => $this->nullableString(
                    $payload['quiz_name']
                    ?? $payload['quiz_title']
                    ?? null
                ),

                'proprofs_user_id' => $this->nullableString(
                    $proProfsUserId
                ),

                'user_name' => $this->nullableString(
                    $payload['user_name']
                    ?? $user?->name
                ),

                'user_email' => $this->nullableString(
                    $email !== ''
                        ? $email
                        : $user?->email
                ),

                'total_marks' => $this->nullableInteger(
                    $payload['total_marks'] ?? null
                ),

                'obtained_marks' => $this->nullableInteger(
                    $payload['user_obtained_marks']
                    ?? $payload['obtained_marks']
                    ?? null
                ),

                'percent_marks' => $this->nullableFloat(
                    $payload['user_percent_marks']
                    ?? $payload['percent_marks']
                    ?? null
                ),

                'total_correct' => $this->nullableInteger(
                    $payload['user_totalcorrect_answers']
                    ?? $payload['total_correct']
                    ?? null
                ),

                'total_wrong' => $this->nullableInteger(
                    $payload['user_totalwrong_answers']
                    ?? $payload['user_totalwrong_answer']
                    ?? $payload['total_wrong']
                    ?? null
                ),

                'total_unanswered' => $this->nullableInteger(
                    $payload['user_total_unanswered']
                    ?? $payload['total_unanswered']
                    ?? null
                ),

                'time_taken' => $this->nullableString(
                    $payload['time_taken'] ?? null
                ),

                'time_taken_in_sec' => $this->nullableInteger(
                    $payload['time_taken_in_sec'] ?? null
                ),

                'min_pass_marks' => $this->nullableInteger(
                    $payload['min_pass_marks'] ?? null
                ),

                'attempted_at' => $attemptedAt,

                'raw_payload' => $payload,
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | SUCCESS
        |--------------------------------------------------------------------------
        */

        return response()->json(
            [
                'ok' => true,
                'message' => 'Quiz attempt stored.',
            ]
        );
    }


    private function parseAttemptDate(
        mixed $value
    ): ?Carbon {
        if (
            $value === null
            || $value === ''
        ) {
            return null;
        }

        try {
            if (is_numeric($value)) {
                return Carbon::createFromTimestamp(
                    (int) $value
                );
            }

            return Carbon::parse(
                (string) $value
            );
        } catch (Throwable) {
            return null;
        }
    }


    private function nullableString(
        mixed $value
    ): ?string {
        if (
            $value === null
            || $value === ''
        ) {
            return null;
        }

        $value = trim(
            (string) $value
        );

        return $value === ''
            ? null
            : $value;
    }


    private function nullableInteger(
        mixed $value
    ): ?int {
        if (
            $value === null
            || $value === ''
        ) {
            return null;
        }

        return (int) $value;
    }


    private function nullableFloat(
        mixed $value
    ): ?float {
        if (
            $value === null
            || $value === ''
        ) {
            return null;
        }

        return (float) $value;
    }
}
