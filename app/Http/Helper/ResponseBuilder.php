<?php
/**
 * @author  Yves Toupe
 * Date: 2019-05-30
 * Time: 00:14
 */

namespace App\Http\Helper;


use phpDocumentor\Reflection\Types\Boolean;

class ResponseBuilder
{
    /**
     * Function to return all response with the same bag
     *
     * @param Bool $status
     * @param string $info
     * @param array $data
     * @return array
     */
    public static function result($status, $info, $data)
    {
        return [
            'success' => $status,
            'information' => $info,
            'data' => $data
        ];
    }
}
