<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;  
use App\Traits\Common;        

class CarController extends Controller
{
    use common;
    private $columns=['title','price','description','published','image'];
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
        return view('addCard');
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
        $car=Car::findOrFail($id);
       return view("editcar",compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published']) ? true : false;
    
        $car = Car::findOrFail($id); 
    
        if ($request->hasFile('image')) {        
            $path = public_path().'/assets/images/';
    
            // Code for removing the old file
            if ($car->image != '' && $car->image != null) {
                $file_old = $path . $car->image;
                unlink($file_old);
                 // Upload the new file
            $fileName=$this->uploadFile($request->image,'assets/images');
    
            // Update the image in the table
            $car->update(['image' => $fileName]);
            }
    
           
       
        else {
            // If no new image is uploaded, keep the existing image
            $data['image'] = $car->image;
        }
        }
        $car->update($data);
    
        return "data updated";
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