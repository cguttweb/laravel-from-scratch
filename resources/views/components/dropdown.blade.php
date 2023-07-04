@props(['trigger'])

<div x-data="{ open: false }" @click.outside="open = false">
    {{-- Trigger for dropdown --}}
    <div @click="open = ! open" >
        {{ $trigger }}
    </div>

    <div x-show="open" @click.outside="open = false" class="absolute py-2 bg-gray-100 rounded-xl w-full z-50" style="display: none">
    {{-- links for dropdown --}}
        {{ $slot }}
    </div>

</div>
