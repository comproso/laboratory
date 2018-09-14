<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

use Comproso\Framework\Models\Test;

class LabController extends Controller
{
    /**
	 * (admin) index of the laboratory
	 */
	public function getIndex()
	{
		// get projects
		$tests = Test::all();

		// logout User
		if(Auth::check())
		{
			Auth::logout();
			Session::flush();
		}

		return view('index', [
			'projects' => $tests
		]);
	}

	/**
	 *	prepare of testing
	 */
	public function prepareTestingSession(Request $request)
	{
		// validate request
		$this->validate($request, [
		    'identifier'	=> 'required|integer|min:1',
		    'project'		=> 'required|integer|min:1'
	    ]);

	    // get project
	    $pid = $request->input('project');

		if(!Auth::check())
		{

		    // create or get test taker
		    $user = User::updateOrCreate(['identifier' => $request->input('identifier')]);
			$user->save();

		    if($user->tests()->where('tests.id', $pid)->count() != 1)
		    	$user->tests()->sync([$pid], false);

		    // login chosen user
		    Auth::login($user);
		}

		$user = Auth::user();
		$testId = $user->tests()->find($pid)->id;

		// get project
		Session::put('test_id', $testId);

		// check if general access is possible
		if(is_null($testId))
			return redirect('/');

		return redirect('/run/'.$testId);
	}

	/**
	 *	run the project.
	 */
	public function getRunProject()
	{
		// check for authentication
		if(!Auth::check())
			return redirect('/');

		// get ID via Session
		$pid = Session::get('test_id');

		// get user
		$user = Auth::user();

		// get project
		$test = $user->tests()->with(['pages' => function ($query) {
			$query->orderBy('position');
		}])->find($pid);

		// project & access
		if(is_null($test))
			return redirect('/');

		// return test
		return $test->guarded()->proceed()->respond();
	}

	/**
	 *	proceed the project
	 */
	public function postProceedProject(Request $request)
	{
		// get user
		$user = Auth::user();

		if(!Auth::check())
			return redirect('/');

		// get test
		$test = $user->tests()->findOrFail(Session::get('test_id'));

		// create proceed
		$test->guarded()->proceed();

		// flash request
		#$request->flash();
		#$request->session()->reflash();

		return $test->guarded()->proceed()->respond();
		return redirect('/run/'.$test->id);
	}



	/**
	 *	get export
	 */
	public function getExport($pid = null, $ext = 'xlsx')
	{
		if($pid === null)
		{
			// get projects
			$tests = Test::ofType('project')->isActive()->get();

			return view('export', [
				'projects' => $tests
			]);
		}
		else
		{
			// get test
			$test = Test::ofType('project')->find($pid);

			// check if test exists
			if(is_null($test))
				return redirect('/export');

			// export test
			return $test->export(['suffix' => mt_rand(100000, 999999)])->export($ext);
		}
	}
}
