<?php

/**
 * PHP Server Monitor
 * Monitor your servers and websites.
 *
 * This file is part of PHP Server Monitor.
 * PHP Server Monitor is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * PHP Server Monitor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with PHP Server Monitor.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package     phpservermon
 * @author      Ward Pieters <ward@wardpieters.nl>
 * @copyright   Copyright (c) 2008-2017 Pepijn Over <pep@mailbox.org>
 * @license     http://www.gnu.org/licenses/gpl.txt GNU GPL v3
 * @version     Release: v3.5.2
 * @link        http://www.phpservermonitor.org/
 **/

namespace psm\Txtmsg;
class SlackNotify extends Core
{
    
    /**
     * Send sms using the FreeMobileSMS API
     *
     * @var string $message
     *
     * @var resource $curl
     * @var string $err
     * @var int $success
     * @var string $error
     * @var string $http_code
     *
     * @return bool|string
     */
    
    public function sendSMS($message)
    {
        $success = 1;
        $error = "";
        $url='https://hooks.slack.com/services/************';
        $data = array(
            "text" => $message
        );
        $ch = curl_init( $url );
        # Setup request to send json via POST.
        $payload = json_encode($data);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        # Send request.
        $result = curl_exec($ch);
        curl_close($ch);
        return $success;
    }
}
