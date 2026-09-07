<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PharIo\Version\Exception;

class SetupController extends Controller
{

    const VERSION_1_0 = 1.0;
    const VERSION_1_1 = 1.1;
    const VERSION_1_2 = 1.2;
    const VERSION_1_3 = 1.3;
    const VERSION_1_4 = 1.4;
    const VERSION_1_5 = 1.5;
    const VERSION_1_6 = 1.6;
    const VERSION_1_7 = 1.7;
    const VERSION_1_8 = 1.8;
    const VERSION_1_9 = 1.9;
    const VERSION_2_0 = 2.0;
    const VERSION_2_1 = 2.1;

    public function init(){
        $last_version = env('APP_VERSION');

        if ($last_version == $this->getInstalledVersion())
            return 'آخرین ورژن قبلا نصب شده است';

        $this->preInstall();


        if (self::VERSION_1_0 > $this->getInstalledVersion()) $this->install_1_0();
        if (self::VERSION_1_1 > $this->getInstalledVersion()) $this->install_1_1();
        if (self::VERSION_1_2 > $this->getInstalledVersion()) $this->install_1_2();
        if (self::VERSION_1_3 > $this->getInstalledVersion()) $this->install_1_3();
        if (self::VERSION_1_4 > $this->getInstalledVersion()) $this->install_1_4();
        if (self::VERSION_1_5 > $this->getInstalledVersion()) $this->install_1_5();
        if (self::VERSION_1_6 > $this->getInstalledVersion()) $this->install_1_6();
        if (self::VERSION_1_7 > $this->getInstalledVersion()) $this->install_1_7();
        if (self::VERSION_1_8 > $this->getInstalledVersion()) $this->install_1_8();
        if (self::VERSION_1_9 > $this->getInstalledVersion()) $this->install_1_9();
        if (self::VERSION_2_0 > $this->getInstalledVersion()) $this->install_2_0();
        if (self::VERSION_2_1 > $this->getInstalledVersion()) $this->install_2_1();



        $this->postInsatll();


        return 'سیستم با موفقیت نصب شد';
    }

    private function preInstall(){
        setEnv('APP_ENV', 'local');
    }

    private function postInsatll(){
        setEnv('APP_ENV', 'production');
        setEnv('APP_DEBUG', 'false');
    }

    private function getInstalledVersion(){
        try {
            $current_version = Setting::get(Setting::VERSION);
            $installed_version = $current_version->value;
        }catch (\Exception $e){
            $installed_version = 0;
        }
        (is_null($installed_version)) ? $installed_version = 0 : $installed_version = $installed_version;
        (strlen($installed_version) == 0) ? $installed_version = 0 : $installed_version = $installed_version;
        return $installed_version;
    }

    private function setInstalledVersion($version){
        $current_version = Setting::get(Setting::VERSION);
        $current_version->value = $version;
        $current_version->save();
    }


    private function install_1_0(){
        Artisan::call("migrate");
        $this->setInstalledVersion(self::VERSION_1_0);
    }

    private function install_1_1(){
        Artisan::call("migrate");
        $this->setInstalledVersion(self::VERSION_1_1);
    }

    private function install_1_2(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        $this->setInstalledVersion(self::VERSION_1_2);
    }

    private function install_1_3(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        $this->setInstalledVersion(self::VERSION_1_3);
    }

    private function install_1_4(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        $this->setInstalledVersion(self::VERSION_1_4);
    }

    private function install_1_5(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        Setting::create([
            'key' => Setting::KEY_REGISTER_COST,
            'value' => 5000000,
        ]);
        $this->setInstalledVersion(self::VERSION_1_5);
    }

    private function install_1_6(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        $this->setInstalledVersion(self::VERSION_1_6);
    }

    private function install_1_7(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        rolesAddPermissions(['accountant'], ['invoice-gold.create']);
        $this->setInstalledVersion(self::VERSION_1_7);
    }

    private function install_1_8(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        rolesAddPermissions(['accountant'], ['user.referral.index']);
        $this->setInstalledVersion(self::VERSION_1_8);
    }

    private function install_1_9(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        $this->setInstalledVersion(self::VERSION_1_9);
    }

    private function install_2_0(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        $this->setInstalledVersion(self::VERSION_2_0);
    }

    private function install_2_1(){
        Artisan::call("migrate");
        Artisan::call("view:clear");
        Artisan::call("cache:clear");
        $this->setInstalledVersion(self::VERSION_2_1);
    }
}
