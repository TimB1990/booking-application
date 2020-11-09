<div>
    <form action="#" class="reservation-form">
        <fieldset class="reservation-form-fieldset">
            <legend>Guest Data</legend>
            <label for="fname">First name: </label>
            <input wire:model.defer="guest.fname" id="fname" type="text" placeholder="first name">
            <label for="lname">Last name: </label>
            <input wire:model.defer="guest.lname" id="lname" type="text" placeholder="last name">
            <label for="dob">Date of Birth: </label>
            <input wire:model.defer="guest.dob" id="dob" type="date" placeholder="date of birth">
            <label for="email">Email: </label>
            <input wire:model.defer="guest.email" id="email" type="email" placeholder="email">
            <label for="phone">Phone: </label>
            <input wire:model.defer="guest.phone" id="phone" type="text" placeholder="telephone">
            <label for="country">Country: </label>
            <input wire:model.defer="guest.country" id="country" type="text" placeholder="country">
            <label for="zip">Postcode/ZIP: </label>
            <input wire:model.defer="guest.zip" id="zip" type="text" placeholder="postcode/zip">
            <label for="nr">House number: </label>
            <input wire:model.defer="guest.nr" id="nr" type="text" placeholder="house_nr">
            <label for="street">Street name: </label>
            <input wire:model.defer="guest.street" id="street" type="text" placeholder="street">
            <label for="city">City: </label>
            <input wire:model.defer="guest.city" id="city" type="text" placeholder="city">
            <input type="submit" class="btn-default" value="Add Guest">
        </fieldset>
    </form>  
</div>
