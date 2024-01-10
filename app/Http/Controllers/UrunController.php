<?php

namespace App\Http\Controllers;

use App\Models\Urun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UrunController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       /* $urunler = Urun::Paginate(5);

        return view("urunler",compact("urunler"));
    */
        $response = Http::get('http://northwind.now.sh/api/categories');

        if ($response->successful()) {
            $categories = $response->json();
            return view('urunler', ['urunler' => $categories]);
        } else {
            return view('urunler')->withErrors(['error' => 'API ile iletişim kurulamadı.']);
        }

    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = 'https://northwind.now.sh/api/categories';
    
        $response = Http::post($url, [
            "name" => $request->input('name'),  // Assuming these are the correct field names
            "description" => $request->input('description'),
        ]);
    
        if ($response->successful()) {
    
            return redirect()->back()->with("olumlu", "Ürün başarıyla eklendi");
        } else {
            return redirect()->back()->with("olumsuz", "Ürün eklenirken bir hata oluştu: " . $response->status());
        }
    }
    

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Urun $urun)
    {
        return view("edit", compact("urun"));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Urun $urun)
{
    $request->validate([
        "name" => "required|min:5",
        "description" => "required",
    ]);



    $url = 'https://northwind.now.sh/api/categories/' . $urun->id;
console.log($url);

$response = Http::put($url, [
    "name" => $request->name,
    "description" => $request->description,
]);

if ($response->successful()) {
    return redirect()->back()->with("olumlu", "Kategori başarıyla güncellendi");
} else {
    logger('API Update Error', ['response' => $response->body()]);

    if ($response->status() === 404) {
        return redirect()->back()->with("olumsuz", "Kategori bulunamadı (404).");
    } else {
        return redirect()->back()->with("olumsuz", "Kategori güncellenirken bir hata oluştu: " . $response->status());
    }
}
}


    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function destroy(Urun $urun)
        {
            try {
                $urun->delete();
        
                $url = 'https://northwind.now.sh/api/categories/' . $urun->id;
                $response = Http::delete($url);
        
                if ($response->successful()) {
                    return redirect()->back()->with("olumlu", "Kategori başarıyla silindi.");
                } else {
                    return redirect()->back()->with("olumsuz", "Kategori silinirken bir hata oluştu: " . $response->status());
                }
            } catch (\Exception $e) {
                return redirect()->back()->with("olumsuz", "Kategori silinirken bir hata oluştu: " . $e->getMessage());
            }
        }
    }