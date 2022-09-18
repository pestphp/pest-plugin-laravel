<?php

declare(strict_types=1);

namespace Pest\Laravel\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Pest\Console\Thanks;
use function Pest\testDirectory;
use Pest\TestSuite;

/**
 * @internal
 */
final class PestInstallCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'pest:install {--test-directory=tests : The name of the tests directory}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates Pest resources in your current PHPUnit test suite';

    /**
     * @var string
     */
    private const STUBS = 'stubs/Laravel';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        /** @var string $testDirectory */
        $testDirectory = $this->option('test-directory');

        TestSuite::getInstance(base_path(), $testDirectory);

        $pest = base_path(testDirectory('Pest.php'));

        if (File::exists($pest)) {
            $this->components->info('[tests/Pest.php] already exists.');
        } else {
            File::copy(implode(DIRECTORY_SEPARATOR, [
                dirname(__DIR__, 2),
                self::STUBS,
                'Pest.php',
            ]), $pest);

            $this->components->info('[tests/Pest.php] created successfully.');
        }

        if (! (bool) $this->option('no-interaction')) {
            (new Thanks($this->output))();
        }
    }
}
