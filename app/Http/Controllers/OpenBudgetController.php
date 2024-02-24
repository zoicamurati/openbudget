<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OpenBudgetController extends Controller
{
    public const CATEGORY = [
        435 => '435-SIGURIME SHOQERORE',
        600 => '600-PAGA, SHPERBLIME DHE TE TJERA SHPENZIME PERSONELI',
        602 => '602-MALLRA DHE SHERBIME TE TJERA',
        231 => '231-SHPENZIME PER RRITJEN E AKTIVEVE TE QENDRUESHME TE TRUPEZUARA',
        604 => '604-TRANSFERIME KORRENTE TE BRENDESHME',
        606 => '606-TRANSFERTA PER BUXHETET FAMILIARE DHE INDIVIDET',
        466 => '466-KREDITORE PER MJETE NE RUAJTJE',
        652 => '652-INTERESA LETRA ME VLERE TE QEVERISE',
        703 => '703-TATIM MBI MALLRAT DHE SHERBIMET BRENDA VENDIT',
        232 => '232-SHPENZIME TRANSFERIMET KAPITALE',
        580 => '580-XHIRIME TE BRENDESHME',
        603 => '603-SUBVENCIONET',
        230 => '230-SHPENZIME PER RRITJEN E AKTIVEVE TE QENDRUESHME TE PATRUPEZUARA',
        175 => '175-HUAMARRJE NGA QEVERI TE HUAJA (TE DALA)',
        605 => '605-TRANSFERIMET KORRENTE JASHTE',
        255 => '255-TE DALA PER HUA-DHENIE DHE NEN-HUADHENIE TE BRENDESHME.',
        166 => '166-TE TJERA HUAMARRJE TE BRENDSHME (TE DALA)',
        467 => '467-KREDITORE TE NDRYSHEM',
        651 => '651-INTERESA PER HUAMARRJE TE TJERA TE BRENDESHME',
        700 => '700-TATIM MBI TE ARDHURAT PERSONALE, FITIMIN DHE TE ARDHURAT KAPITALE',
        470 => '470-Llogari ne pritje - Te ardhurra per tu marre ',
        750 => '750-KONTRIBUTE I SIGURIMEVE SHOQERORE DHE SHENDETESORE',
        448 => '448-AGJENTE SHERBIMESH',
        601 => '601-KONTRIBUTE PER SIGURIME SHOQERORE DHE SHENDETESORE',
        702 => '702-TATIM MBI PASURINE',
        711 => '711-TE ARDHURA NGA SHERBIMET ADMINISTRATIVE DHE TE ARDHURA SEKONDARE',
        752 => '752-',
        "000" => 'Borxhi'
    ];

    public function index()
    {


        $parents = DB::table('financial_transactions_budget_2024')
            ->selectRaw('payment_reason_code_sub_3 AS group_code')
//            ->where('date_executed', 'like', '2023%')
//            ->groupBy(DB::raw('SUBSTRING(payment_reason_code, 1, 3)'))
            ->groupBy('payment_reason_code_sub_3')
            ->get();

        $newArray = [];

        $temp_array = [
            'group_code' => '000',
            'children' => [],
            'name' => 'Borxhi',
        ];

        foreach ($parents as $parent) {

            $children = DB::table('financial_transactions_budget_2024')
                ->selectRaw(' MAX(inst) as name , CAST(SUM(transact_value) AS SIGNED INTEGER) as value')
//                ->where('date_executed', 'like', '2023%')
                ->where('payment_reason_code_sub_3', '=', $parent->group_code)
                ->groupBy('inst_code')
                ->get()->toArray();

            $parent->children = $children;

            if (array_key_exists($parent->group_code, self::CATEGORY) || $parent->group_code == null) {
                if ($parent->group_code == null || $parent->group_code == '000') {
                    $parent->name = self::CATEGORY["000"];
                } else {
                    $parent->name = self::CATEGORY[$parent->group_code];
                }

            } else {
                $parent->name = 'Te tjera';
            }

            $groupCode = $parent->group_code;

            // Check if the group_code is '000' or null
            if ($groupCode === '000' || $groupCode === null) {
                $temp_array['children'] = array_merge($parent->children, $temp_array['children']);

            } else {
                $newArray[] = $parent;
            }

        }
        $newArray[] = $temp_array;

        $temp[] = (object)[
            "name" => 'Shpenzime 2024',
            "children" => $newArray
        ];
        $total_data = $temp;


        return view('open_budget')->with(['data' => $total_data]);
    }

    public function test()
    {

        $institutions = DB::table('institution')
            ->selectRaw('code,name')
            ->get();

        // Fetch all parent records along with their children and sum of transaction values
        $parents = DB::table('financial_transactions_budget_2024')
            ->selectRaw('
                        payment_reason_code_sub_3  AS group_code,
                        MAX(inst) as name,
                        inst_code,
                        CAST(SUM(transact_value) AS SIGNED) as value
                         ')
            ->groupBy('payment_reason_code_sub_3', 'inst_code')
            ->get();

        $newArray = [];
        $temp_array = [
            'group_code' => '000',
            'children' => [],
            'name' => 'Borxhi',
        ];

        // Group parent records by group_code
        $groupedParents = $parents->groupBy('group_code');

        foreach ($groupedParents as $groupCode => $groupedParent) {
            // Prepare children array
            $children = [];
            foreach ($groupedParent as $parent) {
                $children[] = [
                    'name' => $parent->name,
                    'value' => $parent->value
                ];
            }

            // Prepare parent data
            $parentData = [
                'group_code' => $groupCode,
                'children' => $children,
                'name' => array_key_exists($groupCode, self::CATEGORY) ? self::CATEGORY[$groupCode] : 'Te tjera'
            ];

            // Check if the group_code is '000' or null
            if ($groupCode === '000' || $groupCode == null) {
                $temp_array['children'] = array_merge($temp_array['children'], $children);
            } else {
                $newArray[] = (object)$parentData;
            }
        }

        // Add the temporary array to the new array
        $newArray[] = (object)$temp_array;

        $temp[] = (object)[
            "name" => 'Shpenzime 2024',
            "children" => $newArray
        ];

        $total_data = $temp;

        return view('open_budget_test')->with(['data' => $total_data, 'category' => self::CATEGORY, 'institutions' => $institutions]);
    }

    public function get_data(Request $data)
    {
        $param_category = isset($data['category']) ? $data['category'] : [];
        $param_inst = isset($data['institutions']) ? $data['institutions'] : [];

        $institutions = DB::table('institution')
            ->selectRaw('code,name')
            ->get();

        // Fetch all parent records along with their children and sum of transaction values
        $parents = DB::table('financial_transactions_budget_2024')
            ->selectRaw('
        payment_reason_code_sub_3  AS group_code,
        MAX(inst) as name,
        inst_code,
        CAST(SUM(transact_value) AS SIGNED) as value
    ');
        if (count($param_category) > 0) {
            $parents->whereIn('payment_reason_code_sub_3', $param_category );
        }
        if (count($param_inst) > 0) {
            $parents->whereIn('inst_code', $param_inst );
        }

        $parents = $parents->groupBy('payment_reason_code_sub_3', 'inst_code')
            ->get();

        $newArray = [];
        $temp_array = [
            'group_code' => '000',
            'children' => [],
            'name' => 'Borxhi',
        ];

        // Group parent records by group_code
        $groupedParents = $parents->groupBy('group_code');

        foreach ($groupedParents as $groupCode => $groupedParent) {
            // Prepare children array
            $children = [];
            foreach ($groupedParent as $parent) {
                $children[] = [
                    'name' => $parent->name,
                    'value' => $parent->value
                ];
            }

            // Prepare parent data
            $parentData = [
                'group_code' => $groupCode,
                'children' => $children,
                'name' => array_key_exists($groupCode, self::CATEGORY) ? self::CATEGORY[$groupCode] : 'Te tjera'
            ];

            // Check if the group_code is '000' or null
            if ($groupCode === '000' || $groupCode == null) {
                $temp_array['children'] = array_merge($temp_array['children'], $children);
            } else {
                $newArray[] = (object)$parentData;
            }
        }

        // Add the temporary array to the new array
        $newArray[] = (object)$temp_array;

        $temp[] = (object)[
            "name" => 'Shpenzime 2024',
            "children" => $newArray
        ];

        $total_data = $temp;

        return response()->json(['data' => $total_data]);
    }
}
