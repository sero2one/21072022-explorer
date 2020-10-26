<div class="space-y-8 divide-y table-list-mobile">
    @foreach ($delegates as $delegate)
        <div class="table-list-mobile-row">
            <table>
                <tr>
                    <td>@lang('general.delegates.rank')</td>
                    <td>
                        <div wire:loading.class="w-full h-5 rounded-full bg-theme-secondary-300 animate-pulse"></div>
                        <div wire:loading.class="hidden">{{ $delegate->rank() }}</div>
                    </td>
                </tr>
                <tr>
                    <td width="100">@lang('general.delegates.name')</td>
                    <td>
                        <div class="flex flex-row items-center space-x-3">
                            <div wire:loading.class="h-6 rounded-full w-11 bg-theme-secondary-300 animate-pulse"></div>
                            <div wire:loading.class="w-full h-5 rounded-full bg-theme-secondary-300 animate-pulse"></div>
                        </div>

                        <x-general.address :address="$delegate->username()" />
                    </td>
                </tr>
                <tr>
                    <td>@lang('general.delegates.status')</td>
                    <td>
                        <div wire:loading.class="w-full h-5 rounded-full bg-theme-secondary-300 animate-pulse"></div>
                        <div wire:loading.class="hidden">{{-- @TODO: Missed Blocks for Last 5 Rounds --}}</div>
                    </td>
                </tr>
                <tr>
                    <td>@lang('general.delegates.votes')</td>
                    <td>
                        <div wire:loading.class="w-full h-5 rounded-full bg-theme-secondary-300 animate-pulse"></div>
                        <div wire:loading.class="hidden">{{ $delegate->votes() }} <span>{{ $delegate->votesPercentage() }}</span></div>
                    </td>
                </tr>
                @if (Network::usesMarketSquare())
                <tr>
                    <td>@lang('general.delegates.profile')</td>
                    <td>
                        {{-- @TODO: MSQ Profile --}}
                    </td>
                </tr>
                <tr>
                    <td>@lang('general.delegates.commission')</td>
                    <td>
                        {{-- @TODO: MSQ Commission --}}
                    </td>
                </tr>
                @endif
                <tr>
                    <td>@lang('general.delegates.productivity')</td>
                    <td>
                        <div wire:loading.class="w-full h-5 rounded-full bg-theme-secondary-300 animate-pulse"></div>
                        <div wire:loading.class="hidden">{{ $delegate->productivity() }}</div>
                    </td>
                </tr>
            </table>
        </div>
    @endforeach
</div>