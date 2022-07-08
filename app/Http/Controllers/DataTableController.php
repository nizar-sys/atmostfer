<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DataTableController extends Controller
{
    public function getUsers()
    {
        $userQuery = User::query();

        $users = $userQuery->latest();
        return datatables()->of($users)
            ->addIndexColumn()
            ->editColumn('name', fn($user)=>str()->title($user->name))
            ->addColumn('action', function ($user) {
                $buttons = '<button onclick="updateData(\''.$user->id.'\')" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt"></i>
                    </button>
                    
                    <button onclick="deleteData(\''.$user->id.'\')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                    ';

                return $buttons;
            })
            ->editColumn('role', fn($user)=>str()->title($user->role))
            ->editColumn('avatar', function($user){
                $avatar = $user->avatar;

                $path = asset('/uploads/images/' . $avatar);
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                $img = '<img data-path="'.$path.'" src="'.$base64.'" class="img-thumbnail img-avatar" width="50px">';
                return $img;
            })
            ->rawColumns(['action', 'role', 'avatar'])
            ->make(true);
    }

    public function getMerks(Request $request)
    {
        $merkQuery = Merk::query();

        $merks = $merkQuery->latest()->get(['id', 'name']);

        return datatables()->of($merks)
            ->addIndexColumn()
            ->editColumn('name', fn($merk)=>str()->title($merk->name))
            ->addColumn('action', function ($merk) {
                $buttons = '<button onclick="updateData(\''.$merk->id.'\')" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt"></i>
                    </button>
                    
                    <button onclick="deleteData(\''.$merk->id.'\')" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                    ';

                return $buttons;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getProducts(Request $request)
    {
        $productQuery = Product::query();

        $products = $productQuery->latest()->get(['id', 'name', 'description', 'price', 'merk_id']);

        return datatables()->of($products)
            ->addIndexColumn()
            ->editColumn('name', fn($product)=> '<a href="'.route('products.show', $product->id).'">'.str()->title($product->name).'</a>')
            ->editColumn('description', fn($product)=> strip_tags(str()->limit($product->description, 20)))
            ->editColumn('price', fn($product)=>'Rp.'. number_format($product->price, 0, ',', '.'))
            ->editColumn('merk_id', fn($product)=>str()->title($product->merk->name))
            ->addColumn('action', function ($product) {
                $buttons = '

                    <button onclick="addPhotos(\''.$product->id.'\')" title="Add product photos" class="btn btn-primary btn-sm">
                    <i class="fas fa-camera"></i>
                    </button>
                
                    <button onclick="updateData(\''.$product->id.'\')" title="Edit product" class="btn btn-warning btn-sm">
                    <i class="fas fa-pencil-alt"></i>
                    </button>
                    
                    <button onclick="deleteData(\''.$product->id.'\')" title="Delete product" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                    ';

                return $buttons;
            })
            ->rawColumns(['action', 'name'])
            ->make(true);
    }
}
