<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;        
use App\Models\Car;  
use App\Models\Category;  

class CarController extends Controller
{
    use common;
    private $columns=['title','price','description','published','image','category_id'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $cars=Car::get();
    return view('cars',compact('cars')); //get all data on variable cars to show them by name of variable
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::select('id','categoryName')->get();
        return view('addCard',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //   $cars=new Car;
    //   $result=$cars->title=$request->title;
    //   $cars->price=$request->price;
    //   $cars->description=$request->description;
    //   $cars->published = $request->has('published') ? true : false;
    //   $cars->save();
    
        // $data = $request->only($this->columns);

        // $data['published'] = isset($data['published'])? true : false;

        // Car::create($data);        
        $message=[
            'title.required'=>'title is required',
            'description.required'=>'should be text',
        ];
        $data=$request->validate([
            'title' => 'required|string',
            'description' => 'string',
            'price'=>"numeric",
          
            // 'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            
        ],$message);
       
        $fileName=$this->uploadFile($request->image,'assets/images');
        $data['published'] = isset($request['published']);
        $data['image']=$fileName;
        $data['category_id'] = $request->input('category_id');
        Car::create($data);        
   
return "done";

    

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);

       
        return view('cardetails', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category=Category::select('id','categoryName')->get();
        $car=Car::findOrFail($id);
       return view("editcar",compact('car','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = [
            'title.required' => 'Title is required',
            'description.required' => 'Should be text',
            'image' => 'sometimes|mimes:png,jpg,jpeg'
        ];
    
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'string',
            'price' => 'numeric',
            // 'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $message);
    
        $data['published'] = isset($data['published']) ? true : false;
    
        if ($request->hasFile('image')) {
            $fileName = $this->uploadFile($request->file('image'), 'assets/images');
            $data['image'] = $fileName;
        }
        $data['published'] = isset($request['published']);
        $data['category_id'] = $request->input('category_id');
        Car::where('id', $id)->update($data);
    
        return "Data updated";
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
    
        return "Car with ID {$id} has been deleted.";
    }


public function trashed(){
  $cars= Car::onlyTrashed()->get();
return view('trashed',compact('cars'));
}
public function restore(string $id):RedirectResponse{
    Car::where('id',$id)->restore();
    return redirect('carshow');
}
public function forcedelete(string $id):RedirectResponse{
    Car::where('id',$id)->forceDelete();
    return redirect('carshow');
}
}