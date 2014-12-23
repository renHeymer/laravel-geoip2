<?php
namespace Phirational\LaravelGeoIP2\Console;

use Illuminate\Console\Command;
use Illuminate\Config\Repository as Config;
use Phirational\LaravelGeoIP2\GeoIP2Update;

class UpdateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'geoip2:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update database files to the latest version';

    protected $geoIP2Update;

    /**
     * Create a new console command instance.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->geoIP2Update = new GeoIP2Update($config);

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->geoIP2Update->setOutput($this->output);

        if ($this->geoIP2Update->update()) {
            $this->info('Database files updated successfully!');
        }
    }
}