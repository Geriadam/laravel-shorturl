<?php

namespace App\Http\Controllers;

use App\Url;
use Request;
use Input;
use Redirect;
use Carbon;
use View;
use Validator;
use Session;
Use UrlHelper;

class UrlController extends Controller
{
	public function index()
	{
    	$model = Url::all();
    	return view::make('/url/index')->with('model', $model);
    }
    public function create()
	{
		return view::make('/url/form');		
    }
	public function processcreate()
	{
		$rules = array(
            'url_asli'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to(url('/url/form'))
                ->withErrors($validator);
        } else {
			$hash  = UrlHelper::shortUrl();
            $model = new Url;
            $model->url_asli   = Input::get('url_asli');
            $model->url_palsu  = UrlHelper::$urlLink."".$hash;
            $model->url_hash   = $hash;
			$model->url_click  = UrlHelper::$klik;
            $model->save();

            Session::flash('message', 'Berhasil Menambah Data!');
            return Redirect::to(url('/url/index'));
        }
	}
	
	public function link($hash)
	{
    	$model 			  = Url::where('url_hash', $hash)->first();
		$model->url_click += 1;
		$model->save();
    	return Redirect::to($model->url_asli);
    }

    public function delete($id)
	{
    	$model = Url::find($id);
		if(!empty($model))
			$model->delete();
		else
			return Redirect::to(url('/url/index'))->with("message", 'Data tidak ada');
    	return Redirect::to(url('/url/index'))->with("message", 'berhasil menghapus data');
    }
}
