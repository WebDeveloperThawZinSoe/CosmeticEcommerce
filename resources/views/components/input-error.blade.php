@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-gold-600']) }}>{{ $message }}</p>
@enderror
