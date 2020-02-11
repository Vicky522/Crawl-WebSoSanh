<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>So Sanh Gia</title>
    <script src="https://kit.fontawesome.com/7efe72041b.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">

</head>

<body>
    <header>
        <section class="top-bar">
            <div class="container">
                <div class="top-bar__row">
                    <div class="top-bar__title">WebSoSanh</div>
                    <form class="top-bar__search" action="search.php" method="GET">
                        <input type="text" class="top-bar__search-term" placeholder="Search ở đây nè :P" name="name" />
                        <button class="top-bar__search-button" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <?php
                    // gets value sent over search form
                    $query = $_GET['name'];

                    // you can set minimum length of the query if you want
                    $min_length = 3;


                    if (strlen($query) >= $min_length) { // if query length is more or equal minimum length then

                        $query = htmlspecialchars($query);
                        // changes characters used in html to their equivalents, for example: < to &gt;

                        $query = mysqli_real_escape_string($conn, $query);
                        // makes sure nobody uses SQL injection

                        $raw_results = mysqli_query($conn, "SELECT * FROM nguyenkim
            WHERE (`title` LIKE '%" . $query . "%') OR (`text` LIKE '%" . $query . "%')");

                        // * means that it selects all fields, you can also write: `id`, `title`, `text`
                        // nguyenkim is the name of our table

                        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
                        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
                        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

                        if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following

                            while ($results = mysqli_fetch_array($raw_results)) {
                                // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

                                echo "<p><h3>" . $results['title'] . "</h3>" . $results['text'] . "</p>";
                                // posts results gotten from database(title and text) you can also show id ($results['id'])
                            }
                        } else { // if there is no matching rows do following
                            echo "No results";
                        }
                    } else { // if query length is less than minimum
                        echo "Minimum length is " . $min_length;
                    }
                    ?>

                </div>

            </div>
            <div class="top-bar__image">
                <img src="/image/search.svg" alt="search">
            </div>
            <div class="top-bar__info">
                <h2>3 EXCLUSIVE FEATURES</h2>
                <p>TO SAVE ON YOUR ONLINE PURCHASES</p>
            </div>
        </section>

    </header>
    <main>
        <section>
            <div class="container">
                <div class="section__row">
                    <div class="section-container">
                        <h2>Real-Time Powerful Search</h2>
                        <p>Pricetory is a comprehensive online shopping engine that answers your "how much is" and
                            "where to
                            buy" questions in real-time (no overnight data) and 100% accuracy.

                            Imagine now you can shop Lazada, Shopee, PrestoMall, Lelong, Ezbuy (and more stores) on
                            Pricetory and spot the best deals easily without opening each individual websites/apps.

                            Pricetory eliminates the online shopping barriers, now you can SHOP MORE and PAY LESS!</p>
                    </div>
                    <div class="section-image">
                        <img src="/image/section1.svg" alt="section1">
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="section__row">
                    <div class="section-image">
                        <img src="/image/section2.svg" alt="section1">
                    </div>
                    <div class="section-container">
                        <h2>Compare More Than Prices</h2>
                        <p>In this new era of online shopping, pricing is not the only consideration in our buying
                            decision.

                            In Pricetory we compare your products side-by-side with the latest prices, sellers, user
                            ratings and more.

                            You can further enhance your search results and comparison through our advanced and
                            easy-to-use filtering and sorting system.</p>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="section__row">
                    <div class="section-container">
                        <h2>Fresh Vouchers Every Day</h2>
                        <p>Other than the search and comparison features, Pricetory also houses a huge variety of
                            voucher codes from all major online stores in Malaysia, eg: Lazada vouchers, Shopee vouchers
                            and more.

                            Thanks to our lovely users who enjoy using Pricetory, we have the latest valid coupons and
                            voucher codes shared by our contributors every day that allow everyone to save even more.
                        </p>
                    </div>
                    <div class="section-image">
                        <img src="/image/section3.svg" alt="section1">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-bar">
            <div class="footer-bar__contact">
                <p>Contact: 17521251@gm.uit.edu.vn</p>
                <br>
                khu pho 6, Thu Đuc, Ho Chi Minh City, Vietnam
            </div>

        </div>

    </footer>
</body>

</html>