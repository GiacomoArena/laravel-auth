<?php

namespace App\Http\Controllers\Admin;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        $form_data = $request->all();
        $form_data['slug'] = Portfolio::generateSlug($form_data['title']);

        $new_portfolio = new Portfolio();
        $new_portfolio->fill($form_data);
        $new_portfolio->save();

        return redirect()->route('admin.portfolios.show', $new_portfolio);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        $form_data = $request->all();

        if($form_data['title'] !== $portfolio->title){
            $form_data['slug'] = Portfolio::generateSlug($form_data['title']);
        }else{
            $form_data['slug'] = $portfolio->slug;
        }

        $portfolio->update($form_data);

        return redirect()->route('admin.portfolios.show', $portfolio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
