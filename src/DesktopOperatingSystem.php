<?php

namespace YusamHub\DeviceDetectExt;

class DesktopOperatingSystem
{
    protected static string $desktopBlackList = '/((aarch)+[0-9])/i';

    protected static array $desktopOperatingSystems = array(
        'FBW.+FBSV/(\d+[\.\d]*);'                                                                                                                                                                           => 'Windows',
        'Windows.+OS: (\d+[\.\d]*)'                                                                                                                                                                         => 'Windows',
        'Windows;(\d+[\.\d]*);'                                                                                                                                                                             => 'Windows',
        'mingw32|winhttp'                                                                                                                                                                                   => 'Windows',
        '(?:Windows(?:-Update-Agent)?|Microsoft-(?:CryptoAPI|Delivery-Optimization|WebDAV-MiniRedir|WNS)|WINDOWS_64)/(\d+\.\d+)'                                                                            => 'Windows',
        'CYGWIN_NT-10.0|Windows NT 10.0|Windows 10'                                                                                                                                                         => 'Windows',
        'CYGWIN_NT-6.4|Windows NT 6.4|Windows 10|win10'                                                                                                                                                     => 'Windows',
        'CYGWIN_NT-6.3|Windows NT 6.3|Windows 8.1'                                                                                                                                                          => 'Windows',
        'CYGWIN_NT-6.2|Windows NT 6.2|Windows 8'                                                                                                                                                            => 'Windows',
        'CYGWIN_NT-6.1|Windows NT 6.1|Windows 7|win7|Windows \(6.1'                                                                                                                                         => 'Windows',
        'CYGWIN_NT-6.0|Windows NT 6.0|Windows Vista'                                                                                                                                                        => 'Windows',
        'CYGWIN_NT-5.2|Windows NT 5.2|Windows Server 2003 / XP x64'                                                                                                                                         => 'Windows',
        'CYGWIN_NT-5.1|Windows NT 5.1|Windows XP'                                                                                                                                                           => 'Windows',
        'CYGWIN_NT-5.0|Windows NT 5.0|Windows 2000'                                                                                                                                                         => 'Windows',
        'CYGWIN_NT-4.0|Windows NT 4.0|WinNT|Windows NT'                                                                                                                                                     => 'Windows',
        'CYGWIN_ME-4.90|Win 9x 4.90|Windows ME'                                                                                                                                                             => 'Windows',
        'CYGWIN_98-4.10|Win98|Windows 98'                                                                                                                                                                   => 'Windows',
        'CYGWIN_95-4.0|Win32|Win95|Windows 95|Windows_95'                                                                                                                                                   => 'Windows',
        'Windows 3.1'                                                                                                                                                                                       => 'Windows',
        'Windows|.+win32|Win64|MSDW|HandBrake Win Upd|Microsoft BITS'                                                                                                                                       => 'Windows',
        'OS/Microsoft_Windows_NT_(\d+\.\d+)'                                                                                                                                                                => 'Windows',
        'OS/CFNetwork/.+ Darwin/(?:[\d\.]+).+(?:x86_64|i386|Power%20Macintosh)|(?:x86_64-apple-)?darwin(?:[\d\.]+)|PowerMac|com.apple.Safari.SearchHelper'                                                  => 'Mac',
        'Macintosh;Mac OS X \((\d+[\.\d]+)\);'                                                                                                                                                              => 'Mac',
        'Mac[ +]OS[ +]?X(?:[ /,](?:Version )?(\d+(?:[_\.]\d+)+))?'                                                                                                                                          => 'Mac',
        'Mac (?:OS/)?(\d+(?:[_\.]\d+)+)'                                                                                                                                                                    => 'Mac',
        '(?:macOS[ /,]|Mac-)(\d+[\.\d]+)'                                                                                                                                                                   => 'Mac',
        'Macintosh; OS X (\d+[\.\d]+)'                                                                                                                                                                      => 'Mac',
        'Darwin|Macintosh|Mac_PowerPC|PPC|Mac PowerPC|iMac|MacBook|macOS|AppleExchangeWebServices|com.apple.trustd|Sonos/.+\(MDCR_'                                                                         => 'Mac',
        'Linux(?:OS)?[^a-z]|Cinnamon/(?:\d+[\.\d]+)|.+(?:pc|unknown)-linux-gnu'                                                                                                                             => 'Linux',
        'Linux/(\d+[\.\d]+)'                                                                                                                                                                                => 'Linux',
        'Linspire'                                                                                                                                                                                          => 'Linspire',
        'LindowsOS'                                                                                                                                                                                         => 'LindowsOS',
        'Zenwalk GNU Linux'                                                                                                                                                                                 => 'Zenwalk GNU Linux',
        'Linux.+kanotix'                                                                                                                                                                                    => 'kanotix',
        'moonOS/(\d+.[\d.]+)'                                                                                                                                                                               => 'moonOS',
        'Foresight Linux'                                                                                                                                                                                   => 'Foresight Linux',
        'Pardus/(\d+.[\d.]+)'                                                                                                                                                                               => 'Pardus',
        'Librem 5'                                                                                                                                                                                          => 'Librem 5',
        'uclient-fetch'                                                                                                                                                                                     => 'uclient-fetch',
        'RokuOS/.+RokuOS (\d+.[\d.]+)'                                                                                                                                                                      => 'RokuOS',
        'Roku(?:OS|4640X)?/(?:DVP|Pluto)?-?(\d+[\.\d]+)?'                                                                                                                                                   => 'Roku',
        'dvkbuntu'                                                                                                                                                                                          => 'dvkbuntu',
        'Helio/(\d+[\.\d]+)'                                                                                                                                                                                => 'Helio',
        'HasCodingOs (\d+[\.\d]+)'                                                                                                                                                                          => 'HasCodingOs',
        'PCLinuxOS/(\d+[\.\d]+)'                                                                                                                                                                            => 'PCLinuxOS',
        '(Ordissimo|webissimo3)'                                                                                                                                                                            => 'Ordissimo',
        '(?:Win|Sistema )Fenix'                                                                                                                                                                             => 'Fenix',
        'TOS; Linux'                                                                                                                                                                                        => 'TOS',
        'Maemo'                                                                                                                                                                                             => 'Maemo',
        'Arch ?Linux(?:[ /\-](\d+[\.\d]+))?'                                                                                                                                                                => 'Arch Linux',
        'VectorLinux(?: package)?(?:[ /\-](\d+[\.\d]+))?'                                                                                                                                                   => 'VectorLinux',
        'CentOS Stream (\d)'                                                                                                                                                                                => 'CentOS Stream',
        '.+.el(\d+(?:[_\.]\d+)*).(?:centos|x86_64)'                                                                                                                                                         => 'CentOS',
        'CentOS Linux (\d)'                                                                                                                                                                                 => 'CentOS',
        'Fedora/.+.fc(\d+)'                                                                                                                                                                                 => 'Fedora',
        'Mandriva(?: Linux)?/.+mdv(\d+[\.\d]+)'                                                                                                                                                             => 'Mandriva',
        'Linux Mint/(\d)'                                                                                                                                                                                   => 'Mint',
        '(Debian|Knoppix|Mint(?! Browser)|Ubuntu|Kubuntu|Xubuntu|Lubuntu|Fedora|Red Hat|Mandriva|Gentoo|Sabayon|Slackware|SUSE|CentOS|BackTrack|Freebox)(?:(?: Enterprise)? Linux)?(?:[ /\-](\d+[\.\d]+))?' => 'Deepin',
        '.+redhat-linux-gnu'                                                                                                                                                                                => 'Red Hat',
        'OS ROSA; Linux'                                                                                                                                                                                    => 'Rosa',
    );

    public static function isDesktopOperatingSystem(string $userAgent): bool
    {
        foreach (self::$desktopOperatingSystems as $regex => $value) {
            $regex = '/(?:^|[^A-Z_-])(?:' . \str_replace('/', '\/', $regex) . ')/i';
            if (preg_match($regex, $userAgent)) {
                if(!preg_match(self::$desktopBlackList, $userAgent)){
                    return true;
                }
            }
        }
        return false;
    }
}