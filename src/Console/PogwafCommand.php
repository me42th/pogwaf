<?php

namespace Me42th\Pogwaf\Console;
use Illuminate\Console\Command;

class PogwafCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pogwaf:apply';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the pogwaf protection';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $index = ['public/index.php',file_get_contents('public/index.php')];
        $index[1] = str_replace("<?php\nrequire 'pogwaf.php';","<?php",$index[1]);
        $index[1] = str_replace("<?php","<?php\nrequire 'pogwaf.php';",$index[1]);
        file_put_contents(...$index);

        $block_patterns = config('pogwaf.block_patterns');
        $block_patterns = implode("',\n\t'",$block_patterns);
        $block_patterns = "\t'$block_patterns'";

        $free_patterns = config('pogwaf.free_patterns');
        $free_patterns = implode("',\n\t'",$free_patterns);
        $free_patterns = "\t'$free_patterns'";

        $pogwaf = ['public/pogwaf.php',file_get_contents("vendor/me42th/pogwaf/stubs/waf.pog.custom.stub")];
        $pogwaf[1] = str_replace('{BLOCK_PATTERNS}',$block_patterns,$pogwaf[1]);
        $pogwaf[1] = str_replace('{FREE_PATTERNS}',$free_patterns,$pogwaf[1]);
        file_put_contents(...$pogwaf);
        $this->info('Pogwaf was installed, we edited your index.php and created pogwaf.php to block requests before Laravel wakeup');
    }
}
