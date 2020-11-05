<x-general.entity-header-item :title="trans('pages.transaction.transaction_type')" icon="app-transactions.{{ $model->iconType() }}">
    <x-slot name="text">
        @isset($asEntity)
            @lang('pages.transaction.'.$model->entityType())
        @else
            {{ $model->typeLabel() }}
        @endisset
    </x-slot>
</x-general.entity-header-item>