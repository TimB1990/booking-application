<div>
    <form action="" class="form">

        <!-- form section guest -->
        <div class="form-section">
            <!-- search guest and list -->
            <fieldset class="form-section-fieldset">
                <legend>Search Guest</legend>

                <div class="form-section-search">
                    <i class="fa fa-search form-section-search__icon"></i>
                    <input class="form-section-search__input" type="text" placeholder="Search guest..." />

                    <!-- will be like dropdown -->
                    <div class="form-section-search__results">
                        <span># Guest1</span>
                        <span># Guest2</span>
                    </div>

                </div>

            </fieldset>

            <!-- guest data -->
            <fieldset class="form-section-fieldset">
                <legend>Guest Data</legend>
                <label for="fname">First name: </label>
                <input id="fname" type="text" placeholder="first name">
                <label for="lname">Last name: </label>
                <input id="lname" type="text" placeholder="last name">
                <label for="dob">Date of Birth: </label>
                <input id="dob" type="date" placeholder="date of birth">
                <label for="email">Email: </label>
                <input id="email" type="email" placeholder="email">
                <label for="phone">Phone: </label>
                <input id="phone" type="text" placeholder="telephone">
                <label for="country">Country: </label>
                <input id="country" type="text" placeholder="country">
                <label for="zip">Postcode/ZIP: </label>
                <input id="zip" type="text" placeholder="postcode/zip">
                <label for="nr">House number: </label>
                <input id="nr" type="text" placeholder="house_nr">
                <label for="street">Street name: </label>
                <input id="street" type="text" placeholder="street">
                <label for="city">City: </label>
                <input id="city" type="text" placeholder="city">
            </fieldset>
        </div>

        <!-- form section reservation -->
        <div class="form-section">
            <fieldset class="form-section-fieldset">
                <legend>Reservation</legend>
                <label for="subject">Reservable Subject:</label>
                <select name="subject" id="subject">
                    <option value="residence">Residence</option>
                    <option value="meeting-room">Meeting Room</option>
                    <option value="asset">Reservable Asset</option>
                </select>
                <label for="">Check In: </label>
                <input id="checkin" type="date" placeholder="Check In">
                <label for="">Check Out: </label>
                <input id="checkout" type="date" placeholder="check Out">
                <input class="btn-default" type="submit" value="Add">
            </fieldset>

            <!-- here go dynamic form section -->
            <div>
                <fieldset class="form-section-fieldset">
                    <legend>dynamic</legend>
                </fieldset>
            </div>
        </div>
    </form>
</div>
