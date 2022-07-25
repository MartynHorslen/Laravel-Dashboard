<x-head></x-head>

<x-layout.wrapper>
    <a href="{{ url()->previous() }}" class="btn btn-outline-primary mx-2"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
    <x-layout.company :data=$data></x-layout.company>
    <x-layout.employees :data=$employees></x-layout.employees>
</x-layout.wrapper>

<x-notifications.notification></x-layout.notifications.notification>