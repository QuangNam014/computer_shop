<?php

use App\Models\Admin;

if (!function_exists('getAvatarHeaderFromAdminTable')) {
    function getValueHeaderFromAdminTable($admin_id)
    {
        $admin = Admin::where('id', $admin_id)->first();
        if(!empty($admin->avatar)) {
            return $admin->avatar;
        } else {
            return "images/settingInforLogin/basic-avatar.jpg";
        }
    }
    return null;
}