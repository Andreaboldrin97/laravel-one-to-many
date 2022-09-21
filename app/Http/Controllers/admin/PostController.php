<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    protected $validationRoule = [
        'title' => 'required|min:3',
        'description' => 'required|min:5',
        'image_url' => 'required'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $route = route('admin.post.store');
        $method = 'POST';
        return view('admin.post.create&edit', compact(['post', 'route', 'method']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate($this->validationRoule);
        $data = $request->all();

        $newPost = new Post();
        $data['user_id'] = Auth::id();
        $data['sale_date'] = new DateTime();
        $newPost->create($data);
        return redirect()->route('admin.post.index')->with('create', $data['title']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $route = route('admin.post.update', $post->id);
        $method = 'PUT';
        return view('admin.post.create&edit', compact(['post', 'route', 'method']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validationData = $request->validate($this->validationRoule);
        $post = Post::findOrFail($id);
        $data['user_id'] = Auth::id();
        $data['sale_date'] = $post->sale_date;
        $data = $request->all();
        $post->update($data);
        return redirect()->route('admin.post.index')->with('create', $data['title']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.post.index')->with('delete', $post->title);
    }
}
