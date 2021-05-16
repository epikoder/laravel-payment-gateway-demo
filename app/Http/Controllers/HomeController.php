<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use App\Repositories\BookRepository;
use App\Repositories\UserRepository;
use Epikoder\LaravelPaymentGateway\PaymentService;
use Faker\Generator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    protected $bookRepository;
    protected $userRepository;
    protected $faker;
    protected $paymentService;

    public function __construct(
        BookRepository $bookRepository,
        UserRepository $userRepository,
        Generator $faker,
        PaymentService $paymentService
    ) {
        $this->bookRepository = $bookRepository;
        $this->userRepository = $userRepository;
        $this->faker = $faker;
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return view('welcome', [
            'books' => $this->bookRepository->all(),
            'providers' => $this->paymentService->providers(),
        ]);
    }

    public function purchase(PurchaseRequest $purchaseRequest)
    {
        /** @var \App\Models\Orders\Book */
        $order = $this->bookRepository->findBySlug(request()->book_slug);
        $user = $this->userRepository->findByEmail(request()->email);
        if (!$user) {
            $attributes = request()->all();
            if (!isset($attributes['name'])) {
                $attributes['name'] = $this->faker->name;
            }

            $user = $this->userRepository->create($attributes);
        }
        if (!Hash::check(request()->password, $user->password)) {
            return view('welcome', [
                'status' => 'failed',
                'message' => 'Invalid email or password',
                'books' => $this->bookRepository->all(),
                'providers' => $this->paymentService->providers(),
            ]);
        }

        return $this->paymentService->init(request()->provider, $user->toArray())
        ->process($order);
    }
}
