<?php
    $title = 'Register to Samazon';
    $heading = 'New User Registration';
    $path_to_public = '../';
    $links = [];
    require '../static/top.php';
?>
<article class="full">
    Welcome, thanks for starting your journey with
    <span class="samazon">SamaZon</span>!!<br />
    Becoming a new user entitles you to unique perks.<br />
    Your soul will stand a chance at the trials after the ends just
    by registering as a user!<br />
    <h2>Enter your details here:</h2>
    <form action="registration.php" method="post">
        <fieldset id="personal-details">
            <legend>Personal Details</legend>
            <label for="first_name">First Name (required):</label>
            <br />
            <input
                class="text"
                type="text"
                id="first_name"
                name="first_name"
                placeholder="Your first name"
                required
            />
            <br /><br />
            <label for="middle_name">Middle Name:</label> <br />
            <input
                class="text"
                type="text"
                id="middle_name"
                name="middle_name"
                placeholder="Your middle name"
            />
            <br /><br />
            <label for="last_name">Last Name (required):</label>
            <br />
            <input
                class="text"
                type="text"
                id="last_name"
                name="last_name"
                placeholder="Your last name"
                required
            />
            <br /><br />
            <label for="date_of_birth">
                Date of Birth (required):
            </label>
            <br />
            <input
                class="text"
                type="date"
                id="date_of_birth"
                name="date_of_birth"
                required
            />
            <br /><br />
            <label for="gender">Gender (required):</label>
            <br />
            <input type="radio" name="gender" value="M" />
            <span class="formtext">Male</span> <br />
            <input type="radio" name="gender" value="F" />
            <span class="formtext">Female</span> <br />
            <input type="radio" name="gender" value="X" />
            <span class="formtext">Other</span> <br /><br />
            <label for="phone_no">Phone Number (required):</label>
            <br />
            <input
                class="text"
                type="number"
                id="country_code"
                name="country_code"
                placeholder="Code"
                required
            />
            <input
                class="text"
                type="number"
                id="phone_no"
                name="phone_no"
                placeholder="Phone Number"
                required
            />
            <br /><br /><br />
            <label for="email_id">Email ID (required):</label>
            <br />
            <input
                class="text"
                type="email"
                id="email_id"
                name="email_id"
                placeholder="Your Email ID"
                required
            />
            <br /><br />
            <label for="seller">Are you planning to be a seller?</label>
            <br />
            <input type="radio" name="seller" value="Y" />
            <span class="formtext">Yes</span> <br />
            <input type="radio" name="seller" value="N" />
            <span class="formtext">No</span>
            <br /><br />
            <label for="buyer">Are you planning to be a buyer?</label>
            <br />
            <input type="radio" name="buyer" value="Y" />
            <span class="formtext">Yes</span> <br />
            <input type="radio" name="buyer" value="N" />
            <span class="formtext">No</span><br /><br />
        </fieldset>
        <br />
        <fieldset id="address">
            <legend>Address</legend>
            <label for="house">House (required):</label> <br />
            <input
                class="text"
                type="text"
                id="house"
                name="house"
                placeholder="Your house number"
                required
            />
            <br /><br />
            <label for="street_name">Street Name:</label> <br />
            <input
                class="text"
                type="text"
                id="street_name"
                name="street_name"
                placeholder="Street Name"
            />
            <br /><br />
            <label for="locality">Locality:</label> <br />
            <input
                class="text"
                type="text"
                id="locality"
                name="locality"
                placeholder="Your locality"
            />
            <br /><br />
            <label for="city">City (required):</label> <br />
            <input
                class="text"
                type="text"
                id="city"
                name="city"
                placeholder="Your city"
                required
            />
            <br /><br />
            <label for="state">State (required):</label> <br />
            <input
                class="text"
                type="text"
                id="state"
                name="state"
                placeholder="Your state"
                required
            />
            <br /><br />
            <label for="pin_code">Pin Code (required):</label>
            <br />
            <input
                class="text"
                type="number"
                id="pin_code"
                name="pin_code"
                placeholder="Your Pin Code"
                required
            />
            <br /><br />
            <label for="contact_no">
                Contact number (required):
            </label>
            <br />
            <input
                class="text"
                type="number"
                id="contact_no"
                name="contact_no"
                placeholder="Your Contact Number"
                required
            />
            <br /><br />
        </fieldset>
        <br />
        <fieldset id="card-details">
            <legend>Card Details</legend>
            <label for="card_no">Card Number (required):</label>
            <br />
            <input
                class="text"
                type="text"
                id="card_no"
                name="card_no"
                placeholder="Your Card Number"
                required
            />
            <br /><br />
            <label>Expiry Date (required):</label> <br />
            <input
                class="text"
                type="text"
                id="expiry_month"
                name="expiry_month"
                placeholder="Month"
                style="width: 5%"
                required
            />
            <input
                class="text"
                type="text"
                id="expiry_year"
                name="expiry_year"
                placeholder="Year"
                style="width: 5%"
                required
            />
            <br /><br />
            <label for="name_as_on_card">
                Name (as on card) (required):
            </label>
            <br />
            <input
                class="text"
                type="text"
                id="name_as_on_card"
                name="name_as_on_card"
                placeholder="Name"
                required
            />
            <br /><br />
        </fieldset>
        <br />
        <fieldset id="password">
            <legend>Password</legend>
            <label for="password">
                Enter Password (required):
            </label>
            <br />
            <input
                class="text"
                type="password"
                id="password"
                name="password"
                placeholder="Enter Password"
                required
            />
            <br /><br />
            <label for="confirm_password">
                Confirm Password (required):
            </label>
            <br />
            <input
                class="text"
                type="password"
                id="confirm_password"
                name="confirm_password"
                placeholder="Confirm Password"
                required
            />
            <br /><br />
        </fieldset>
        <br /><br />
        <input
            class="button"
            type="submit"
            id="submit"
            value="Make Account"
            style="padding: 1%; align-self: center"
        />
    </form>
</article>

<?php require '../static/bottom.php'; ?>

<script>
    const firstName = document.getElementById('first_name');
    const middleName = document.getElementById('middle_name');
    const lastName = document.getElementById('last_name');
    const nameAsOnCard = document.getElementById('name_as_on_card');
    const countryCode = document.getElementById('country_code');
    const phoneNo = document.getElementById('phone_no');
    const contactNo = document.getElementById('contact_no');

    [firstName, middleName, lastName].forEach(nameField => {
        nameField.addEventListener('input', () => {
            nameAsOnCard.value = `${firstName.value} ${
                middleName.value === '' ? '' : middleName.value + ' '
            } ${lastName.value}`;
        });
    });

    [countryCode, phoneNo].forEach(phoneField => {
        phoneField.addEventListener('input', () => {
            contactNo.value = countryCode.value + phoneNo.value;
        });
    });
</script>
