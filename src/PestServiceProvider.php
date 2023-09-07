<?php

declare(strict_types=1);

namespace Pest\Laravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Testing\TestResponse;
use Laravel\Dusk\Console\DuskCommand;
use Pest\Laravel\Commands\PestDatasetCommand;
use Pest\Laravel\Commands\PestDuskCommand;
use Pest\Laravel\Commands\PestTestCommand;
use Pest\Plugins\Snapshot;

final class PestServiceProvider extends ServiceProvider
{
    /**
     * Register Artisan Commands.
     */
    public function register(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                PestTestCommand::class,
                PestDatasetCommand::class,
            ]);

            if (class_exists(DuskCommand::class)) {
                $this->commands([
                    PestDuskCommand::class,
                ]);
            }
        }

        Snapshot::intercept(TestResponse::class, function (TestResponse $response): string {
            return $response->getContent();
        });

        Snapshot::macro('laravel.csrf', function (string $value) {
            return preg_replace('/name = "_token" value = "[0-9a-zA-Z]*"/', 'name = "_token" value = "..."', $value);
        });
    }
}
