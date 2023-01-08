<x-layouts>
    <x-slot name="title">Search Properties In {{ config('app.name') }}</x-slot>
    <x-slot name="description">{{ config('app.name') }} is the only SASS business platform that lets you run your business on one
        platform, seamlessly across all digital channels. .
    </x-slot>

    <main class="bg-slate-50">

        <div class="flex md:container md:mx-auto px-4 pt-6" v-cloak>

            <property-listing url="/api/properties" province="{{ $province ?? null }}"/>

        </div>

    </main>

    @pushonce('scripts')

    @endpushonce
</x-layouts>