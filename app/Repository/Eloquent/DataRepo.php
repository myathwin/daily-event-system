<?php

namespace App\Repository\Eloquent;

use App\Models\Staff;
use App\Models\DailyReport;
use App\Repository\Eloquent\staffRepository;
use App\Repository\Eloquent\DailyReportRepository;




class DataRepo
{
    public static function staff(): StaffRepository
    {
        return app(StaffRepository::class);
    }

    public static function dailyreport(): DailyReportRepository
    {
        return app(DailyReportRepository::class);
    }

   
}