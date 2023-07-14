<?php

namespace Util;

class Style
{
    public static function routeCssClass()
    {
        // echo $_SERVER['PHP_SELF'];
        $index = '/projects/hcdv-7/resource/view/index.php';
        $notification = '/projects/hcdv-7/resource/view/notification.php';
        $adminHome = '/projects/hcdv-7/resource/view/admin/home.php';
        $route = strtolower($_SERVER['PHP_SELF']);
        $isAdmin = str_contains($route, '/projects/hcdv-7/resource/view/admin/');
        if ($route === $index) {
            return "class='bg-green-300 bg-image-book font-serif'";
        } elseif ($route === $notification or $isAdmin) {
            $css = "class='relative h-screen font-sans bg-color-gradient";
            if ($isAdmin) {
                $css = $css . "-admin";
            }
            return $css . "'";
        } else {
            return "class='relative bg-color-gradient min-h-screen font-sans'";

            // 'relative bg-color-gradient h-screen bg-green-300 bg-image-book';
        }
    }
}
