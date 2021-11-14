<?php


namespace App\Helper;


trait TraitShowData
{

    public $typeTime = array([ '1' => "Thời vụ",
                                '2' => "Cộng tác viên",
                                '3' => "Bán thời gian",
                                '4' => "Toàn thời gian",
    ]);
    public $typeRank = array([ '1' => "Cộng tác viên",
                                '2' => "Nhân viên",
                                '3' => "Quản lý dự án",
                                '4' => "Giám đốc kỹ thuật",
                                '5' => "Giám đốc bộ phận IT",
                                '6' => "Khác",
    ]);
    public $typeGender = array([ '1' => "Nam",
                                    '2' => "Nữ",
                                    '0' => "Không xác định",
    ]);
    public $scale = array([
        '1' => "0-100",
        '2' => "100-200",
        '3' => "200-300",
        '4' => "300-400",
        '5' => "400-500",
        '6' => ">500",
    ]);
}
