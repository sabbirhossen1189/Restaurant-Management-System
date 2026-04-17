<?php

namespace App\Http\Controllers;
use Carbon\Doctrine\CarbonDoctrineType;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Cart;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $usertype = Auth::user()->usertype;

        if ($usertype == 'user')
        {
            $data = Food::all();
            return view('home.index', compact('data'));
        }
        else
        {
            $total_user = User::where('usertype', '=', 'user')->count();
            $total_food = Food::count();
            $total_order = Order::count();
            $total_deliverd = Order::where('delivery_status', '=', 'delivered')->count();

            return view('admin.index', compact('total_user', 'total_food', 'total_order', 'total_deliverd'));
        }
    }

    public function Home()
    {
        $data = Food::all();
        return view('home.index', compact('data'));
       
    }

    public function my_cart()
    {
        if (Auth::id())
        {
            $user_id = Auth::user()->id;

            $data = Cart::where('user_id', $user_id)->get();

            return view('home.my_cart', compact('data'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $userid = Auth()->user()->id;
        
        $cart = Cart::where('user_id', '=',$userid)->get();

        foreach ($cart as $cart)
        {
            $order = new Order;

            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;

            $order->titile = $cart->titile;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->food_image = $cart->image;
            $order->user_id = $userid;
            $order->delivery_status = 'in progress';
            $order->save();
            $cart_id = $cart->id;
            $cart_item = Cart::find($cart_id);
            $cart_item->delete();


        }
        return redirect()->back()->with('message', 'Order Confirmed Successfully');
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id())
        {
            $food = Food::find($id);

            $cart_titile = $food->titile;

            $cart_detail = $food->detail;

            $cart_price = floatval(preg_replace('/[^\d\.]/', '', $food->price));
            $cart_qty = intval($request->qty);
            if ($cart_qty < 1) {
                $cart_qty = 1;
            }

            $cart_image = $food->image;

            $data = new Cart;

            $data->titile = $cart_titile;

            $data->detail = $cart_detail;

            $data->price = $cart_price * $cart_qty;

            $data->image = $cart_image;

            $data->quantity = $cart_qty;

            $data->user_id = Auth()->user()->id;

            $data->save();

            return redirect()->back();

            
        }
        else
        {
            
            return redirect('login');

        }
    }

    public function book_table(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $request->validate([
            'phone' => 'required|string|max:255',
            'guest' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Book::create([
            'phone' => $request->phone,
            'guest' => $request->guest,
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('message', 'Table booked successfully.');
    }

    public function cancel_order($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $order = Order::find($id);

        if (!$order || $order->user_id !== Auth::id()) {
            return redirect()->back()->with('message', 'Order not found or access denied.');
        }

        if ($order->delivery_status === 'delivered') {
            return redirect()->back()->with('message', 'Delivered orders cannot be cancelled.');
        }

        $order->delivery_status = 'canceled';
        $order->save();

        return redirect()->back()->with('message', 'Order cancelled successfully.');
    }

    public function cancel_booking($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $booking = Book::find($id);

        if (!$booking || $booking->user_id !== Auth::id()) {
            return redirect()->back()->with('message', 'Booking not found or access denied.');
        }

        $booking->delete();

        return redirect()->back()->with('message', 'Booking cancelled successfully.');
    }

    // Helper method to get cart count for authenticated user
    public static function getCartCount()
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::user()->id)->count();
        }
        return 0;
    }
}
