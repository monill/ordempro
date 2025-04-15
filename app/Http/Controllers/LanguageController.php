<?php

namespace App\Http\Controllers;

use App\Http\Requests\LanguageRequest;
use App\Http\Requests\StoreLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Models\Language;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use InvalidArgumentException;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLanguageRequest $request)
    {
        Language::create($request->all());
        return redirect()->route('languages.index')->with('success', 'Idioma criado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $language->update($request->all());
        return redirect()->route('languages.index')->with('success', 'Idioma editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('languages.index')->with('success', 'Idioma eliminado com sucesso.');
    }

    public function switchTheme(string $themeMode)
    {
        if (!in_array($themeMode, ['dark-theme', 'light-theme'])) {
            throw new InvalidArgumentException("Invalid theme mode: $themeMode");
        }

        Cookie::queue('theme_mode', $themeMode, 60 * 60 * 24 * 7); // Expires in 7 days

        return response()->json([
            'status'    => true,
            'message' => "Theme Set",
            'theme' => $themeMode,
        ]);
    }

    public function setLanguageCookie(array $languageData)
    {
        $jsonEncoded = json_encode($languageData); // Encode array to json
        Cookie::queue('language_data', $jsonEncoded, 60 * 60 * 24 * 7); // Set cookie with json data
        App::setLocale($languageData['language_code']); //Set Cookie
    }

    public function switchLanguage($id)
    {
        $language = Language::find($id);
        if ($language) {
            $languageData = [
                'language_code' => $language->code,
                'language_flag' => $language->emoji,
                'direction' => $language->direction,
                'emoji' => $language->emoji,
            ];
            $this->setLanguageCookie($languageData);
            return redirect()->back();
        }
    }

    public function setDefaultLanguage()
    {
        $languageData = [
            'language_code' => config('app.locales'),
            'language_flag' => 'flag-icon-us', //It's a Emoji Code, which shows Flag on browser
            'direction' => 'ltr',
            'emoji' => 'flag-icon-us',
        ];
        $this->setLanguageCookie($languageData);
    }
}
