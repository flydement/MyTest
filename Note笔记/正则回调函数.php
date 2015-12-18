<?php

        $htmlString = preg_replace_callback_array(
            [
                '/(href="?)(\S+)("?)/i' => function (&$matches) {
                    return $matches[1] . urldecode($matches[2]) . $matches[3];
                },
                '/(href="?\S+)(%24)(\S+)?"?/i' => function (&$matches) {
                    return urldecode($matches[1] . '$' . $matches[3]);
                }
            ],
            $htmlString
        );
?>