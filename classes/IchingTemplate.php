<?php

namespace classes;

use App\FortuneTeller\FortuneTeller;

class IchingTemplate
{
    private array $hexagrames = [];

    public function __construct()
    {
        $this->hexagrames = (new FortuneTeller())->index();

        wp_enqueue_script(
            'iching',
            ICHING_ASSETS_URL . '/js/main.js',
            ['jquery'],
            '1.0.0',
            [
                'strategy'  => 'defer',
                'in_footer' => true,
            ]
        );
        wp_localize_script(
            'iching',
            'my_ajax_obj',
            [
                'ajax_url' => admin_url('admin-ajax.php'),
                'nonce'    => wp_create_nonce('title_example'),
            ]
        );
   }

    public function getTemplate(): string
    {
        $primHex = $this->hexagrames['primaryHexagram'];
        $primData = !empty($this->hexagrames['primaryHexagramData']) ? $this->hexagrames['primaryHexagramData'] : [];
        $primName = !empty($primData['name']) ? $primData['name'] : '';
        $primDesc = !empty($primData['description']) ? $primData['description'] : '';
        $primKeys = !empty($primData['keywords']) ? $primData['keywords'] : '';
        $primMeaning = !empty($primData['interpretation']) ? $primData['interpretation'] : '';
        $primWorlds = !empty($primData['worlds']) ? $primData['worlds'] : '';
        $primPotential = !empty($primData['potential']) ? $primData['potential'] : '';

        $secondHex = $this->hexagrames['secondaryHexagram'] ?: '';
        $secondData = !empty($this->hexagrames['secondaryHexagramData'])
            ? $this->hexagrames['secondaryHexagramData']
            : [];
        $secondName = !empty($secondData['name']) ? $secondData['name'] : '';
        $secondDesc = !empty($secondData['description']) ? $secondData['description'] : '';
        $secondKeys = !empty($secondData['keywords']) ? $secondData['keywords'] : '';
        $secondMeaning = !empty($secondData['interpretation']) ? $secondData['interpretation'] : '';
        $secondWorlds = !empty($secondData['worlds']) ? $secondData['worlds'] : '';
        $secondPotential = !empty($secondData['potential']) ? $secondData['potential'] : '';


        $primHtml = '<h3>Ваше передбачення</h3>';
        $primHtml .= '<h4>Початкова гексаграма: ' . $primHex . ' ' . $primName . '</h4>';

        if(empty($primData)) {
            $primHtml .= '<p>На жаль, зараз немає тлумачення для цієї гексаграми ' . $primHex . '</p>';
        } else {
            $primHtml = $this->getHexHtml(
                $primDesc,
                $primHtml,
                $primKeys,
                $primMeaning,
                $primWorlds,
                $primPotential
            );
        }

        $secondHtml = '<h4>Фонова (вторинна) гексаграма: Іцзнь не бачить її для вас</h4>';

        if($secondData) {
            $secondHtml = '<h4>Фонова (вторинна) гексаграма: ' . $secondHex . ' ' . $secondName . '</h4>';
        }

        if(empty($secondData)) {
            $secondHtml .= '<p>На жаль, зараз немає тлумачення для цієї гексаграми ' . $secondHex . '</p>';
        } else {
            $secondHtml = $this->getHexHtml(
                $secondDesc,
                $secondHtml,
                $secondKeys,
                $secondMeaning,
                $secondWorlds,
                $secondPotential
            );
        }

        $button = '<div id="iching-button-wrapper"><button id="iching-button">Запитати Іцзін</button></div>';
        $divinationWrapper = '<div id="iching-diviation" class="iching-diviation"></div>';


        return $divinationWrapper . $button . $primHtml . $secondHtml;
    }

    /**
     * @param string $desc
     * @param string $html
     * @param string $keys
     * @param string $meaning
     * @param string $worlds
     * @param string $potential
     *
     * @return string
     */
    private function getHexHtml(
        string $desc,
        string $html,
        string $keys,
        string $meaning,
        string $worlds,
        string $potential
    ): string {
        $html .= '<p>Опис гексаграми: ' . $desc . '</p>';
        $html .= '<p>Ключі: ' . $keys . '</p>';
        $html .= '<p>Передбачення: ' . $meaning . '</p>';
        $html .= '<p>Енергія світів: ' . $worlds . '</p>';
        $html .= '<p>Потенція: ' . $potential . '</p>';

        return $html;
    }
}
