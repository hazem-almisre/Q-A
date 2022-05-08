<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Tag_Post;
use App\Models\Tags;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Profiler\Profiler;

use function PHPUnit\Framework\isNull;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = Profile::all();
        return view('profile.index', compact('profile'));
    }

    public function trash($id)
    {
        $profile = Profile::onlyTrashed()->where('user_id', $id)->get();
        return view('profile.trash', compact('profile'));
    }

    public function create()
    {
        $tag = Tags::all();
        return view('profile.create', compact('tag'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'content' => ['required'],
            'photo' => ['required', 'image'],
            'tag' => ['required']
        ]);

        $newphoto =  $request->photo->getClientOriginalName();
        $newphoto = $request->photo->move('images', $newphoto);
        $slug = Str::slug($request->title);

        $t = Profile::create([
            'title' => $request->title,
            'content' => $request->content,
            'photo' => $newphoto,
            'slug' => $slug,
            'user_id' => Auth::id()
        ]);
        $t->tag()->attach($request->tag);
        return redirect()->route('in');
    }


    public function show($slug)
    {
        $profile = Profile::query()->where('slug', $slug)->first();
        return view('profile.show', compact('profile'));
    }


    public function edit($id)
    {
        $tag = Tags::all();
        return view('profile.update',)->with('profile', Profile::query()->find($id))->with('tag', $tag);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['unique:profiles,title'],
            'content' => ['string', 'nullable'],
            'photo' => ['image', 'nullable']
        ]);

        $profile = Profile::query()->find($id);
        if (!is_null($request->photo)) {
            $newphoto = time() . $_FILES['photo']['name'];
            $newphoto = $request->photo->move('image', $newphoto);
            $profile->photo = $newphoto;
        }
        $profile->title = (isset($request->title)) ? $request->title : $profile->title;
        $profile->content = (isset($request->content)) ? $request->content : $profile->content;
        $profile->tag()->sync($request->tag);
        $profile->save();

        return redirect()->route('in');
    }

    public function destroy($id)
    {
        Profile::query()->find($id)->delete();
        return redirect()->route('in');
    }


    public function restoretrash($id)
    {
        $t = Profile::onlyTrashed()->find($id)->restore();
        return redirect()->route('tr', Auth::id());
    }


    public function deletetrash($id)
    {
        $t = Profile::onlyTrashed()->find($id);
        if (!is_null($t->photo))
            unlink($t->photo);
        $t->forceDelete();
        return redirect()->route('tr', Auth::id());
    }
}
