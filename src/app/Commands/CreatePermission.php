<?php

namespace fazzinipierluigi\manta\Commands;

use Illuminate\Console\Command;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create {key : La chiave del nuovo permesso} {name? : Il nome da visualizzare per il nuovo permesso}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea un nuovo permesso se inesistente';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$key = $this->argument('key');
    	if(!empty($key))
		{
			$key = strtolower($key);

			if(\App\Permission::where('key', '=', $key)->count() == 0)
			{
				$permission = new \App\Permission();
				$permission->key = $key;

				$name = trim($this->argument('name'));
				if(!empty($name))
					$permission->name = $name;

				$permission->save();

				$this->info('Creato il permesso ['.$key.']');
			}
			else
			{
				$this->error('Permesso già esistente');
			}
		}
    	else
		{
			$this->error('Chiave permeso mancante');
		}

    	$this->line('');
    }
}
