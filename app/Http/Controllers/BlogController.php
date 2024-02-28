<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::filter(request(['search']))->orderBy('created_at', 'desc')->paginate(7)->withQueryString();
        return view('blogs.index', [
            'blogs' => $blogs
        ]);
    }


    public function show($id)
    {
        return view('blogs.show', [
            'blog' => Blog::find($id)
        ]);
    }


    public function myblogs()
    {
        $blogs = Blog::latest()->get();
        $user_id = Auth::user()->id;

        if (!Auth::user()->is_admin) {
            $blogs = Blog::latest()->where('user_id', $user_id)->get();
        }

        return view('blogs.myblogs', [
            'blogs' => $blogs
        ]);
    }


    public function create()
    {
        return view('blogs.create', [
            'blogs' => Blog::latest()->get()
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3',
            'image' => 'required|image'
        ]);

        $validatedData['body'] = nl2br($request['body']);
        $validatedData['user_id'] = Auth::user()->id;

        if ($request->file('image')) {
            $image_name = $request['image']->getInode() . time() . "." . $request['image']->getClientOriginalExtension();
            $image_url = url('image/' . $image_name);
            $request['image']->move('image', $image_name);
            $validatedData['image'] = $image_name;
            $validatedData['url_image'] = $image_url;
        }

        Blog::create($validatedData);

        return redirect('/myblogs')->with('success', 'Blogs created');
    }


    public function edit($id)
    {
        return view('blogs.edit', [
            'blog' => Blog::find($id)
        ]);
    }


    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);

        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3',
        ]);

        if ($request->file('image')) {
            if (File::exists('image/' . $blog->image)) {
                File::delete('image/' . $blog->image);
            }
            $image_name = $request['image']->getInode() . time() . "." . $request['image']->getClientOriginalExtension();
            $image_url = url('image/' . $image_name);
            $request['image']->move('image', $image_name);
            $blog->image = $image_name;
            $blog->url_image = $image_url;
        }

        $blog->title = $request->title;
        $blog->body = nl2br($request->body);
        $blog->save();

        return redirect('/myblogs')->with('success', 'Blogs created');
    }


    public function destroy($id)
    {
        $blog = Blog::find($id);

        if (File::exists('image/' . $blog->image)) {
            File::delete('image/' . $blog->image);
        }

        $blog->delete();

        return back()->with('success', 'Blog deleted');
    }
}
