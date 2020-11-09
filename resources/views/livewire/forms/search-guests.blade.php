<div>
    <form class="reservation-form">
        <fieldset class="reservation-form-fieldset">
            <legend>Search Guest</legend>
            <div class="reservation-form-search">
                <i class="fa fa-search reservation-form-search__icon"></i>
                <input wire:model.debounce.300ms="search" class="reservation-form-search__input" type="text" placeholder="Search guest..." />

                @if(!empty($guests))
                    <div class="reservation-form-search__results">
                        @foreach ($guests as $guest)
                            <span wire:click="$emit('insertFields', {{ $guest }})">{{ $guest->first_name }} {{ $guest->last_name }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
        </fieldset>
    </form>
</div>
