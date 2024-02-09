<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between"> 
                        <h2 class="text-gray-900 dark:text-gray-100 ">Mots de passe :</h2>
                        <a class="bg-white text-gray-800 font-bold py-2 px-4 rounded" href="{{ route('add-password') }}">Ajouter un mot de passe</a>
                    </div>
                        
                    @php
                        $passwords = DB::table('passwords')->get();
                        $authenticatedUserId = auth()->id();
                    @endphp

                    <table class="mt-4 w-full min-w-full border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-left">Site</th>
                                <th class="py-2 px-4 border-b text-left">Login</th>
                                <th class="py-2 px-4 border-b text-left">Password</th>
                                <th class="py-2 px-4 border-b text-left"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($passwords as $password)
                                @if ($password->user_id == $authenticatedUserId)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $password->site }}</td>
                                        <td class="py-2 px-4 border-b">{{ $password->login }}</td>
                                        <td class="py-2 px-4 border-b">{{ $password->password }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <!-- <a href="../{{ $password->site }}" target="_blank">Visiter le site</a> -->
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
