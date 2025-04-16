<?php

namespace App\Exceptions;

use App\Models\ErrorLog; // Uvozite model za zapisovanje napak
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log; // Za logiranje napak pri zapisovanju v bazo
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            $this->logErrorToDatabase($e);
        });
    }

    /**
     * Custom method to log error details to the database.
     *
     * @param Throwable $e
     * @return void
     */
    protected function logErrorToDatabase(Throwable $e)
    {
        try {
            // Preprečimo neskončne napake znotraj PDOException ali če baza ne deluje
            if (app()->runningInConsole() || $this->isDatabaseConnectionException($e)) {
                return;
            }

            ErrorLog::create([
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'error_url' => request()->fullUrl(),
                'user_email' => auth()->check() ? auth()->user()->email : null,
            ]);
        } catch (Throwable $dbException) {
            // Logirajte napako pri zapisovanju v bazo, da preprečimo izgubo informacij
            Log::error('Failed to log error to database: ' . $dbException->getMessage());
        }
    }

    /**
     * Check if the exception is related to database connection issues.
     *
     * @param Throwable $e
     * @return bool
     */
    protected function isDatabaseConnectionException(Throwable $e): bool
    {
        return $e instanceof \PDOException || strpos($e->getMessage(), 'SQLSTATE') !== false;
    }
}
