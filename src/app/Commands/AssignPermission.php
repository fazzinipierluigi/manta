<?php

namespace fazzinipierluigi\manta\Commands;

use Illuminate\Console\Command;

class AssignPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:assign {key : La chiave del permesso} {role : Lo slug del ruolo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assegna un permesso a un ruolo';

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
		$key = trim($this->argument('key'));
		$role_slug = trim($this->argument('role'));

		if(!empty($key))
		{
			$permission = \App\Permission::where('key', '=', $key)->first();
			if(!empty($permission))
			{
				if(!empty($role_slug))
				{
					$role = \App\Role::where('slug', '=', $role_slug)->first();
					if(!empty($role))
					{
						if(\App\PermissionRole::where('permission_id', '=', $permission->id)->where('role_id', '=', $role->id)->count() == 0)
						{
							$relationship = new \App\PermissionRole();
							$relationship->permission_id = $permission->id;
							$relationship->role_id = $role->id;
							$relationship->save();

							$this->info('Il permesso ['.$permission->key.'] e il ruolo ['.$role->slug.'] sono stati associati con successo');
						}
						else
						{
							$this->error('Il permesso ['.$permission->key.'] e il ruolo ['.$role->slug.'] sono già associati');
						}
					}
					else
					{
						$this->error('Ruolo inesistente');
					}
				}
				else
				{
					$this->error('Slug ruolo vuoto');
				}
			}
			else
			{
				$this->error('Permesso inesistente');
			}
		}
		else
		{
			$this->error('Chiave permesso vuota');
		}

		$this->line('');
    }
}
