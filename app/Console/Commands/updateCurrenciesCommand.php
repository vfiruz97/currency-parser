<?php
/**
 *
 * PHP version >= 7.0
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */

namespace App\Console\Commands;


use App\Currency;

use Exception;
use Illuminate\Console\Command;



/**
 * Class deletePostsCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class UpdateCurrenciesCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "update:currencies";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Updated all currencies";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $currencies = new Currency();
            $currencies->updateCurrencies();
            $this->info("All currencies also Updated");
        } catch (Exception $e) {
            $this->error("An error occurred");
        }
    }
}