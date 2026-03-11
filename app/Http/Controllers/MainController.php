<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin(){
        $clients = Client::orderBy('created_at', 'desc')->get();
        $posts = Post::orderBy('date_pub', 'desc')->get();
        return view('admin', compact('clients', 'posts'));
    }

    public function delete_client($id)
    {
        $client = Client::findOrFail($id); // trouve le client ou renvoie 404
        $client->delete();                  // supprime le client

        return redirect()->back()->with('success', 'Client supprimé avec succès !');
    }

    public function add_post(Request $request)
    {
        // Validation du formulaire
        $request->validate([
            'titre' => 'required|string|max:200',
            'content' => 'required|string',
            'media' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,mov,avi|max:10240', // max 10MB
        ]);

        $filePath = null;
        $fileType = null;

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            // Sauvegarde dans storage/app/public/media
            $filePath = $file->storeAs('media', $filename, 'public');

            // Détection type : image ou video
            $extension = strtolower($file->getClientOriginalExtension());
            $allowedImages = ['jpg','jpeg','png','gif'];
            $allowedVideos = ['mp4','mov','avi'];

            if (in_array($extension, $allowedImages)) {
                $fileType = 'image';
            } elseif (in_array($extension, $allowedVideos)) {
                $fileType = 'video';
            }
        }

        // Création du post
        $post = Post::create([
            'titre' => $request->input('titre'),
            'content' => $request->input('content'),
            'file_path' => $filePath,
            'file_type' => $fileType,
        ]);

        return redirect()->back()->with('success', 'Post créé avec succès !');
    }

    public function home()
    {
        $posts = Post::orderBy('date_pub', 'desc')->get();

        return view('home', [
            'posts' => $posts
        ]);
        
    }

    public function tolotra()
    {
        return view('tolotra');
    }

    public function info()
    {
        return view('info');
    }

    public function contact()
    {
        return view('contact');
    }

    public function fidirana()
    {
        return view('fidirana');
    }

    public function fidirana_form(Request $request)
    {
        $client = Client::create([
            'anarana' => $request->input('anarana'),
            'toerana' => $request->input('toerana'),
            'numero' => $request->input('numero'),
            'fangatahana' => $request->input('fangatahana'),
        ]);

        return redirect()->back()->with('success', 'Voaray ny fangatahana!');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
