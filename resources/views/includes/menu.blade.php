<div id="menu-grid" class="menu hide">
<div class="menu-tile">
        @include('components.svg.menu.acc')
        <span>
            <a href="">Home</a>
        </span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.res')
    <span><a href="{{ $accommodation[0]->domain . '/dashboard/residences'}}"></a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.conference')
        <span><a href="">Meeting Rooms</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.reserv')
        <span><a href="">Reservations</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.guest')
        <span><a href="">Guests</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.invoice')
        <span><a href="">Invoices</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.service')
        <span><a href="">Services</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.reservable')
        <span><a href="">Reservable Assets</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.issue')
        <span><a href="">Issues</a></span>
    </div>
</div>