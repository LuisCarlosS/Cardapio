<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class initUsuario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:init-project {user} {pass}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Iniciar o projeto de cardápio e criar o usuario ADMIN inicial';

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
    {
        $email = $this->argument("user");
        $senha = $this->argument("pass");

        echo "Command iniciando";
        echo "\nCadastrando o usuario " . $email . " no banco de dados";
        
        try{
            $dbUser = \App\Models\usuario::where("email", $email)->first();
            if($dbUser){
                throw new \Exception("E-mail já cadastrado no banco de dados");
            }

            $dbUser = new \App\Models\usuario();
            $dbUser->email = $email;
            $dbUser->senha = \Hash::make($senha);

            $dbUser->save();
            echo "\n\nUsuario inserido com sucesso!";
        
        }catch(\Exception $e){
            \Log::error("ERRO COMMAND InitUsuario", [ $e->getMessage()]);
            echo "\n\nErro no command";
        }
        
        return 0;
    }
}
