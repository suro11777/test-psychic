<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

class TestPsychicController extends Controller
{
    /**
     * @var
     */
    public $sessionId;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->sessionId = session()->getId();
        if (!session($this->sessionId)) {
            session([$this->sessionId => []]);
        }
        $psychics = session($this->sessionId);
        return view('home', compact('psychics'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function confirmThoughtNumber()
    {
        $this->sessionId = session()->getId();
        if (!session($this->sessionId)) {

            $countPsychic = config('settings.count_psychics');
            $psychicNames = [];
            for ($i = 1; $i <= $countPsychic; $i++) {
                $psychicNames['psychic' . rand(1, 99999)] = [];
            }
            session([$this->sessionId => [$psychicNames]]);
        } else {
            $psychicNames = session($this->sessionId);
        }
        $psychics = [];
        foreach ($psychicNames as $key => $psychicName) {
            $generateNumbersArray = session("$this->sessionId.$key.generate_number") ?? [];
            array_push($generateNumbersArray, rand(10, 99));
            $psychics[$key] = [
                'generate_number' => $generateNumbersArray,
                'rating' => (session("$this->sessionId.$key.rating") ?? 0)
            ];

        }
        session([$this->sessionId => $psychics]);

        return view('send_number', compact('psychics'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendNumber(Request $request)
    {
        $number = $request->get('number');
        $psychics = session(session()->getId());
        foreach ($psychics as $key => $psychic) {
            if ($psychic['generate_number'][array_key_last($psychic['generate_number'])] == $number) {
                $psychics[$key]['rating']++;
            } else {
                $psychics[$key]['rating'] > 0 ? $psychics[$key]['rating']-- : $psychics[$key]['rating'] = 0;
            }
        }

        session([session()->getId() => $psychics]);
        return redirect()->route('home');
    }
}
