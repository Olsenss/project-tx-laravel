<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Tag;
use Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => 'create']); //also except can be used, if you want the user to be authenticated to every single page except something.
    }


    public function index(){
    	$articles = Article::latest('published_at')->published()->get();	
        $latest = Article::latest()->first();
    	return view('articles.index', compact('articles', 'latest'));
    }

    public function show(Article $article){

    	//dd($article); Dump for develop
    	return view('articles.show', compact('article'));
    }

    public function create(){

        $tags = Tag::lists('name', 'id');
    	return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request)
    {
        // $article = Auth::user()->articles()->create($request->all());

        // updating pivot table in database with array of tags.
        // $article->tags()->attach($request->input('tag_list'));
        $this->createArticle($request);

        flash()->overlay('Your article has been successfully created', 'Good Job!');

    	return redirect('articles')->with('flash_message');
    }

    public function edit(Article $article)
    {   

        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('taglist', []));

        return redirect('articles');
    }

    private function syncTags(Article $article, array $tags)
    {
       $article->tags()->sync($tags); 
    }

    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('taglist', []));

        return $article;
    }
}
