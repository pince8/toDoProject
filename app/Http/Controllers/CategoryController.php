<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    public function index(){
        
        //$kategoriler=Category::where('user_id',Auth::id())->get();
        // $kategoriler=Auth::user()->getCategory;
        //$kategoriler = Category::get();
        $kategoriler=Category::get();

        return view('panel.categories.index',compact('kategoriler'));
    }
    public function createPage(){
        return view('panel.categories.create');
    }

    public function postCategory(Request $request){
        
        $cat =new Category();
        $cat-> name= $request->category_name;
        
        if($request->category_status=='Aktif'){
            $cat->is_active=1;
        }
        else{
            $cat->is_active=0;
        }
        
        $user=Auth::user();
        $cat->user_id = 2;
        $cat->save();

    return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla oluşturuldu']);
}

public function updatePage($a){

    //$category=Category::where('id',$a)->get();
      $category=Category::find($a);
return view('panel.categories.update',compact('category'));
}


public function updateCategory(Request $request){

$request->validate([
    'catStatus'=>'min:0|max:1|',
    'catName'=>'min:3'
]);
    $category=Category::find($request->catID);

    if($category !=null){
        $category->name=$request->catName;
        $category->is_active=$request->catStatus;
        $category->save();

    return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla güncellendi.']);
    }else{

        return redirect()->route('panel.categoryIndex')->with(['error'=>'Bir hata oluştu! Lütfen tekrar deneyiniz.']);
    }
   
   
}


public function updateCategoryTest($id,Request $request){
    
   $category=Category::find($id);
}


public function categoryDelete($id){
   
    $category=Category::find($id);

    if($category->deleted_at==NULL){
        $category->delete();
        return redirect()->route('panel.categoryIndex')->with(['success'=>'Kategori başarıyla silindi.']);
    }
   else{
    return redirect()->route('panel.categoryIndex')->with(['error'=>'Hata Oluştu.']);
   }

    
}
}