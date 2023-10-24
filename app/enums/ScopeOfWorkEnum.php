<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Enum;

/**
 * @method static self REF()
 * @method static self NO_REF()
 * @method static self A1()
 * @method static self A2()
 * @method static self A3()
 * @method static self A4a()
 * @method static self A4b()
 * @method static self A4c()
 * @method static self A5()
 * @method static self A6a()
 * @method static self A6b()
 * @method static self A6c()
 * @method static self A6d()
 * @method static self A6e()
 * @method static self A6f()
 * @method static self A6g()
 * @method static self A6h()
 * @method static self A7()
 * @method static self A8()
 * @method static self A9()
 * @method static self A10()
 * @method static self A11a()
 * @method static self A11b()
 * @method static self A11c()
 * @method static self A11d()
 * @method static self A12()
 * @method static self B1()
 * @method static self B2()
 * @method static self B3()
 * @method static self B4()
 * @method static self B5()
 * @method static self B6()
 * @method static self B7()
 * @method static self B8()
 * @method static self B9()
 * @method static self B10()
 * @method static self B20()
 * @method static self B30()
 * @method static self B11()
 * @method static self B12()
 * @method static self B13()
 * @method static self B14()
 * @method static self C1()
 * @method static self C2()
 * @method static self C3()
 * @method static self C4()
 * @method static self C5()
 * @method static self C6()
 * @method static self C7()
 * @method static self C8()
 * @method static self C9()
 * @method static self C10()
 * @method static self C11()
 * @method static self C12()
 * @method static self C13()
 * @method static self C14()
 * @method static self C15()
 * @method static self C16()
 * @method static self C17()
 * @method static self C18()
 * @method static self C19()
 * @method static self D1()
 * @method static self D2()
 * @method static self D3()
 * @method static self D4()
 * @method static self D5()
 * @method static self D6()
 * @method static self D7()
 * @method static self D8()
 * @method static self D9()
 * @method static self D12()
 * @method static self D13()
 * @method static self D14()
 * @method static self D15()
 * @method static self D16()
 * @method static self D17()
 * @method static self D18()
 * @method static self D19()
 * @method static self E1()
 * @method static self E2()
 * @method static self E3()
 * @method static self E4()
 * @method static self E5()
 * @method static self E6()
 * @method static self E7()
 * @method static self F1()
 * @method static self F2()
 * @method static self F3()
 * @method static self F4()
 * @method static self F6()
 * @method static self F7()
 * @method static self F8()
 * @method static self F9()
 * @method static self F10()
 * @method static self F20()
 * @method static self F30()
 * @method static self F11()
 * @method static self F12()
 * @method static self F13()
 * @method static self F14()
 * @method static self G1()
 * @method static self G2()
 * @method static self G3()
 * @method static self G4()
 * @method static self N1()
 * @method static self N2()
 * @method static self N3()
 * @method static self N4()
 * @method static self N5()
 * @method static self N6()
 * @method static self M1()
 * @method static self M2()
 * @method static self M3()
 * @method static self M4()
 * @method static self M5()
 * @method static self M6()
 * @method static self M7()
 * @method static self M8()
 * @method static self M9()
 * @method static self M10()
 * @method static self NONE()
 */
class ScopeOfWorkEnum extends Enum
{
    static function values(): array
    {
        return [
            'REF' => 'Ref',
            'NO_REF' => 'NO REF',
            'A1' => 'Full Ceiling Replacement & Painting of Walls and Ceiling (no woodwork)',
            'A2' => 'Repair Ceiling and decorate ceiling & walls',
            'A3' => 'Wall Paper Replacement (E/O when ceiling is being replaced)',
            'A4a' => 'Internal Wall replastering - sand & cement',
            'A4b' => 'Internal Wall replastering - plasterboard and skim',
            'A4c' => 'Internal Wall replastering - skim',
            'A5' => 'Coving remove and replace (incl. any cornicing or ceiling roses)',
            'A6a' => 'Remove existing frame, door and architraving',
            'A6b' => 'Install new frame, door & architraving (incl. all ironmongery)',
            'A6c' => 'Remove existing door only',
            'A6d' => 'Rehang existing door',
            'A6e' => 'Hang new door only (incl. all ironmongery)',
            'A6f' => 'Remove existing Architraves only & replace with new (unless incl. with door removal)',
            'A6g' => 'Remove & re-use/replace skirting board',
            'A6h' => 'Remove existing Window Board & replace with new',
            'A7' => 'Paint Ceilings & Walls (no woodwork)',
            'A8' => 'Paint Walls Only (no woodwork)',
            'A9' => 'Paint Ceilings Only (no woodwork)',
            'A10' => 'Wall Paper Replacement',
            'A11a' => 'Decoration to door(s)',
            'A11b' => 'Decoration to skirting boards',
            'A11c' => 'Decoration to picture/dado/chair rail',
            'A11d' => 'Decoration to stairs',
            'A12' => 'Insulation',
            'B1' => 'Remove existing floating floor (including any beading or scotia).',
            'B2' => 'Remove existing nailed or screwed down floor (including any beading or scotia).',
            'B3' => 'Remove existing glued down floor (including any beading or scotia).',
            'B4' => 'Timber Floor Removal (minimum time)',
            'B5' => 'Install T&G Softwood flooring (incl. trims, quadrant, scotia etc.)',
            'B6' => 'Install Chipboard/Plywood/OSB (or similar) flooring',
            'B7' => 'Install laminated floor (incl. underlay, trims, quadrant, scotia or similar)',
            'B8' => 'Install engineered/semi-solid or solid floor (incl. underlay, trims, quadrant, scotia or similar)',
            'B9' => 'Sanding solid floor and 2 coats of lacquer',
            'B10' => 'Floor Installation (minimum time)',
            'B20' => 'Remove & Reinstate EXISTING skirting boards',
            'B30' => 'Remove & Reinstate NEW skirting boards',
            'B11' => 'Remove tiles and prepare surface',
            'B12' => 'Lay ceramic tiles including trims and grouting',
            'B13' => 'Lay non-ceramic tiles including trims and grouting',
            'B14' => 'Install Splash back',
            'C1' => 'Remove, store and refit existing Wash hand basin',
            'C2' => 'Remove, store and refit existing WC',
            'C3' => 'Remove, store and refit existing Bath',
            'C4' => 'Remove, store and refit existing Shower tray',
            'C5' => 'Remove existing and install new Wash hand basin',
            'C6' => 'Remove existing and install new WC',
            'C7' => 'Remove existing and install new Bath',
            'C8' => 'Remove existing and install new tray',
            'C9' => 'Remove, store and refit existing Bath screen',
            'C10' => 'Remove, store and refit existing Shower door',
            'C11' => 'Remove existing and install new Bath screen',
            'C12' => 'Remove existing and install new Shower door',
            'C13' => 'Fitting of Electric Shower',
            'C14' => 'Oil Boiler Removal and Replacement',
            'C15' => 'Gas Boiler Removal and Replacement',
            'C16' => 'Electrical Test Cert/Periodic Inspection Report',
            'C17' => 'New fuse board',
            'C18' => 'Installation of new socket/switch',
            'C19' => 'Remove, store and refit light fittings to facilitate ceiling repairs',
            'D1' => 'Roofing Repairs (half day x 2 operatives)',
            'D2' => 'Roofing Repairs (1 day x 2 operatives)',
            'D3' => 'Roofing Repairs (2 days x 2 operatives)',
            'D4' => 'Roofing Repairs (3 days x 2 operatives)',
            'D5' => 'Roofing Repairs (4 days x 2 operatives)',
            'D6' => 'Roofing Repairs (5 days x 2 operatives)',
            'D7' => 'Access Equipment (1 day)',
            'D8' => 'Access Equipment (2 days)',
            'D9' => 'Access Equipment (3 days or more)',
            'D12' => 'Demolition and Reinstatement of floor/ceiling joists including bridging',
            'D13' => 'Demolition and Reinstatement of roof timbers (rafters, ridge boards, valley boards, purlins etc.) per linear metre',
            'D14' => 'Demolition and Reinstatement of lead flashings (incl. removal of existing)',
            'D15' => 'Demolition and Reinstatement of fibre slate roof including battens & felt',
            'D16' => 'Demolition and Reinstatement of natural slate roof including battens & felt (Spanish/Chinese etc.)',
            'D17' => 'Demolition and Reinstatement of natural slate roof including battens & felt (Blue Bangor)',
            'D18' => 'Demolition and Reinstatement of concrete tile roof including battens & felt',
            'D19' => 'Demolition and Reinstatement of Torch on felt to include all up stands & edge details',
            'E1' => 'LIGHT CLEANING',
            'E2' => 'MEDIUM CLEANING',
            'E3' => 'HEAVY CLEANING',
            'E4' => 'FIX SOOT (Sealer)',
            'E5' => 'BIN SEALER (Sealer)',
            'E6' => 'ULV FOGGING',
            'E7' => 'THERMAL FOGGING',
            'F1' => 'Take down damaged wall and remove to skip Front Garden',
            'F2' => 'Take down damaged wall and remove to skip Rear Garden - Side Access',
            'F3' => 'Take down damaged wall and remove to skip Rear Garden - No Side Access',
            'F4' => 'Remove and clean stone for reuse (or by agreement)',
            'F6' => 'Rebuild wall (100mm block) including any required structural piers',
            'F7' => 'Rebuild wall (215mm solid block) including any required structural piers',
            'F8' => 'Rebuild wall (215mm hollow block) including any required structural piers',
            'F9' => 'Rebuild wall (100mm brick wall or facing) including any required structural piers',
            'F10' => 'Rebuild wall (215 mm brick wall or facing) including any required structural piers',
            'F11' => 'Rebuild Entrance/feature piers',
            'F12' => 'Rebuild Stone wall (up to 180mm thick)',
            'F13' => 'Rebuild Stone wall (181mm to 330mm thick)',
            'F14' => 'Rebuild Stone wall (330mm to 600mm thick)',
            'F15' => 'Remove & Refit Concrete Cappings/Pier Caps',
            'F16' => 'Remove & Replace Concrete Cappings/Pier Caps',
            'F17' => 'Remove & Refit Brick Cappings/Pier Caps',
            'F18' => 'Remove & Replace Brick Cappings/Pier Caps',
            'F19' => 'New cast in-situ concrete capping or pier cap',
            'F20' => 'Wall plastering (smooth)',
            'F21' => 'Wall plastering (dry dash/wet dash/coloured render)',
            'F22' => 'External Painting',
            'F23' => 'Remove and rehang single gate',
            'F24' => 'Remove and rehang pair of gates',
            'F25' => 'Access and protection',
            'G1' => 'Dehumidifier - supply, attend, monitor',
            'G2' => 'Air Movers - supply, attend, monitor',
            'N1' => 'Waste removal to licensed facility (up to 1 cu.yd)',
            'N2' => 'Waste removal to licensed facility (up to 2 cu.yd)',
            'N3' => 'Waste removal to licensed facility (up to 4 cu.yd)',
            'N4' => 'Waste removal to licensed facility (up to 8 cu.yd)',
            'N5' => 'Waste removal to licensed facility (up to 14 cu.yd)',
            'N6' => 'Waste removal to licensed facility (up to 20 Tonne)',
            'M1' => 'Internal Paint (emulsion)',
            'M2' => 'External Paint Allowance',
            'M3' => 'Oil Based Sealer (e.g. BIN sealer or Similar)',
            'M4' => 'Plasterboard 12.5mm tk (to include all screw fixings as required and jointing materials)',
            'M5' => 'Skim',
            'M6' => 'Thistle Bond',
            'M7' => 'Plasterboard 15mm tk (to include all screw fixings as required and jointing materials)',
            'M8' => 'Fireline board (to include all screw fixings as required and jointing materials)',
            'M9' => '100mm concrete blocks - including mortar',
            'M10' => '225mm concrete cavity blocks - including mortar',
            'NONE' => 'NONE',
        ];
    }


}
