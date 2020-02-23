<?php

namespace Ghiffariaq\MiniACL\Console\Commands;

use Illuminate\Console\Command;
class AssignRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'assign:role {name} {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign Admin to Existing ID';

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
        $id = $this->argument('id');
        $name = $this->argument('name');
        $model = config('miniacl.user_model');
        if(class_exists($model)){
            $user = $model::find($id);
            if($user){
                $user->assign($name);
                $this->info('Succesfully assign ' .  $name .' to User ID ' . $user->id);
            } else{
                $this->info('User Not Found');
            }
        } else{
            $this->info('Model Not Found! Check Config File on /config/miniacl.php');
        }

        
    }
}
