<?php

declare(strict_types=1);

/**
 * echo string with using usleep
 *
 * @param string $string
 * @param integer $usleepTime
 * @return void
 */
function echoWithPseudoloading(string $string, $usleepTime = 10000): void
{
    foreach (str_split($string) as $letter) {
        echo $letter;
        usleep($usleepTime);
    }
}
