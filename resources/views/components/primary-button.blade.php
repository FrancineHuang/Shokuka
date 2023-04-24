<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mx-2 inline-flex w-36 cursor-pointer select-none appearance-none items-center justify-center space-x-1 rounded border border-red-800 bg-white px-3 py-2 text-sm font-medium text-red-800 transition hover:border-gray-300 hover:bg-gray-100 focus:border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300']) }}>
    {{ $slot }}
</button>
