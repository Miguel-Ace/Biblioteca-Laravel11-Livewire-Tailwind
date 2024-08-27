<button {{ $attributes->merge(['class' => 'bg-white text-slate-800 font-bold p-1 my-1 rounded-md w-full hover:opacity-[.8]']) }}>
    {{ $slot }}
</button>
