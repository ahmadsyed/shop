<?php

namespace App\Console\Commands;
use App\Http\Models\Router;

use Illuminate\Console\Command;

class AddRoutersViaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'router:add'; 

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new unique routers';

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
     * @return int
     */
    public function handle()
    {   //ask for number of records to be inserted in console
        $n = $this->ask('How many records you want to be added');
        //prepare array with Unique value
        $dataToInsert = [];
        for($i=0;$i<=n;$i++){
            $random_mac = implode(':', str_split(substr(md5(mt_rand()), 0, 12), 2));
            $random_host = implode(':', str_split(substr(md5(mt_rand()), 0, 8), 2));
            $random_sap_id = implode(':', str_split(substr(md5(mt_rand()), 0, 8), 2));
            $random_loop_back = implode(':', str_split(substr(md5(mt_rand()), 0, 12), 2));
            $data = ['mac_address'=>$random_mac,'host'=>$random_host,'sapid'=>$random_sap_id,'loopback'=>$random_loop_back];
            $dataToInsert = $data; //appent all entries into insert array;
        }
        Router::insert($dataToInsert);
        echo 'entries added successfully';
    }
}
