<!-- include header file -->
<?php include 'partials/header.php'; ?>

<div id="booking">
    <div class="container">
        <div class="row">
            <div class="col col-lg-8">
                <div class="book-tickets">
                    <div class="page-title">
                        Checkout
                    </div>

                    <div class="step3">
                        <div class="row">
                            <div class="col col-sm-2 col-md-1">
                                <div class="number">
                                    3
                                </div>
                            </div>
                            <div class="col col-sm-10 col-md-11">
                                <div class="subheading">
                                    Customer Info
                                </div>
                                <div>
                                    <label for="name">
                                        Name
                                    </label>
                                    <input type="text" name="name">
                                </div>
                                <div>
                                    <label for="email">
                                        Email
                                    </label>
                                    <input type="email" name="email">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="step4">
                        <div class="row">
                            <div class="col col-sm-2 col-md-1">
                                <div class="number">
                                    4
                                </div>
                            </div>
                            <div class="col col-sm-10 col-md-11">
                                <div class="subheading">
                                    Payment
                                </div>
                                <div>
                                    <label for="name">
                                        Card No.
                                    </label>
                                    <input type="number" name="card">
                                </div>
                                <div>
                                    <label for="email">
                                        CVV
                                    </label>
                                    <input type="number" name="cvv">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-4">
                <div class="summary-container">
                    <div class="countdown">
                        <div class="row">
                            <div class="col col-sm-6">
                                <span>                                
                                    TIME LEFT
                                </span>
                            </div>
                            <div class="col col-sm-6 right">
                                <span>
                                    04:32
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="summary">
                        <div class="label">
                            Booking Summary
                        </div>
                        <div class="title">
                            Sang-chi: The Legend of the Ten Rings
                        </div>
                        <div class="text">
                            Cinema 1
                        </div>
                        <div class="text">
                            21 Oct 2021, 9:10AM
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col col-sm-6">
                                <div class="text">
                                    Adult x1
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="text right">
                                    $ 18.00
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-6">
                                <div class="text">
                                    Child x1
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="text right">
                                    $ 12.00
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col col-sm-6">
                                <div class="total">
                                    Total
                                </div>
                            </div>
                            <div class="col col-sm-6">
                                <div class="total right">
                                    $ 30.00
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="text">
                            Seats
                        </div>
                        <button class="btn btn-mubi">
                            Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- include footer file -->
<?php include 'partials/footer.php'; ?>