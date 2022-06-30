<x-head></x-head>

<x-layout.wrapper>
    <x-layout.table :dataObject=$dataObject :type=$type >
    </x-layout.table>

    <div class="pt-4">{{ $dataObject->links() }}</div>
</x-layout.wrapper>

<x-notifications.notification></x-layout.notifications.notification>