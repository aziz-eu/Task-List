<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>




    <title>Document</title>
    @yield('style')
</head>
<body class="container mx-auto mt-10 mb-10  max-w-lg">
<div x-data="{ flash: true }">
    @if (session()->has('success'))
      <div x-show="flash"
        class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
        role="alert">
        <strong class="font-bold">Success!</strong>
        <div>{{ session('success') }}</div>

        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" @click="flash = false"
            stroke="currentColor" class="h-6 w-6 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </span>
      </div>
    @endif
    <h1 class="text-4xl mb-4 font-medium">@yield("title")</h1>
    <div>
        @yield("content")
    </div>
    
</body>
</html>