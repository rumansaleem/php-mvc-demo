<?php view('_partials.head', ['title' => 'Sign Up']); ?>
<h1>Sign Up</h1>
<form action="/signup" method="POST">
    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="name">Full Name:</label>
        <input id="name" name="name" type="text" placeholder="e.g. John Doe" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="email">Email:</label>
        <input id="email" name="email" type="text" placeholder="e.g. johndoe@gmail.com" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="password">Password:</label>
        <input id="password" name="password" type="password" placeholder="Choose a password" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <label style="display: block" for="confirm_password">Confirm Password:</label>
        <input id="confirm_password" name="confirm_password" type="password" placeholder="Re-enter your password" style="min-width: 33.33%;">
    </div>

    <div style="margin-bottom: .5rem;">
        <button type="submit">Sign Up</button>
    </div> 
</form>

<?php view('_partials.footer'); ?>