<x-layout>
    <section>
        <main class="max-w-lg mx-auto">
            <h3 class="font-bold text-center text-xl">Register</h3>
            <form action="/register" method="post" class="font-bold mt-5">
                @csrf
                <label for="name">Name</label>
                    <input class="border border-gray-500 my-2 p-2 mt-2 w-full" type="text" name="name" id="name" required>
                <label for="username">Username</label>
                    <input class="border border-gray-500 my-2 p-2 mt-2 w-full" type="text" name="username" id="username" required>
                <label for="email">Email Address</label>
                    <input class="border border-gray-500 my-2 p-2 mt-2 w-full" type="text" name="email" id="email" required>

                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                <label for="password">Password</label>
                    <input class="border border-gray-500 my-2 p-2 w-full" type="password" name="password" id="password" required>
                    <input class="border border-blue-500 bg-blue-500 mt-3 p-2 rounded text-white w-full uppercase" type="submit" value="submit">
            </form>
        </main>
    </section>
</x-layout>
