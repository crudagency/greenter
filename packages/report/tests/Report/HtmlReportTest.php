<?php
/**
 * Created by PhpStorm.
 * User: Giansalex
 * Date: 17/09/2017
 * Time: 22:17
 */

namespace Tests\Greenter\Report;

/**
 * Trait HtmlReportTest
 * @package Tests\Greenter\Report
 */
class HtmlReportTest extends \PHPUnit_Framework_TestCase
{
    use HtmlReportTrait;

    public function testGenReport()
    {
        $report = $this->getReporter();
        $inv = $this->getInvoice();
        $report->setTemplate('invoice.html.twig');

        try {
            $html = $report->render($inv, $this->getParamters());
            $this->assertNotEmpty($html);
        } catch (\Exception $e) {
            echo $e->getMessage();
            $this->assertTrue(false);
        }
        // file_put_contents('file.html', $html);
    }

    private function getParamters()
    {
        $logo = file_get_contents(__DIR__.'/../Resources/logo.png');

        return [
            'system' => [
                'logo' => $logo,
            ],
            'user' => [
                'header' => 'Telf: <b>(056) 123375</b>'
            ]
        ];
    }
}