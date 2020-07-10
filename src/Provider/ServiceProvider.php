<?php

namespace Anomaly\Streams\Platform\Provider;

use Illuminate\Support\Traits\Macroable;
use Anomaly\Streams\Platform\Support\Traits\HasMemory;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersApi;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersAssets;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersRoutes;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersStreams;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersCommands;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersPolicies;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersListeners;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersProviders;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersSchedules;
use Anomaly\Streams\Platform\Provider\Concerns\RegistersMiddleware;

/**
 * Class ServiceProvider
 *
 * @link   http://pyrocms.com/
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    use Macroable;
    use HasMemory;

    // @todo Do we need this?
    use RegistersAssets;

    use RegistersRoutes;
    use RegistersCommands;
    use RegistersListeners;
    use RegistersMiddleware;
    
    // @todo this can be replaced with Streams::register
    //use RegistersStreams; 
    //use RegistersPolicies;
    //use RegistersProviders;
    //use RegistersSchedules;

    /**
     * Register common provisions.
     */
    protected function registerCommon()
    {
        //$this->registerAssets();
        $this->registerRoutes();
        //$this->registerStreams();
        $this->registerCommands();
        //$this->registerPolicies();
        $this->registerListeners();
        //$this->registerProviders();
        //$this->registerSchedules();
        $this->registerMiddleware();
    }
}
