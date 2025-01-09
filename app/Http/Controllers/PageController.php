<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductCategory;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\CustomerFeedback;
use App\Models\Brand;
use App\Models\ProductVariants;
use App\Models\Order;
use App\Models\Goal;

class PageController extends Controller
{


    public function auth() {
        if (!Auth::check()) {
            return redirect('/login'); 
        }
    
        $role_id = Auth::user()->role;   
        if ($role_id == 1 ) {
            return redirect('/admin/dashboard');
        }elseif ($role_id == 3){
            return redirect('/admin/dashboard');
        
        } elseif ($role_id == 2) {
            return redirect('/dashboard');
        } else {
            return redirect('login');
        }
    }
    
    //index
    public function index(){
        $Latest_products = Product::with(['category', 'subCategory', 'variants'])
        ->where("stock","!=",0)->where("status",1)->orderBy("id", "desc")
        ->limit(8)->get();
        $brands =   Brand::inRandomOrder()->limit(6)->get();
        return view("web.index",compact("Latest_products","brands"));
    }

    //category
    public function category($id){
        $data = [
            "ProductCategories" => ProductCategory::get(),
            "Category" =>ProductCategory::where("id",$id)->first(),
            "SubCategory" => SubCategory::where("category_id",$id)->get(),
            "Product" => Product::where("category_id",$id)->paginate(50),
            "category_id" => $id , 
            "sub_category_id" => null,
        ];
         
        return view("web.products")->with($data);
    }

    //subcategory
    public function subcategory($id){
        $SubCategory = SubCategory::where("id",$id)->first();
        $data = [
            "ProductCategories" => ProductCategory::get(),
            "SubCategory" => SubCategory::where("category_id",$SubCategory->category_id	)->get(),
            "Product" => Product::where("sub_category_id",$id)->paginate(50),
            "sub_category_id" => $id,
            "category_id" => $SubCategory->category_id	
        ];
         
        return view("web.products")->with($data);
    }

    //faq 
    public function faq(){
        return view("web.faq");
    }

    //member
    public function member(){
        return view("web.member");
    }

    //sellToUs
    public function sellToUs(){
        return view("web.sellToUs");
    }

    //contactUs
    public function contactUs(){
        return view("web.contactUs");
    }

    //checkout
    public function checkout(){
        return view("web.checkout");
    }

    //customerFeedback
    public function customerFeedback(){
        return view("web.customerFeedback");
    }

    public function customerFeedbackStore(Request $request) {
        // Validate input fields
        $request->validate([
            'title' => 'required|string|max:255',
            'about' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle the file upload if it exists
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/feedback'), $imageName);
        } else {
            $imageName = null; // In case no image is uploaded
        }
    
        // Create new feedback record
        CustomerFeedback::create([
            'user_id' => auth()->id(), // Assuming user authentication
            'title' => $request->title,
            'about' => $request->about,
            'image' => $imageName,
        ]);
    
        // Redirect or return response after storing
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }

    public function privacyPolicy(){
        return view("web.privacy_policy");
    }

    //products
    public function products()
    {
        $data = [
            "ProductCategories" => ProductCategory::inRandomOrder()->limit(15)->get(),
            "brands" => Brand::inRandomOrder()->limit(15)->get(),
            "products" => Product::with(['category', 'subCategory', 'variants'])->where("stock","!=",0)->where("status",1)
                ->orderBy("id", "desc")
                ->paginate(49) // Paginate with 18 items per page
        ];        
        return view("web.products")->with($data);
    }

        //products
    public function productByCountry($country)
    {
            $data = [
                "ProductCategories" => ProductCategory::inRandomOrder()->limit(15)->get(),
                "brands" => Brand::inRandomOrder()->limit(15)->get(),
                "products" => Product::with(['category', 'subCategory', 'variants'])->where("stock","!=",0)->where("status",1)->where("country",$country)->orderBy("id", "desc")->paginate(49), // Paginate with 18 items per page
                "country" => $country
            ];        
            return view("web.productByCountry")->with($data);
        }

    

    //products
    public function brands(){
        $brands = Brand::orderBy("id", "desc")->get();
        return view("web.brand",compact("brands"));
    }

    //brandDetail
    public function brandDetail($id){
        $data = [
            "ProductCategories" => ProductCategory::inRandomOrder()->limit(10)->get(),
            "brands" => Brand::inRandomOrder()->limit(10)->get(),
            "brands_detail" => Brand::find($id),
            "mm_products" => Product::with(['category', 'subCategory', 'variants'])
                ->where("brand_id",$id)->where("stock","!=",0)->where("status",1)->where("country","myanmar")
                ->orderBy("id", "desc")
                ->paginate(18), 
            "sk_products" => Product::with(['category', 'subCategory', 'variants'])
                ->where("brand_id",$id)->where("stock","!=",0)->where("status",1)->where("country","korea")
                ->orderBy("id", "desc")
                ->paginate(18), 
        ];        
        return view("web.brandDetail")->with($data);
    }

    //productsCategory
    public function productsCategory($id){
        $data = [
            "ProductCategories" => ProductCategory::inRandomOrder()->limit(10)->get(),
            "ProductCategory_detail" => ProductCategory::find($id),
            "brands" => Brand::inRandomOrder()->limit(10)->get(),
            "mm_products" => Product::with(['category', 'subCategory', 'variants'])
                ->where("category_id",$id)->where("stock","!=",0)->where("country","myanmar")->where("status",1)
                ->orderBy("name", "asc")
                ->paginate(18),
            "sk_products" => Product::with(['category', 'subCategory', 'variants'])
                ->where("category_id",$id)->where("stock","!=",0)->where("country","korea")->where("status",1)
                ->orderBy("name", "asc")
                ->paginate(18)
        ];        
        return view("web.categoryDetail")->with($data);
    }

    public function productDetail($id)
    {
        $detail_product = Product::with(['category', 'subCategory', 'variants'])->findOrFail($id);
    
        // Fetch 4 random products from the same category
        $suggest_products = Product::where("category_id", $detail_product->category_id)
            ->where("id", "!=", $id)->where("country",$detail_product->country)  // Exclude the current product
            ->inRandomOrder()
            ->limit(4)
            ->get();
    
        return view("web.productDetail", compact('detail_product', 'suggest_products'));
    }

    public function orderTrack(){
        return view("web.order_track");
    }
    
    public function searchOrder(Request $request)
    {
        $request->validate([
            'order_number' => 'required|string'
        ]);

        $order = Order::where('order_number', $request->order_number)->with('user', 'paymentMethod', 'orderDetails.productVaraints.product')->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        return view("web.order_track", compact('order'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
    
        // Check if there's a search query; if not, return empty results
        // if (empty($query)) {
        //     $data = [
        //         "ProductCategories" => ProductCategory::inRandomOrder()->limit(10)->get(),
        //         "brands" => Brand::inRandomOrder()->limit(10)->get(),
        //         "products" => Product::with(['category', 'subCategory', 'variants'])
        //             ->where("stock", "!=", 0)
        //             ->where("status", 1)
        //             ->orderBy("id", "desc")
        //             ->paginate(18) // Paginate with 18 items per page
        //     ];
    
        //     return view('web.products')->with($data);
        // }
    
        // Fetch products matching the query in name, price, short_description, or description
        $products = Product::with(['category', 'subCategory', 'variants'])
            ->where("stock", "!=", 0)
            ->where("status", 1)
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'LIKE', "%{$query}%")
                    ->orWhere('price', 'LIKE', "%{$query}%")
                    ->orWhere('short_description', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%");
            })
            ->orderBy("name", "asc")
            ->paginate(18); // Use pagination with 18 items per page
    
        $data = [
            "ProductCategories" => ProductCategory::inRandomOrder()->limit(10)->get(),
            "brands" => Brand::inRandomOrder()->limit(10)->get(),
            "products" => $products,
            "query" => $query,
        ];
        return view("web.search_products")->with($data);
        // return view('web.search_products', compact('products', 'query', 'data'));
    }


    //goalsPage
    public function goalsPage($name){
       // Retrieve all goals with the given name
        $goals = Goal::where("name", $name)->get();

        // Extract all unique product_category_id values from the goals
        $productCategoryIds = $goals->pluck('product_category_id')->unique();

        $data = [
            "ProductCategories" => ProductCategory::inRandomOrder()->limit(10)->get(),
            "brands" => Brand::inRandomOrder()->limit(10)->get(),
            "products" => Product::with(['category', 'subCategory', 'variants'])
                ->whereIn("category_id", $productCategoryIds) // Filter by category_ids
                ->where("stock", "!=", 0)
                ->where("status", 1)
                ->orderBy("name", "asc")
                ->paginate(18),
            "goal_name" => $name
        ];

        return view("web.goals")->with($data);
    }
    
    //preOrder
    public function preOrder(){
        $data = [
            "ProductCategories" => ProductCategory::inRandomOrder()->limit(10)->get(),
            "brands" => Brand::inRandomOrder()->limit(10)->get(),
            "products" => Product::with(['category', 'subCategory', 'variants'])->where("status",1)->where("pre_order",1)
                ->orderBy("name", "asc")
                ->paginate(18) // Paginate with 18 items per page
        ];        
        return view("web.products_pre_order")->with($data);
    }
        
}