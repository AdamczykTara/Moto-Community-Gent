@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">FAQ</h1>

    @auth
        @if(auth()->user()?->isAdmin())
            <div class="mb-6 flex gap-3">
                <a
                        href="{{ route('faq.categories.create') }}"
                        class="inline-block px-3 py-2 text-sm
                       border border-green-600 text-green-600
                       rounded
                       hover:bg-green-50 hover:text-green-700"
                >
                    + Categorie toevoegen
                </a>

                <a
                        href="{{ route('faq.create') }}"
                        class="inline-block px-3 py-2 text-sm
                       border border-blue-600 text-blue-600
                       rounded
                       hover:bg-blue-50 hover:text-blue-700"
                >
                    + Vraag en antwoord toevoegen
                </a>
            </div>
        @endif
    @endauth

    @foreach ($categories as $category)
        <div class="flex items-center justify-between mt-6 mb-3">
            <h2 class="text-xl font-semibold">
                {{ $category->name }}
            </h2>

            @auth
                @if(auth()->user()?->isAdmin())
                    <div class="flex gap-2">
                        <a
                                href="{{ route('faq.categories.edit', $category) }}"
                                class="px-2 py-1 text-xs
                           border border-gray-400 text-gray-700
                           rounded
                           hover:bg-gray-100"
                        >
                            Bewerken
                        </a>

                        <form
                                method="POST"
                                action="{{ route('faq.categories.destroy', $category) }}"
                        >
                            @csrf
                            @method('DELETE')
                            <button
                                    type="submit"
                                    onclick="return confirm('Categorie én alle FAQ’s verwijderen?')"
                                    class="px-2 py-1 text-xs
                               border border-red-600 text-red-600
                               rounded
                               hover:bg-red-50 hover:text-red-700"
                            >
                                Verwijderen
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>

        @foreach ($category->faqItems as $faq)
            <div class="mb-4">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="font-semibold">
                            {{ $faq->question }}
                        </p>
                        <p class="text-sm text-gray-700">
                            {{ $faq->answer }}
                        </p>
                    </div>

                    @auth
                        @if(auth()->user()?->isAdmin())
                            <div class="flex gap-2 ml-4">
                                <!-- Bewerken -->
                                <a
                                        href="{{ route('faq.edit', $faq) }}"
                                        class="px-2 py-1 text-xs
                                           border border-gray-400 text-gray-700
                                           rounded
                                           hover:bg-gray-100"
                                >
                                    Bewerken
                                </a>

                                <!-- Verwijderen -->
                                <form
                                        method="POST"
                                        action="{{ route('faq.destroy', $faq) }}"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                            type="submit"
                                            onclick="return confirm('FAQ definitief verwijderen?')"
                                            class="px-2 py-1 text-xs
                                               border border-red-600 text-red-600
                                               rounded
                                               hover:bg-red-50 hover:text-red-700"
                                    >
                                        Verwijderen
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        @endforeach
    @endforeach
@endsection