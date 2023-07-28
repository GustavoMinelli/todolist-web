<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    private function validation(Request $request) {

        $validator = Validator::make($request->all(), [
            'id' => 'nullable|required_if:_method,PUT',
            'title' => 'required|max:255',
        ]);

        $validator->after(function($validator) use ($request) {

        });

        return $validator;
    }

    private function save(Request $request, Page $page) {
        
        $page->title = $request->title;
        $page->save();

    }

    private function form(Page $page) {

        $data = [
            'page' => $page,
        ];

        return view('pages.form', $data);
    }

    public function index(): View {
        
        $pages = Page::all();

        $data = [
            'pages' => $pages,
        ];

        return view('pages.index', $data);
    }

    public function create(Page $page) {

        return $this->form(new Page());
    }

    public function edit($id) {

        $page = Page::find($id);

        if ($page) {
            return $this->form($page);
        }

        return redirect('/pages');

    }

    public function insert(Request $request) {

        $validator = $this->validation($request);

        if (!$validator->fails()) {

            $page = new Page();

            $this->save($request, $page);

        }

        return redirect('/pages');
    }

    public function update(Request $request) {

        $validator = $this->validation($request);

        if (!$validator->fails()) {

            $page = Page::find($request->id);
            
            if ($page) {

                $this->save($request, $page);

                return redirect('/pages');

            }
        }

        return redirect('/pages');
    }

    public function delete($id) {

        $page = Page::find($id);

        if ($page) {
            $page->delete();
        }

        return redirect('/pages');
    }

    
}
