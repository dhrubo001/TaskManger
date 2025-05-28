@if (session()->has('success'))
    <div class="px-4 py-3 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
        {{ session()->get('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="px-4 py-3 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
        {{ session()->get('error') }}
    </div>
@endif
