<x-head></x-head>

<x-layout.wrapper>
    <x-layout.table :dataObject=$dataObject :type=$type >
    </x-layout.table>

    <div class="p-4">{{ $dataObject->links() }}</div>
</x-layout.wrapper>

<vendor.pagination.bootstr