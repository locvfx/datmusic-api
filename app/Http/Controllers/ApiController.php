<?php
/**
 * Copyright (c) 2017  Alashov Berkeli
 * It is licensed under GNU GPL v. 2 or later. For full terms see the file LICENSE.
 */

namespace App\Http\Controllers;

use App\Datmusic\SearchesTrait;
use App\Datmusic\DownloaderTrait;

class ApiController extends Controller
{
    use SearchesTrait, DownloaderTrait;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $this->bootSearches();
        $this->bootDownloader();
    }

    /**
     * Just response status.
     *
     * @return array
     */
    public function index()
    {
        return $this->ok();
    }

    /**
     * @param $data
     * @param string $arrayName
     * @param int    $status
     * @param $headers
     *
     * @return array
     */
    private function ok($data = null, $arrayName = 'data', $status = 200, $headers = [])
    {
        $result = ['status' => 'ok'];
        if (! is_null($data)) {
            $result = array_merge($result, [$arrayName => $data]);
        }

        return response()->json($result, $status, $headers);
    }
}
