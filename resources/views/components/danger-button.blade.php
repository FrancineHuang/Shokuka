<button {{ $attributes->merge(['type' => 'submit', 'class' => 'mx-2 inline-flex w-36 cursor-pointer select-none appearance-none items-center justify-center space-x-1 rounded bg-red-800 px-3 py-2 text-sm font-medium text-neutral-50 transition hover:border-red-800 hover:bg-red-500 focus:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-800']) }}>
    {{ $slot }}
</button>
