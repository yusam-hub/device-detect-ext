<?php

namespace YusamHub\DeviceDetectExt\Tests;

use YusamHub\DeviceDetectExt\DesktopOperatingSystem;
use YusamHub\DeviceDetectExt\DeviceDetectExt;

class ExampleTest extends \PHPUnit\Framework\TestCase
{
    public function testMobileDetect()
    {
        echo __METHOD__ . PHP_EOL;
        $microTimeStart = microtime(true);
        $data = $this->dataProvider();
        foreach($data as $k => $items) {
            $userAgent = $items[0];
            $deviceDetectExt = new DeviceDetectExt($userAgent);
            $this->assertTrue($items[1]['mobile'] == $deviceDetectExt->mobileDetect()->isMobile(), $k);
            $this->assertTrue($items[1]['tablet'] == $deviceDetectExt->mobileDetect()->isTablet(), $k);
        }
        echo (float) (microtime(true) - $microTimeStart) . PHP_EOL;
    }

    public function testDefault()
    {
        echo __METHOD__ . PHP_EOL;
        $microTimeStart = microtime(true);
        $data = $this->dataProvider();
        foreach($data as $k => $items) {
            $userAgent = $items[0];

            $deviceDetectExt = new DeviceDetectExt($userAgent);
            $deviceDetectExt->deviceDetector()->parse();
            $this->assertTrue($items[1]['desktop'] == $deviceDetectExt->deviceDetector()->isDesktop());
            $this->assertTrue($items[1]['mobile'] == $deviceDetectExt->deviceDetector()->isMobile());
            $this->assertTrue($items[1]['tablet'] == $deviceDetectExt->deviceDetector()->isTablet());
        }
        echo (float) (microtime(true) - $microTimeStart) . PHP_EOL;
    }

    protected function dataProvider(): array
    {
        return [
            'Linux'   => [
                'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36',
                ['mobile' => false, 'tablet' => false, 'desktop' => true]
            ],
            'Windows' => [
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36',
                ['mobile' => false, 'tablet' => false, 'desktop' => true]
            ],
            'Mac' => [
                'Mozilla/5.0 (Macintosh; Intel Mac OS X x.y; rv:42.0) Gecko/20100101 Firefox/43.4',
                ['mobile' => false, 'tablet' => false, 'desktop' => true]
            ],
            'iPhone'  => [
                'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1',
                ['mobile' => true, 'tablet' => false, 'desktop' => false]
            ],
            'Ipad'    => [
                'Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1',
                ['mobile' => true, 'tablet' => true, 'desktop' => false]
            ],
            'Android' => [
                'Mozilla/5.0 (Linux; Android 9.0; SAMSUNG SM-F900U Build/PPR1.180610.011) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Mobile Safari/537.36',
                ['mobile' => true, 'tablet' => false, 'desktop' => false]
            ],
            'trash UA' => [
                'test',
                ['mobile' => false, 'tablet' => false, 'desktop' => false]
            ],
            'empty' => [
                '',
                ['mobile' => false, 'tablet' => false, 'desktop' => false]
            ],
            'null' => [
                null,
                ['mobile' => false, 'tablet' => false, 'desktop' => false]
            ],
        ];
    }
}