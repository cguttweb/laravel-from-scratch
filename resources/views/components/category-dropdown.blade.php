<div>
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
    <x-dropdown>

        <x-slot name="trigger">
            <button class="inline-flex py-2 pl-3 pr-9 text-left text-sm font-semibold w-full lg:w-32">
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
                {{-- option 1 --}}
                {{-- <x-down-arrow class="absolute pointer-events-none" style="right: 12px;" /> --}}
                {{-- option 2 more generic if multiple --}}
                <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
            </button>
        </x-slot>

        <x-dropdown-item href="/?{{http_build_query(request()->except('category', 'page')) }}"
            :active="request()->routeIs('home')">All</x-dropdown-item>

        @foreach ($categories as $category)

            <x-dropdown-item
                href="/?category={{ $category->slug }}&{{http_build_query(request()->except('category', 'page'))}}"
                :active="isset($currentCategory) && $currentCategory->is($category)">
                {{ ucwords($category->name) }}
            </x-dropdown-item>

        @endforeach
    </x-dropdown>
</div>
