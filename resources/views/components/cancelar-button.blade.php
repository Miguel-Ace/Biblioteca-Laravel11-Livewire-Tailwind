<button {{ $attributes->merge(['class' => 'border font-bold p-1 my-1 rounded-md w-full hover:opacity-[.8]']) }}>
    {{ $slot }}
</button>
