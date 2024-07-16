<?php
namespace Westreels\WestreelsMain\GameControllers\PragmaticPlay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Cache;

class SideFunctions
{
    public static function getBetween($string, $start = "", $end = ""){
        if (strpos($string, $start)) { // required if $start not exist in $string
            $startCharCount = strpos($string, $start) + strlen($start);
            $firstSubStr = substr($string, $startCharCount, strlen($string));
            $endCharCount = strpos($firstSubStr, $end);
            if ($endCharCount == 0) {
                $endCharCount = strlen($firstSubStr);
            }
            return substr($firstSubStr, 0, $endCharCount);
        } else {
            return '';
        }
    }

	public static function miniLobbyGames()
	{
		$lobbyGames = file_get_contents(config('gameconfig.js_script_storage').'/minilobbygames.json');
	

		$time = time();
		$mgckey = $_GET['mgckey'];
		$signature = hash_hmac('md5', $mgckey, $time.$mgckey);

		$gameStartURL = config('gameconfig.pragmaticplay.minilobby_url').'/'.$signature.'/'.$time;

		$data_origin = json_decode($lobbyGames);
		$data_origin->gameLaunchURL = $gameStartURL;

		return $data_origin;
	}

	public static function announcements()
	{
		//https://softswiss.pragmaticplay.net/gs2c/announcements/unread/?symbol=vs25wolfgold&mgckey=AUTHTOKEN@b11a28c53c38d3cbd2d0f1af251e4f5ee4f63634191b0807e62292bc4979cf52~stylename@sfws_betssw~SESSION@4055c52c-e6b8-49c9-8692-d2130173be4a

		$announcements = array("error" => 0, "description" => "OK", "announcements" => array());
		return $announcements;
	}

	public static function logo_info_js()
	{
		//later make these specific for operators configurable, as it contains important config that is nice for operators to be able to customize
		$getLogoInfo = file_get_contents(config('gameconfig.js_script_storage').'/logo_info.js');

		return response($getLogoInfo, 200)->header('Content-Type', 'application/javascript');
	}
	public static function wurfl_js()
	{
		//this file we can easily add in frontend edits (like passing on extra vars, or doing additional things in frontend if we need to get into the frontend client at any point - this script is for detecting device etc.)
		$wurfl = file_get_contents(config('gameconfig.js_script_storage').'/wurfl.js');
		return response($wurfl, 200)
                  ->header('Content-Type', 'application/javascript');
	}

	public static function html5_script_external_js()
	{
		$html5ExternalJS = file_get_contents(config('gameconfig.js_script_storage').'/html5-script-external.js');
		return $html5ExternalJS;
	}


}