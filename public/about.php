<?php
    $heading = 'About SamaZon';
    $title = 'About SamaZon';
    $path_to_public = '';
    $links = [
        ['title' => 'Home', 'href' => 'index.php'],
        ['title' => 'Login', 'href' => 'login.php'],
        ['title' => 'Register', 'href' => 'register.php']
    ];
    require 'static/top.php';
?>

<article class="full">
    <div class="slogan">
        We are <span class="samazon">SamaZon</span>!!<br />
    </div>
    <img src="assets/images/box.jpg" class="sectionimage" />
    <div class="slogan">
        We are your one-stop-shop for selling and buying
        anything.<br />
    </div>
    <img src="assets/images/nike-shoe.jpg" class="sectionimage" />
    <div class="slogan">
        <span class="samazon">SamaZon</span> is global, we are
        available anywhere, everywhere, always.<br />
    </div>
    <img
        src="assets/images/shipping-warehouse.jpg"
        class="sectionimage"
    />
    <div class="slogan">
        We find you when we want to!<br />
        The <span class="samazon">SamaZon</span> experience is
        seamless and unavoidable, you cannot escape us!<br />
    </div>
    <img
        src="assets/images/hell-landscape.jpg"
        class="sectionimage"
    />
    <div class="slogan">
        The <span style="color: #d08770">end is nigh</span>, forces
        beyond your comprehension are approaching, we believe in
        providing happiness in the last moments of the fragile life
        of your world.<br />
    </div>
</article>

<?php
    require 'static/bottom.php';
?>