<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Login Admin</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        <script
            defer
            src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
        />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="h-full">
        @if (@session()->has("success"))
            <div
                role="alert"
                class="flex items-center p-2 text-green-900 transition duration-300 ease-in-out transform bg-green-100 border-l-4 border-green-500 rounded-lg dark:bg-green-900 dark:border-green-700 dark:text-green-100 hover:bg-green-200 dark:hover:bg-green-800 hover:scale-105"
            >
                <svg
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="flex-shrink-0 w-5 h-5 mr-2 text-green-600"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M13 16h-1v-4h1m0-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        stroke-width="2"
                        stroke-linejoin="round"
                        stroke-linecap="round"
                    ></path>
                </svg>
                <p class="text-xs font-semibold">{{ session("success") }}</p>
            </div>
        @endif

        @if (@session()->has("loginError"))
            <div
                role="alert"
                class="flex items-center p-2 text-red-900 transition duration-300 ease-in-out transform bg-red-100 border-l-4 border-red-500 rounded-lg dark:bg-red-900 dark:border-red-700 dark:text-red-100 hover:bg-red-200 dark:hover:bg-red-800 hover:scale-105"
            >
                <svg
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="flex-shrink-0 w-5 h-5 mr-2 text-red-600"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M13 16h-1v-4h1m0-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        stroke-width="2"
                        stroke-linejoin="round"
                        stroke-linecap="round"
                    ></path>
                </svg>
                <p class="text-xs font-semibold">
                    {{ session("loginError") }}
                </p>
            </div>
        @endif

        <div class="flex flex-col justify-center min-h-full px-6 py-10 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2
                    class="mt-10 text-2xl font-bold leading-9 tracking-tight text-center text-gray-900"
                >
                    Login Admin
                </h2>
                <div class="flex items-center justify-center">
                    <img src="{{ asset("logo.jpg") }}" class="" />
                </div>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/login" method="POST">
                    @csrf
                    <div>
                        <label
                            for="email"
                            class="block text-sm font-medium leading-6 text-gray-900"
                        >
                            Username
                        </label>
                        <div class="mt-2">
                            <input
                                id="name"
                                name="name"
                                type="text"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                autofocus
                                required
                            />
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label
                                for="password"
                                class="block text-sm font-medium leading-6 text-gray-900"
                            >
                                Password
                            </label>
                        </div>
                        <div class="mt-2">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            />
                        </div>
                    </div>

                    <div>
                        <button
                            type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        >
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
