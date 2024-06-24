<?php

namespace classes;

use App\FortuneTeller\FortuneTeller;
use Iching\AjaxHandler;

class IchingTemplate
{
//    private array $hexagrames = [];

//    public function __construct()
//    {
//        $this->hexagrames = (new FortuneTeller())->index();
//   }

    public function getTemplate(): string
    {
//        $primHex = $this->hexagrames['primaryHexagram'];
//        $primData = !empty($this->hexagrames['primaryHexagramData']) ? $this->hexagrames['primaryHexagramData'] : [];
//        $primName = !empty($primData['name']) ? $primData['name'] : '';
//        $primDesc = !empty($primData['description']) ? $primData['description'] : '';
//        $primKeys = !empty($primData['keywords']) ? $primData['keywords'] : '';
//        $primMeaning = !empty($primData['interpretation']) ? $primData['interpretation'] : '';
//        $primWorlds = !empty($primData['worlds']) ? $primData['worlds'] : '';
//        $primPotential = !empty($primData['potential']) ? $primData['potential'] : '';
//
//        $secondHex = $this->hexagrames['secondaryHexagram'] ?: '';
//        $secondData = !empty($this->hexagrames['secondaryHexagramData'])
//            ? $this->hexagrames['secondaryHexagramData']
//            : [];
//        $secondName = !empty($secondData['name']) ? $secondData['name'] : '';
//        $secondDesc = !empty($secondData['description']) ? $secondData['description'] : '';
//        $secondKeys = !empty($secondData['keywords']) ? $secondData['keywords'] : '';
//        $secondMeaning = !empty($secondData['interpretation']) ? $secondData['interpretation'] : '';
//        $secondWorlds = !empty($secondData['worlds']) ? $secondData['worlds'] : '';
//        $secondPotential = !empty($secondData['potential']) ? $secondData['potential'] : '';

//
//        $primHtml = '<h3>Ваше передбачення</h3>';
//        $primHtml .= '<h4>Початкова гексаграма: ' . $primHex . ' ' . $primName . '</h4>';

//        if(empty($primData)) {
//            $primHtml .= '<p>На жаль, зараз немає тлумачення для цієї гексаграми ' . $primHex . '</p>';
//        } else {
//            $primHtml = $this->getHexHtml(
//                $primDesc,
//                $primHtml,
//                $primKeys,
//                $primMeaning,
//                $primWorlds,
//                $primPotential
//            );
//        }

//        $secondHtml = '<h4>Фонова (вторинна) гексаграма: Іцзнь не бачить її для вас</h4>';
//
//        if($secondData) {
//            $secondHtml = '<h4>Фонова (вторинна) гексаграма: ' . $secondHex . ' ' . $secondName . '</h4>';
//        }

//        if(empty($secondData)) {
//            $secondHtml .= '<p>На жаль, зараз немає тлумачення для цієї гексаграми ' . $secondHex . '</p>';
//        } else {
//            $secondHtml = $this->getHexHtml(
//                $secondDesc,
//                $secondHtml,
//                $secondKeys,
//                $secondMeaning,
//                $secondWorlds,
//                $secondPotential
//            );
//        }

        $permalink = get_the_permalink();

        $ask_button = '<div class="iching-button-wrapper"><button id="iching-button" class="iching-buttons">Отримати передбачення</button></div>';
        $again_button = '<div class="iching-button-wrapper"><a href="' . $permalink . '" id="iching-again-button" class="iching-buttons">Запитати І Цзін ще раз</a></div>';
        $divinationWrapper = '<div id="iching-divination" class="iching-divination"></div>';

        $output = sprintf(
            '<div class="iching">%s %s %s</div>',
            $ask_button,
            $divinationWrapper,
            $again_button
        );

        return $output;
    }

//    /**
//     * @param string $desc
//     * @param string $html
//     * @param string $keys
//     * @param string $meaning
//     * @param string $worlds
//     * @param string $potential
//     *
//     * @return string
//     */
//    private function getHexHtml(
//        string $desc,
//        string $html,
//        string $keys,
//        string $meaning,
//        string $worlds,
//        string $potential
//    ): string {
//        $html .= '<p>Опис гексаграми: ' . $desc . '</p>';
//        $html .= '<p>Ключі: ' . $keys . '</p>';
//        $html .= '<p>Передбачення: ' . $meaning . '</p>';
//        $html .= '<p>Енергія світів: ' . $worlds . '</p>';
//        $html .= '<p>Потенція: ' . $potential . '</p>';
//
//        return $html;
//    }
}
