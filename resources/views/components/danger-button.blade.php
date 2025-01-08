<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-gold-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gold-500 active:bg-gold-700 focus:outline-none focus:ring-2 focus:ring-gold-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
