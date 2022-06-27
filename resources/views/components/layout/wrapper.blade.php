<body class="bg-light">
    <div class="wrapper">

        <x-layout.sidebar></x-layout.sidebar>

        <div id="app">    

            <x-layout.navbar></x-layout.navbar>

            <main class="py-4">
                {{ $slot }}
            </main>
            
        </div>
    </div>
</body>
</html>