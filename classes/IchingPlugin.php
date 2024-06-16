<?php

namespace classes;

use App\Divination;
use Exception;

class IchingPlugin
{
    public function init(): void
    {
        require_once __DIR__ . '/core/vendor/autoload.php';
        $this->create_shortcode();
    }

    public function create_shortcode(): void
    {
        add_shortcode(
            'iching_divination',
            [$this, 'iching_output']
        );
    }

    /**
     * @throws Exception
     */
    public static function iching_output()
    {
        require_once __DIR__ . '/IchingTemplate.php';

        return (new IchingTemplate())->getTemplate();
    }
}
