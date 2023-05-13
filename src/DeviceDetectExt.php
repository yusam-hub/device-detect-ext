<?php

namespace YusamHub\DeviceDetectExt;

use Detection\MobileDetect;
use DeviceDetector\ClientHints;
use DeviceDetector\DeviceDetector;

class DeviceDetectExt
{
    protected string $userAgent;
    protected ?array $server;
    protected ?ClientHints $clientHints = null;
    protected DeviceDetector $deviceDetector;
    protected MobileDetect $mobileDetect;

    public function __construct(?string $userAgent, ?array $server = null)
    {
        $this->userAgent = (string) $userAgent;
        $this->server = $server;

        if (!is_null($this->server)) {
            $this->clientHints = ClientHints::factory($this->server);
        }

        $this->deviceDetector = new DeviceDetector($this->userAgent, $this->clientHints);
        $this->mobileDetect = new MobileDetect($this->server, $this->userAgent);
    }

    public function getUserAgent(): string
    {
        return $this->userAgent;
    }

    public function getServer(): ?array
    {
        return $this->server;
    }

    public function deviceDetector(): DeviceDetector
    {
        return $this->deviceDetector;
    }

    public function mobileDetect(): MobileDetect
    {
        return $this->mobileDetect;
    }

}