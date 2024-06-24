<?php

namespace classes;

use App\Divination;
use Exception;

class IchingPlugin
{
    public function init(): void
    {
        require_once __DIR__ . '/core/vendor/autoload.php';
        require_once __DIR__ . '/Ajax.php';

        add_action('wp_enqueue_scripts', [$this, 'load_assets']);
        $this->create_shortcode();
        (new Ajax())->setAjaxAction();
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

    public function load_assets(): void
    {
        wp_register_style('iching', ICHING_ASSETS_URL . '/styles/style.css');

        wp_register_script(
            'iching',
            ICHING_ASSETS_URL . '/js/main.js',
            ['jquery'],
            '1.0.0',
            [
                'in_footer' => true,
            ]
        );

        $data = [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('title_example'),
        ];

        wp_localize_script(
            'iching',
            'iching_ajax',
            $data
        );

        wp_enqueue_style('iching');
        wp_enqueue_script('jquery');
        wp_enqueue_script('iching');
    }
}
