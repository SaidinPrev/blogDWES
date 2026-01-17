<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Usuari;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',
            ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('titol', 'DESC')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->titol = $request->input('titol');
        $post->contingut = $request->input('contingut');
        $post->usuari()->associate(Usuari::get()->first());
        $post->save();

        return redirect() -> route('posts.index')->with('missatge', 'Post inserit correctament');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        if($post->usuari->id != Auth::user()->id){
            abort(403, "No tens permissos per a modificar este post");
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request,string $id)
    {
        $post = Post::findOrFail($id);
        $post->titol = $request->validated('titol');
        $post->contingut = $request->validated('contingut');
        $post->save();

        return redirect()->route('posts.index')->with('missatge', 'Post actualitzat correctament');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        

        if($post->usuari->id != Auth::user()->id){
            abort(403, 'No tens els permissos per a esborrar aquest post!');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('mensaje_ok', 'Post esborrat');
    }

    public function nuevoPrueba()
    {

        $usuari = Usuari::findOrFail(1);
        $post = new Post();
        $numero = rand(1, 100);



        $post->titol = 'Títol ' . $numero;
        $post->contingut = 'Contingut ' . $numero;

        // Associar el post a l'usuari
        $post->usuari()->associate($usuari);
        $post->save();


        return redirect()->route('posts.index')->with('mensaje_ok', 'Post afegit correctament.');
    }

    // public function editarPrueba($id)
    // {
    //     $numero = rand(1, 100);

    //     $postAModificar = Post::findOrFail($id);

    //     $postAModificar->titol = 'Títol ' . $numero;
    //     $postAModificar->contingut = 'Contingut ' . $numero;
    //     $postAModificar->save();

    //     return redirect()->route('posts.index')->with('mensaje_ok', 'Post modificat correctament.');
    // }

}
