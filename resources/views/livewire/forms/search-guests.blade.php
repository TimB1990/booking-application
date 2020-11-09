<div>
    <form class="reservation-form">
        <fieldset class="reservation-form-fieldset">
            <legend>Search Guest</legend>
            <div class="reservation-form-search">
                <i class="fa fa-search reservation-form-search__icon"></i>
                <input  wire:model.debounce.500ms="search" class="reservation-form-search__input" type="text" placeholder="Search guest..." />

                <div class="reservation-form-search__results">
                    <span># Guest1</span>
                    <span># Guest2</span>
                </div>
            </div>
        </fieldset>
    </form>
</div>
