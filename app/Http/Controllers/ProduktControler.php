<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use  App\resources\views\plik;
use  App\resources\views\skrypt;
use Faker\Generator as Faker;
use App\Models\Produkt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use PDF;
use Barryvdh\DomPDF\Facade\Pdf;
class ProduktControler extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Faker $faker,  $dodajlosowe)
   
     {
       //Pomijam sprawdzenie czy parametr $dodajlosowe jest typu int ,pomijam takze klauzule try catch
       
        for($i=0 ;$i<$dodajlosowe;$i++)
        {
        $produkt=new Produkt();
        $produkt->nazwa=($faker->text(5) );
        $produkt->cena=(round ( 6 , 100));
        $produkt->cena_promocyjna=null;
         $produkt->save();
        }
        $produkt1=Produkt::all();
        
        foreach ($produkt1 as $prod)
        {
        if(rand(1 , 6)==1)
        $prod->cena_promocyjna=($prod->cena)-2;
        $prod->save(); 
        }

        echo "nie wiem dlaczego ale funlcja rand w tworzeniu produktów nie działa ";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1(Faker $faker,  $fraza)
    {
        for($i=0 ;$i<1000;$i++)
        {
            $produkt=new Produkt();
            $produkt->nazwa=($faker->text(5) );
            $produkt->cena=(round ( 6 , 100));
            $produkt->cena_promocyjna=null;
             $produkt->save();
            }
           // $prod2=Produkt::all();
           // $prod2 = DB::select('select * from produkts where nazwa=(?)% order by cena',[$fraza]);
 $prod2=DB::table('produkts')//->get();
               ->where('nazwa' , $fraza)->get();
             // ->orderBy('cena')->get();
             echo' <table>';
            foreach($prod2 as $prod3){
          echo  ' <td>'. $prod3->id .'</td>';
           echo' <td>'. $prod3->nazwa ,'</td>';
            echo'<td>'. $prod3->cena .'</td>';
            echo'<td>'. $prod3->cena_promocyjna .'</td>';
            echo"<br>";
           echo' </table>';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index3( PDF $pdf)
    {
        $data = [
            'title' => 'Welcome',
            'dane' => "lorem ipsum"
        ];
        
          
        $pdf::loadView('C:\Prj_br\resources\views\skrypt.blade.php', $data);
    
        return $pdf->download('plik.pdf');
    
    }
    public function index4()
    {
        return view('skrypt');
    }

    

}
