<?php

if (!function_exists('json_to_collection')) {
    /**
     * convert the json file to collection class
     */
    function json_to_collection(string $json) : \Illuminate\Support\Collection
    {
        return collect(json_decode(file_get_contents($json), true));
    }
}


if (!function_exists('generate_tracking_number')) {
    /**
     * add padding to the string
     */
    function generate_tracking_number(string $value) : string
    {
        return 'EA-'.str_pad($value, 10, 0, STR_PAD_LEFT);
    }
}

if (!function_exists('tracking_to_id')) {
    /**
     * Convert tracking number to application ID
     */
    function tracking_to_id(string $string)
    {
        $string = preg_replace('~\D~', '', $string);

        if (strlen($string) < 10) {
            return $string;
        }

        return (int) substr($string, 8, 8);
    }
}



if (!function_exists('name')) {
    /**
     * Name Helper
     */
    function name(array $name, string $arrangement = 'FMIL'): string
    {
        if ($name == null) {
            return null;
        }

        $name = (array) $name;

        $fname = (array_key_exists('first', $name)) ? ucfirst($name['first']) : "";
        $lname = (array_key_exists('last', $name)) ? ucfirst($name['last']) : "";
        $mname = (array_key_exists('middle', $name)) ? ucfirst($name['middle']) : "";

        // $fname = @$name['fname'];
        // $mname = @$name['mname'];
        // $lname = @$name['lname'];

        switch ($arrangement) {

            case 'LFMI':
                $name = $lname . ", " . $fname . " " . @$mname[0] . ".";
                break;

            case 'LFM':
                $name = $lname . ", " . $fname . " " . $mname;
                break;

            case 'FMIL':
                $name = $fname . " " . @$mname[0] . ". " . $lname;
                break;

            case 'FL':
                $name = $fname . " " . $lname;
                break;

            case 'FMNL':
                $name = $fname . " " . $mname . " " . $lname;
                break;

            case 'SYM-F':
                $name = strtoupper($fname[0]);
                break;

            case 'SYM-FL':
                $name = strtoupper($fname[0] . $lname[0]);
                break;

            default:
                $name = '';
                break;
        }

        return $name;
    }
}

if (!function_exists('pretty_number')) {
    /**
     * Convert number to pretty
     */
    function pretty_number(string $string, bool $trail = true) : string
    {
        return number_format(floatval($string), ($trail) ? 2 : 0);
    }
}

