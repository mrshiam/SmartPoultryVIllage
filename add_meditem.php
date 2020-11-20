<?php include_once 'includes/dashboard/head.php' ?>
<?php include_once 'includes/dashboard/slider.php' ?>

    <div class="page-container">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">

                    </div>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Add Medicine Item</h3>
                                    </div>
                                    <hr>
                                    <form action="med_input.php" method="post" novalidate="novalidate">
                                        <div class = row >
                                            <div class = col-6 >
                                                <div class="form-group">
                                                    <label for="med_name" class="control-label mb-1">Medicine Name</label>
                                                    <input id="med_name" name="med[med_name]" type="text" class="form-control"  value="">
                                                </div>
                                            </div>
                                            <div class = col-6 >
                                                <div class="form-group">
                                                    <label for="select" class=" form-control-label">Select Med Type</label>
                                                    <select name="med[med_type]" id="med_type_selection" onchange="changeValue()" class="form-control">
                                                        <option value="" selected="selected">Please select</option>
                                                        <option value="1">Powder</option>
                                                        <option value="2">Liquid</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class = row >
                                            <div class = col-6 >
                                                <div class="form-group">
                                                    <label for="select" class=" form-control-label">Type Unit</label>
                                                    <input id="med_unit" name="med[med_unit]"  class="form-control"  value="">
                                                </div>
                                            </div>
                                            <div class = col-6 >
                                                <div class="form-group">
                                                    <label for="select" class=" form-control-label">Medicine Unit Price</label>
                                                    <input id="med_unit" name="med[med_unit_price]"  class="form-control"  value="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="adding_date" class="control-label mb-1">Adding Date</label>
                                                    <input id="adding_date" name="med[adding_date]" type="date" class="form-control" value=""  placeholder="MM / YY">

                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                                <span id="add-button">Add Item</span>
                                            </button>
                                        </div>
                                    </form>
                                    <script>
                                        var unitArray = ["","kg","lit"];
                                        function changeValue() {
                                            var u = document.getElementById("med_type_selection");
                                            var u_value = u.options[u.selectedIndex].value;
                                            document.getElementById('med_unit').value = unitArray[u_value];

                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include_once 'includes/dashboard/footer.php' ?>