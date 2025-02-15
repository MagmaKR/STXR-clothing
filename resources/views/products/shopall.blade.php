<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STXR Clothing-All products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet"
    "
</head>
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }

    .container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        border: 2px solid white;
        border-radius: 20px;
        padding: 20px;
        min-height: 100vh;
        gap: 30px;
        max-width: 90vw;
        margin: 2rem auto;
    }

    .container > div {
        background-color: #f1f1f1;
        border: 1px solid white;
        border-radius: 15px;
        padding: 15px;
        font-size: 30px;
        text-align: center;
        min-width: 0;
        margin: 10px 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out;
    }

    .container > div:hover {
        transform: translateY(-5px);
    }

    .aspect-w-3 {
        border-radius: 10px;
        overflow: hidden;
    }

    /* Media query for mobile devices */
    @media (max-width: 768px) {
        .container {
            grid-template-columns: repeat(1, 1fr); /* Change to 1 column on smaller screens */
            padding: 10px;
            gap: 15px;
        }

        .container > div {
            font-size: 24px; /* Adjust font size for smaller screens */
            padding: 10px;
        }
    }
</style>
<body class="bg-black">
   
    <x-nav-bar class=" a mb-28">

    </x-nav-bar >

       <div class="container">

      @php
            $latestProductsFirst = App\Models\Product::with(['images', 'StockManagement'])
                ->latest('id')
                ->get();
                
      @endphp

            @foreach ($latestProductsFirst as $product)
                <div class="bg-white flex flex-col h-full">
                    <div class="aspect-w-3 aspect-h-4 overflow-hidden p-2">
                        <img src="{{ $product->images->first()->ImageUrl1 ?? '/images/SRXR-TSHIRT-removebg-preview.png' }}" 
                             alt="{{ $product->name }}" 
                             class="w-90% h-[350px] o o  object-contain object-center transform transition-transform duration-500 group-hover:scale-105">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h3 class="text-xl font-bold mb-1 brand-font">{{ $product->name }}</h3>
                        <p class="text-gray-800 mb-1 text-lg font-bold">R{{ number_format($product->price, 2) }}</p>
                        <div class="mt-auto">
                            <a href="#" class="inline-block text-sm bg-black text-white px-4 py-2 rounded-lg font-bold hover:bg-gray-700 transition duration-300">
                                VIEW DETAILS
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            
            

       </div>
    
</body>
</html>