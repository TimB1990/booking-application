<div id="menu-grid" class="menu hide">
<a href="{{ '/' . $accommodation[0]->domain . '/dashboard'}}" class="menu-tile">
        @include('components.svg.menu.acc')
        <span>
            Home
        </span>
    </a>
    <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/residences'}}" class="menu-tile">
        @include('components.svg.menu.res')
    <span>Residences</span>
    </a>

    <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/meeting-rooms'}}" class="menu-tile">
        @include('components.svg.menu.conference')
    <span>Meeting Rooms</span>
    </a>

    <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/reservations?year=' . date('Y') . '&week=' . date('W') . '&subject=residences' }}" class="menu-tile">
        @include('components.svg.menu.reserv')
    <span>Reservations</span>
    </a>

    <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/guests'}}" class="menu-tile">
        @include('components.svg.menu.guest')
        <span>Guests</span>
    </a>

    <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/invoices'}}" class="menu-tile">
        @include('components.svg.menu.invoice')
        <span>Invoices</span>
    </a>

    <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/services'}}" class="menu-tile">
        @include('components.svg.menu.service')
        <span>Services</span>
    </a>

    <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/assets'}}" class="menu-tile">
        @include('components.svg.menu.reservable')
        <span>Assets</span>
    </a>

    <a href="{{ '/' . $accommodation[0]->domain . '/dashboard/issues'}}" class="menu-tile">
        @include('components.svg.menu.issue')
        <span>Issues</span>
    </a>

</div>