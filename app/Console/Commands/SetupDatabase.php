<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class SetupDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the database if it does not exist and run migrations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $database = config('database.connections.mysql.database');
        $host = config('database.connections.mysql.host');
        $port = config('database.connections.mysql.port');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');

        // Connect without database to create it
        Config::set('database.connections.mysql_no_db', [
            'driver' => 'mysql',
            'host' => $host,
            'port' => $port,
            'database' => '',
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
        ]);

        try {
            DB::connection('mysql_no_db')->statement(
                "CREATE DATABASE IF NOT EXISTS `{$database}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci"
            );
            $this->info("Database '{$database}' berhasil dibuat atau sudah ada.");
        } catch (\Exception $e) {
            $this->error("Gagal membuat database: " . $e->getMessage());
            return 1;
        }

        // Run migrations
        $this->info("Menjalankan migrasi...");
        $this->call('migrate', ['--force' => true]);

        $this->info("Setup database selesai!");
        return 0;
    }
}
