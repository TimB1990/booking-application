<div id="menu-grid" class="menu hide">
<div class="menu-tile">
        @include('components.svg.menu.acc')
        <span>
        <a href="{{ '/' . $accommodation[0]->domain . '/dashboard'}}">Home</a>
        </span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.res')
    <span><a href="{{ '/' . $accommodation[0]->domain . '/dashboard/residences'}}">Residences</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.conference')
    <span><a href="{{ '/' . $accommodation[0]->domain . '/dashboard/meeting-rooms'}}">Meeting Rooms</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.reserv')
    <span><a href="{{ '/' . $accommodation[0]->domain . '/dashboard/reservations'}}">Reservations</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.guest')
        <span><a href="{{ '/' . $accommodation[0]->domain . '/dashboard/guests'}}">Guests</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.invoice')
        <span><a href="{{ '/' . $accommodation[0]->domain . '/dashboard/invoices'}}">Invoices</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.service')
        <span><a href="{{ '/' . $accommodation[0]->domain . '/dashboard/services'}}">Services</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.reservable')
        <span><a href="{{ '/' . $accommodation[0]->domain . '/dashboard/assets'}}">Assets</a></span>
    </div>
    <div class="menu-tile">
        @include('components.svg.menu.issue')
        <span><a href="{{ '/' . $accommodation[0]->domain . '/dashboard/issues'}}">Issues</a></span>
    </div>
</div>