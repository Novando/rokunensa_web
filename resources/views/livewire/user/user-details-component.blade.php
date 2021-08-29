<section id="checkout">
    <h3 class="page-title">Your Profile</h3>
    @if(Session::has('message'))
        <h3>{{Session::get('message')}}</h3>
    @endif
    <div class="container">
        <h4>Your identity is safe, we use it only for check out purpose</h4>
        <form wire:submit.prevent="saveProfile">
            <div class="user-details">
                <div class="input-box">
                    <label for="firstname" class="details">First Name</label>
                    <input type="text" class="input-full" name="firstname" id="firstname" placeholder="First Name" required="true" wire:model="first_name">
                </div>
                <div class="input-box">
                    <label for="lastname" class="details">Last Name</label>
                    <input type="text" class="input-full" name="lastname" id="lastname" placeholder="Last Name" required="true" wire:model="last_name">
                </div>
                <div class="input-box">
                    <label for="address1" class="details">Address 1</label>
                    <input type="text" class="input-full" name="address1" id="address1" placeholder="Address Line 1" required="true" wire:model="address1">
                </div>
                <div class="input-box">
                    <label for="address2" class="details">Address 2</label>
                    <input type="text" class="input-full" name="address2" id="address2" placeholder="Address Line 2" wire:model="address2" >
                </div>
                <div class="input-box">
                    <label for="city" class="details">City</label>
                    <input type="text" class="input-full" name="city" id="city" placeholder="City" required="true" wire:model="city">
                </div>
                <div class="input-box">
                    <label for="country" class="details">Country</label>
                    <input type="text" class="input-full" name="county" id="county" placeholder="Country" required="true" wire:model="country">
                </div>
                <div class="input-box">
                    <label for="zip" class="details">Zip Code</label>
                    <input type="text" class="input-full" name="zip" id="zip" placeholder="12345" required="true" maxlength="5" wire:model="zip">
                </div>
                <div class="input-box">
                    <label for="phone" class="details">Phone Number</label>
                    <input type="text" class="input-full" name="phone" id="phone" placeholder="+1555555" required="true" wire:model="phone">
                </div>
            </div>
            <div>
                <button type="submit" class="btn">Proceed</button>
            </div>
        </form>
    </div>
</section>
